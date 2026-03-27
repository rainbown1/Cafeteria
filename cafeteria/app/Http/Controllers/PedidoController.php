<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PedidoController extends Controller
{
    private $apiUrl = 'http://localhost:8000/api';

    

    public function procesar(Request $request)
    {
        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return back()->with('error', 'El carrito está vacío');
        }

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

        $pedidoData = [
            'id_mesa' => $request->id_mesa,
            'total' => $total,
            'detalles' => $detalles
        ];

        try {
            $token = session('token');

            $response = Http::withToken($token)
                ->post($this->apiUrl . '/pedidos/store', $pedidoData);


            if (!$response->successful()) {
                return back()->with('error', 'Error al procesar pedido ');
            }

            $data = $response->json();
            $id_pedido = $data['id_pedido'];

            session()->forget('carrito');

                return redirect()->route('checkout', ['id_pedido' => $id_pedido])
                    ->with('success', 'Pedido realizado correctamente');

        } catch (\Exception $e) {
            return back()->with('error', 'Error de conexión con la API');
        }
    }
    
    public function misPedidos()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Inicia sesión para ver tus pedidos');
        }

        try {
            $token = $this->getToken();

            $response = Http::withToken($token)
                ->get($this->apiUrl . '/pedidos/cliente/' . Auth::user()->id_cliente);

            if ($response->successful()) {
                $data = $response->json();
                $pedidos = $data['pedidos'] ?? [];
                return view('pedidos.index', compact('pedidos'));
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al obtener pedidos');
        }

        return view('pedidos.index', ['pedidos' => []]);
    }
}