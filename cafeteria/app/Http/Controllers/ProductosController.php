<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

Class ProductosController extends Controller{

public function index() {
 $response = Http::get('http://127.0.0.1:8001/api/productos');
       $productos =[];
       
        if($response->successful()){
            $json = $response->object();
           if($json->resultado){
              $productos = $json->datos;
             
           }else{
            return redirect()->back()->with('error', $response->json('error'));
           }
            return view('menu.cafe')->with('productos', $productos);

        }
        }

        public function show($id_producto){
             $response = Http::get("http://127.0.0.1:8001/api/productos/$id_producto");

            if ($response->successful()) {
                $productos = $response->object()->datos;

                return view('menu.detalle', compact('productos'));
            }

            return redirect()->back()->with('error', 'Producto no encontrado');
        }
}

