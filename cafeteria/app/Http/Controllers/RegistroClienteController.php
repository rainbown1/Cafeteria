<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;

class RegistroClienteController extends Controller
{

    public function create()
    {
        return view('registro');
    }

    public function store(Request $request)
{
    $response = Http::post('http://localhost:8001/api/registro', [

        'nombre' => $request->nombre,
        'apellidoP' => $request->apellidoP,
        'apellidoM' => $request->apellidoM,
        'telefono' => $request->telefono,
        'email' => $request->email,
        'password' => $request->password

    ]);


    if ($response->successful()) {

        $data = $response->json();

        // Guardar cliente en sesión
        session([
            'cliente' => $data['cliente']
        ]);

        return redirect('/inicio')->with('success','Registro exitoso. Bienvenido '.$data['cliente']['nombre']);
    }

    return back()->with('error','Error al registrar cliente');
}

}