@extends('layout.app')

@section('contenido')

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-amber-900">Metodo de pago</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

        <div class="text-2xl">Procede con tu pago...</div>

</div>

@endsection