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
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $response = Http::post('http://localhost:8000/api/login', [
        'email' => $request->email,
        'password' => $request->password
    ]);

    if ($response->successful()) {

        $data = $response->json();

        session([
            'cliente' => $data['cliente'],
            'token' => $data['token']
        ]);

        return redirect('/inicio')->with('success', 'Bienvenido '.$data['cliente']['nombre']);
    }

    return back()->with('error', 'Correo o contraseña incorrectos');
}

public function logout(Request $request)
{
    
    $token = session('token');

    Http::withHeaders([
        'Authorization' => 'Bearer '.$token,
        'Accept' => 'application/json'
    ])->post('http://localhost:8000/api/logout');

    session()->forget(['cliente','token']);

    return redirect('/login');
}
}
