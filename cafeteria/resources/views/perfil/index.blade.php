@extends('layout.app')

@section('contenido')
    <div class="flex justify-center mt-10">
        <div class="bg-white shadow-lg p-8 w-96 rounded">

            <h2 class="text-2xl font-bold mb-6 text-center">
                Perfil del Cliente
            </h2>

            <div class="space-y-3">

                <p>
                    <strong>Nombre:</strong>
                    {{ $cliente['nombre'] }}
                </p>

                <p>
                    <strong>Apellido Paterno:</strong>
                    {{ $cliente['apellidoP'] }}
                </p>

                <p>
                    <strong>Apellido Materno:</strong>
                    {{ $cliente['apellidoM'] }}
                </p>

                <p>
                    <strong>Email:</strong>
                    {{ $cliente['email'] }}
                </p>

                <p>
                    <strong>Teléfono:</strong>
                    {{ $cliente['telefono'] }}
                </p>

                <p>
                    <strong>Fecha registro:</strong>
                    {{ $cliente['fecha_registro'] }}
                </p>

                <div class="mt-6 text-center">
                    <a href="/perfil/editar" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Editar perfil
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection
