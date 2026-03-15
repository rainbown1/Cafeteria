<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthClienteController extends Controller
{
    public function formLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        $response = Http::post('http://localhost:8001/api/login',[
            'email' => $request->email,
            'password' => $request->password
        ]);

        if($response->successful()){

            $data = $response->json();

            $cliente = Cliente::find($data['cliente']['id_cliente']);

            Auth::login($cliente);

            return redirect('/inicio')->with('success','Bienvenido '.$cliente->nombre);

        }

        return back()->with('error','Correo o contraseña incorrectos');

    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login')->with('success','Sesión cerrada');
    }
}
