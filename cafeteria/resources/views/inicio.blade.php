@extends('layout.app')

@section('app', 'Inicio')

@section('contenido')
<div class="p-6">
    <!-- Título fuera de la imagen -->
    <h1 class="text-4xl text-center font-bold text-amber-900 mb-4">Nombre Cafetería</h1>
    
    <hr class="border-2 border-amber-900 mb-6">
    
    <!-- Contenedor con imagen de fondo solo para los servicios -->
    <div class="relative w-full rounded-lg items-center content-center overflow-hidden mb-8">
        <!-- Imagen de fondo solo para esta sección -->
        <div class="absolute inset-0 w-full h-full ">
            <img src="/imagenes/cafe.jpg" alt="Fondo de cafetería" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-60"></div> <!-- Capa oscura -->
        </div>

        <!-- Servicios sobre la imagen -->
        <div class="relative z-10 p-8">
            <!-- Aquí van los servicios -->
            <div class="flex flex-row gap-4 items-center">
                <!-- Pedido -->
                <div class="bg-white h-90 w-70 bg-opacity-90 rounded-lg shadow-lg p-6 backdrop-blur-sm">
                    <h2 class="text-2xl font-bold text-amber-800 mb-3">Realiza un pedido</h2>
                    <div class="flex flex-col gap-20">
                    <p class="text-gray-700 mb-3">Selecciona algo de nuestro menu y en minutos te lo entregamos</p>
                    <button class="bg bg-amber-900 text-white text-bold rounded-xl w-40 h-10">Hacer pedido</button>
                    </div>
                </div>

                <div class="bg-white h-90 w-70 bg-opacity-90 rounded-lg shadow-lg p-6 backdrop-blur-sm">
                    <h2 class="text-2xl font-bold text-amber-800 mb-3">Quienes somos</h2>
                    <div class="flex flex-col gap-20">
                    <p class="text-gray-700 mb-3">La historia de este cafe inicia en 20xx. Tiene como sede un local ubicado en Calle falsa 123 de la colonia falsa, en Guadalajara, Jalisca</p>
                    <button class="bg bg-amber-900 text-white text-bold rounded-xl w-40 h-15">Conoce mas sobre nosotros</button>
                    </div>
                </div>

                <div class="bg-white h-90 w-70 bg-opacity-90 rounded-lg shadow-lg p-6 backdrop-blur-sm">
                    <h2 class="text-2xl font-bold text-amber-800 mb-3">Eres cliente frecuente?</h2>
                    <div class="flex flex-col gap-20">
                    <p class="text-gray-700 mb-3">Registrate y recibe promociones exclusivas</p>
                    <button class="bg bg-amber-900 text-white text-bold rounded-xl w-40 h-15">Registrarse</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Sección de contacto (también fuera de la imagen) -->
    <div class="mt-12 max-w-4xl mx-auto">
        <h2 class="text-3xl text-center font-bold text-amber-900 mb-6">CONTÁCTANOS</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Información de contacto -->
            <div class="bg-amber-50 rounded-lg shadow-lg p-6">
                <h3 class="text-xl font-bold text-amber-900 mb-2">Nombre de la cafeteria</h3>
                <p class="text-amber-700 font-semibold mb-3">Cafeteria EN GUADALAJARA</p>
                <div class="space-y-2">
                    <p class="flex items-center text-gray-700">
                        <span class="mr-2">✉️</span> contact@cafe.com
                    </p>
                    <p class="flex items-center text-gray-700">
                        <span class="mr-2">📞</span> +33 134270040
                    </p>
                </div>
            </div>

            <!-- Formulario simple -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <form class="space-y-3">
                    <input type="text" placeholder="Nombre" class="w-full px-3 py-2 border border-gray-300 rounded">
                    <input type="email" placeholder="Correo electrónico" class="w-full px-3 py-2 border border-gray-300 rounded">
                    <input type="tel" placeholder="Teléfono de contacto" class="w-full px-3 py-2 border border-gray-300 rounded">
                    <div class="flex items-center">
                    </div>
                    <button class="w-full bg-amber-700 text-white py-2 rounded hover:bg-amber-800">
                        Enviar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection