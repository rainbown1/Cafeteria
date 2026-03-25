<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
 public function index()
{
    $token = session('token');

    $response = Http::withToken($token)
        ->get('http://localhost:8000/api/perfil');

    if(!$response->successful()){
        return redirect('/login');
    }
    
    $data = $response->json();
    $cliente = $data['cliente'];

    return view('perfil.index', ['cliente' => $cliente]);
}
 public function edit()
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->get('http://localhost:8000/api/perfil');

        $cliente = $response->json()['cliente'];

        return view('perfil.edit', compact('cliente'));
    }


 public function update(Request $request)
{
    $token = session('token');
    $cliente = session('cliente');

    $data = [
        'nombre' => $request->nombre,
        'apellidoP' => $request->apellidoP,
        'apellidoM' => $request->apellidoM,
        'telefono' => $request->telefono,
        'email' => $request->email
    ];

    if($request->filled('password')){
        $data['password'] = $request->password;
    }

    $response = Http::withToken($token)
        ->put("http://localhost:8000/api/clientes/".$cliente['id_cliente'], $data);

    if($response->failed()){
        dd($response->status(), $response->body());
    }

    return redirect('/perfil')->with('success','Perfil actualizado');
}

}