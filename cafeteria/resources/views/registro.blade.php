@extends('layout.app')

@section('app', 'Registro de Cliente')

@section('contenido')

    <div class="w-full flex justify-center mt-10">

        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg">

            <h2 class="text-2xl font-bold text-center text-amber-900 mb-6">
                Registro de Cliente
            </h2>

            <form action="{{ route('registro.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1">Nombre</label>
                    <input type="text" name="nombre"
                        class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-amber-600" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1">Apellido Paterno</label>
                    <input type="text" name="apellidoP"
                        class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-amber-600" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1">Apellido Materno</label>
                    <input type="text" name="apellidoM"
                        class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-amber-600" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1">Teléfono</label>
                    <input type="text" name="telefono"
                        class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-amber-600">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1">Correo electrónico</label>
                    <input type="email" name="email"
                        class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-amber-600">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1">Contraseña</label>
                    <input type="password" name="password"
                        class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-amber-600">
                </div>

                <button type="submit" class="w-full bg-amber-700 hover:bg-amber-800 text-white py-2 rounded font-semibold">
                    Registrar cliente
                </button>

            </form>

        </div>

    </div>

@endsection
