@extends('layout.app')

@section('app', 'Cafe')

@section('contenido')

<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-4xl text-center font-bold text-amber-900 mb-4">
        {{ $productos->nombre }}
    </h1>

    <hr class="border-2 border-amber-900 mb-8 w-24 mx-auto">

    <!-- Imágenes -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto p-4">
        @php
            $imagenes = ['img', 'img2', 'img3'];
        @endphp

        @foreach($imagenes as $imagen)
            <div class="flex justify-center">
                @if(isset($productos->$imagen) && !empty($productos->$imagen))
                    <img src="{{ asset($productos->$imagen) }}"
                         alt="Imagen del producto"
                         class="rounded-lg shadow-lg w-48 h-48 object-cover hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-48 h-48 bg-gray-200 rounded-lg shadow-lg flex items-center justify-center text-gray-500">
                        Sin imagen
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Detalles del producto -->
    <div class="max-w-2xl mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
        <div class="space-y-4">
            <div>
                <h2 class="font-bold text-amber-700 text-lg">Descripción:</h2>
                <p class="text-gray-700">{{ $productos->descripcion }}</p>
            </div>
            
            <div>
                <h2 class="font-bold text-amber-700 text-lg">Precio:</h2>
                <p class="text-2xl font-bold text-amber-900">${{ number_format($productos->precio, 2) }}</p>
            </div>
            
            <div>
                <h2 class="font-bold text-amber-700 text-lg">Existencia:</h2>
                <p class="text-lg">
                    @if($productos->disponible == 1)
                        <span class="text-green-600 font-semibold">disponible</span>
                    @else
                        <span class="text-red-600 font-semibold">Agotado</span>
                    @endif
                </p>
            </div>
        </div>

        <!-- Botón de agregar al carrito (Opción 1) -->
        <form action="{{ route('carrito.agregar') }}" method="POST" class="mt-6">
            @csrf
            <input type="hidden" name="producto[id_producto]" value="{{ $productos->id_producto }}">
            <input type="hidden" name="producto[nombre]" value="{{ $productos->nombre }}">
            <input type="hidden" name="producto[precio]" value="{{ $productos->precio }}">
            <input type="hidden" name="producto[img]" value="{{ $productos->img }}">

            <button type="submit" 
                    class="flex items-center justify-center gap-2 w-full bg-amber-700 hover:bg-amber-800 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed"
                    @if($productos->disponible == 0) disabled @endif>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                {{ $productos->disponible == 1 ? 'Agregar al carrito' : 'Producto agotado' }}
            </button>
        </form>
    </div>
</div>

@endsection