<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PedidoController extends Controller
{
    private $apiUrl = 'http://localhost:8001/api';

    public function procesar(Request $request)
    {
        $request->validate([
            'id_mesa' => 'nullable|integer'
        ]);

        $carrito = session()->get('carrito', []);
        
        if (empty($carrito)) {
            return redirect()->back()->with('error', 'El carrito está vacío');
        }

        // Calcular total y preparar detalles
        $total = 0;
        $detalles = [];
        
        foreach ($carrito as $id_producto => $producto) {
            $subtotal = $producto['precio'] * $producto['cantidad'];
            $total += $subtotal;
            
            $detalles[] = [
                'id_producto' => $id_producto,
                'cantidad' => $producto['cantidad'],
                'precio_unitario' => $producto['precio'],
                'subtotal' => $subtotal
            ];
        }

        // Preparar datos del pedido
        $pedidoData = [
            'id_cliente' => Auth::check() ? Auth::user()->id_cliente : null,
            'id_mesa' => $request->id_mesa ?: null,
            'total' => $total,
            'detalles' => $detalles
        ];

        try {
            // Enviar a la API
            $response = Http::post($this->apiUrl . '/pedidos', $pedidoData);

            if ($response->successful()) {
                // Vaciar carrito
                session()->forget('carrito');
                
                return redirect('/inicio')->with('success', '¡Pedido realizado con éxito!');
            }

            // Si hay error, mostrar mensaje
            $error = $response->json()['message'] ?? 'Error al procesar el pedido';
            return redirect()->back()->with('error', $error);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error de conexión con el servidor');
        }
    }

    public function misPedidos()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Inicia sesión para ver tus pedidos');
        }

        try {
            $response = Http::get($this->apiUrl . '/pedidos/cliente/' . Auth::user()->id_cliente);
            
            if ($response->successful()) {
                $data = $response->json();
                $pedidos = $data['pedidos'] ?? [];
                return view('pedidos.index', compact('pedidos'));
            }
        } catch (\Exception $e) {
            // Manejar error
        }

        return view('pedidos.index', ['pedidos' => []]);
    }
}