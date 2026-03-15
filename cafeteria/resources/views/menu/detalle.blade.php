@extends('layout.app')

@section('app', 'Cafe')

@section('contenido')

<h1 class="text-4xl text-center font-bold text-amber-900 mb-4">
    {{ $productos->nombre }}
</h1>

<hr class="border-2 border-amber-900 mb-8 w-24 mx-auto">

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
     
    @if(isset($productos->img))
        <img src="http://127.0.0.1:8001/{{ $productos->img }}"
        class="rounded-lg shadow w-full">
    @endif

    @if(isset($productos->img2))
        <img src="http://127.0.0.1:8001/{{ $productos->img2 }}"
        class="rounded-lg shadow w-full">
    @endif

    @if(isset($productos->img3))
        <img src="http://127.0.0.1:8001/{{ $productos->img3 }}"
        class="rounded-lg shadow w-full">
    @endif

</div>
<h1 class="font-bold text-amber-700 text-lg">Descripcion: </h1>
<h1 class="font-bold text-lg">{{$productos->descripcion}}</h1>
<br>
<h1 class="font-bold text-amber-700 text-lg">Precio: </h1>
<h1 class="font-bold text-lg"> ${{$productos->precio}}</h1>
<br>
<h1 class="font-bold text-amber-700 text-lg">Existencia: </h1>
<h1 class="font-bold text-lg"> {{$productos->disponible}}

@endsection