<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarritoController extends Controller
{
    // Mostrar carrito
    public function index()
    {
        $carrito = session()->get('carrito', []);
        return view('carrito', compact('carrito'));
    }

    // Agregar producto
    public function agregar(Request $request)
    {
        $producto = $request->producto;

        $carrito = session()->get('carrito', []);

        if(isset($carrito[$producto['id_producto']])){

            $carrito[$producto['id_producto']]['cantidad']++;

        }else{

            $carrito[$producto['id_producto']] = [
                "nombre" => $producto['nombre'],
                "precio" => $producto['precio'],
                "img" => $producto['img'],
                "cantidad" => 1
            ];
        }

        session()->put('carrito',$carrito);

        return redirect()->back()->with('success','Producto agregado al carrito');
    }

    // Actualizar cantidad
    public function actualizar(Request $request)
    {
        $carrito = session()->get('carrito');

        $carrito[$request->id]["cantidad"] = $request->cantidad;

        session()->put('carrito',$carrito);

        return redirect()->back();
    }

    // Eliminar producto
    public function eliminar($id)
    {
        $carrito = session()->get('carrito');

        if(isset($carrito[$id])){
            unset($carrito[$id]);
        }

        session()->put('carrito',$carrito);

        return redirect()->back();
    }

    // Vaciar carrito
    public function vaciar()
    {
        session()->forget('carrito');
        return redirect()->back();
    }
}