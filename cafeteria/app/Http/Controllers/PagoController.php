<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Client\Common\RequestOptions;
use MercadoPago\MercadoPagoConfig;
use Illuminate\Support\Facades\Http;

class PagoController extends Controller
{

public function showCheckout($id_pedido){
    $token = session('token');

    \Log::info('Token enviado a la API:', ['token' => substr($token, 0, 10) . '...']);
    
    if (!$token) {
        return redirect('/login')->with('error', 'Debes iniciar sesión');
    }

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $token,
        'Accept' => 'application/json'
    ])->get('http://127.0.0.1:8000/api/pedido/' . $id_pedido . '/total');

     \Log::info('Respuesta API', [
            'status' => $response->status(),
            'body' => $response->body()
        ]);

        
    if (!$response->successful()) {
        return redirect('/inicio')->with('error', 'Error al procesar el pedido');
    }
    
    $data = $response->json();
    
    $total = $data['total'];
    
    return view('pago', [
        'publicKey' => config('mercadopago.public_key'),
        'total' => $total,           // ← CORREGIDO: usar $total
        'id_pedido' => $id_pedido    // ← CORREGIDO: usar el ID del pedido
    ]);
}

public function obtenerTotalPedido($id_pedido){

        $token = session('token');
        
        if (!$token) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no autenticado'
            ], 401);
        }
        
        try {
            // Llamar a tu API interna para obtener el pedido
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ])->get('http://127.0.0.1:8000/api/pedido/' . $id_pedido . '/total');
            
            if ($response->successful()) {
                $data = $response->json();
                
                $total = $data['total'];
                return view('pago-exitoso/' . $id_pedido, compact('total'));
            } else {
                return redirect()->with('error', 'pago no realizado');
            }
            
        } catch (\Exception $e) {
            return redirect('inicio')->with('error', 'Error en el servidor');
        }
}

public function procesarPago(Request $request){
        try {
            // 1. Configurar credenciales
            MercadoPagoConfig::setAccessToken(config('mercadopago.access_token'));
            
            $client = new PaymentClient();
            $request_options = new RequestOptions();
            
            // Generar un idempotency key único para esta transacción
            $idempotencyKey = uniqid() . '_' . time();
            $request_options->setCustomHeaders(["X-Idempotency-Key: $idempotencyKey"]);
            
            // Crear el pago con los datos del request
            $payment = $client->create([
                "transaction_amount" => (float) $request->transaction_amount,
                "token" => $request->token,
                "description" => $request->description,
                "installments" => (int) $request->installments,
                "payment_method_id" => $request->payment_method_id,
                "issuer_id" => $request->issuer_id,
                "payer" => [
                    "email" => $request->payer['email'],
                    "identification" => [
                        "type" => $request->payer['identification']['type'],
                        "number" => $request->payer['identification']['number']
                    ]
                ]
            ], $request_options);
            
            // Devolver respuesta según el estado del pago
            if ($payment->status == 'approved') {
                
            $token = session('token');
            $responseApi = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ])->post('http://127.0.0.1:8000/api/pagos', [
                'id_pedido'   => $request->id_pedido, // Asegúrate de enviarlo desde el JS
                'metodo_pago' => 'tarjeta',
                'monto'       => $payment->transaction_amount,
                'estado'      => 'pagado'
            ]);

            if ($responseApi->successful()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pago aprobado y guardado en DB',
                    'payment_id' => $payment->id,
                    'id_pedido' => $request->id_pedido, // El ID de tu sistema
                    'redirect_url' => url('/pago-exitoso/' . $request->id_pedido)
                ]);
            } else{

                \Log::error("Error API Pagos: " . $responseApi->body());
                
            }
                return response()->json([
                    'success' => true,
                    'message' => 'Pago aprobado',
                    'payment_id' => $payment->id,
                    'status' => $payment->status
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Pago no aprobado',
                    'status' => $payment->status,
                    'status_detail' => $payment->status_detail,
                    'details' => $payment
                ]);
            }
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}