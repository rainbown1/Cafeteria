<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class AuthClienteController extends Controller
{
    public function formLogin()
    {
        return view('layout.login');
    }

   public function login(Request $request)
{
    $response = Http::post('http://localhost:8001/api/login', [
        'email' => $request->email,
        'password' => $request->password
    ]);

    if ($response->successful()) {

        $data = $response->json();

        // Guardar datos del cliente en sesión
        session([
            'cliente' => $data['cliente']
        ]);

        return redirect('/inicio')->with('success', 'Bienvenido '.$data['cliente']['nombre']);
    }

    return back()->with('error', 'Correo o contraseña incorrectos');
}

    public function logout()
    {
        session()->forget('cliente');

        return redirect('/login');
    }
}
