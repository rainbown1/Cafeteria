@extends('layout.app')

@section('app', 'Cafe')

@section('contenido')
<h1 class="text-4xl text-center font-bold text-amber-900 mb-4">Café la roma</h1>
    <hr class="border-2 border-amber-900 mb-8 w-24 mx-auto">



<div class="grid grid-cols-4 gap-4">
@foreach ($productos as $producto)
<!-- PRODUCTO -->

    

        <div class="bg-white rounded-lg shadow-lg p-4">
            <h3 class="font-bold text-lg">{{$producto->nombre}}</h3>
            <img src="http://127.0.0.1:8000/{{ $producto->img }}" class="w-70 h-75" alt="">
             <h3 class="font-bold text-lg">{{$producto->descripcion}}</h3>
             <h3 class="font-bold text-lg text-amber-700">Categoria: </h3>
             <h3 class="font-bold text-lg"> {{$producto->categorias->nombre}}</h3>
            <p class="text-amber-700 font-bold text-lg">${{$producto->precio}}</p>
            <a  class="text-blue-700 font-bold text-lg" href="/detalle/{{ $producto->id_producto }}">
    Ver detalle
</a>
            <form action="{{ route('carrito.agregar') }}" method="POST">
            @csrf

            <input type="hidden" name="producto[id_producto]" value="{{ $producto->id_producto }}">
            <input type="hidden" name="producto[nombre]" value="{{ $producto->nombre }}">
            <input type="hidden" name="producto[precio]" value="{{ $producto->precio }}">
            <input type="hidden" name="producto[img]" value="{{ $producto->img }}">

            <button class="bg-green-600 text-white px-4 py-2 rounded">
            Agregar al carrito
            </button>

            </form>
        </div>

       @endforeach
   
</div>
<br>

@endsection