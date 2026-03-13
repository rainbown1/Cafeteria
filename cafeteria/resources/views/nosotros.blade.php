@extends('layout.app')

@section('app', 'Sobre nosotros')

@section('contenido')
<div class="p-6">
    <h1 class="text-4xl text-center font-bold text-amber-900 mb-4">Nombre Cafetería</h1>
    
    <hr class="border-2 border-amber-900 mb-6">

<div class="flex flex-row gap-7">
    <div class="">
        <img src="/imagenes/nosotros.jpg" class="w-80 h-50" alt="">
    </div>
    <div>
        Nuestro proposito es brindarte la mejor atencion, en un espacio donde te 
        sientas como en familia para disfrutar de un rico cafe, un baguette, un postre o la bebida estrella: un cacao mix.
    <br><br>
        Aqui te ofrecemos dos marcas de cafe: la primera proviene de las altas montañas. al consumirlo apoyamos proyectos qie visibilizan la labor de los que lo cosechan.
    La segunda marca es de tostadores de la region por lo que cosumirlo promueve la economia local
<br><br><br>
        <div class="text-center w-full">¡Bienvenidos!</div>
        
    </div>
</div>
</div>
@endsection