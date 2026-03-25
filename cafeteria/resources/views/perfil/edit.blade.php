@extends('layout.app')

@section('contenido')

<div class="flex justify-center mt-10">

<div class="bg-white shadow-lg p-8 w-96 rounded">

<h2 class="text-2xl font-bold mb-6 text-center">
Editar Perfil
</h2>

<form action="/perfil/actualizar" method="POST">
@csrf

<div class="mb-3">
<label>Nombre</label>
<input type="text" name="nombre" value="{{ $cliente['nombre'] }}" class="w-full border p-2 rounded">
</div>

<div class="mb-3">
<label>Apellido Paterno</label>
<input type="text" name="apellidoP" value="{{ $cliente['apellidoP'] }}" class="w-full border p-2 rounded">
</div>

<div class="mb-3">
<label>Apellido Materno</label>
<input type="text" name="apellidoM" value="{{ $cliente['apellidoM'] }}" class="w-full border p-2 rounded">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" value="{{ $cliente['email'] }}" class="w-full border p-2 rounded">
</div>

<div class="mb-3">
<label>Teléfono</label>
<input type="text" name="telefono" value="{{ $cliente['telefono'] }}" class="w-full border p-2 rounded">
</div>

<div class="mb-3">
<label>Nueva contraseña</label>
<input type="password" name="password" class="w-full border p-2 rounded">
</div>

<div class="mt-5 text-center">

<button class="bg-green-600 text-white px-4 py-2 rounded">
Guardar cambios
</button>

</div>

</form>

</div>

</div>

@endsection