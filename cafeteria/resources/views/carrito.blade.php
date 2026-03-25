@extends('layout.app')

@section('contenido')

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-amber-900">Mi Carrito de Compras</h1>

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

    @if(empty($carrito))
        <div class="text-center py-12">
            <p class="text-gray-500 text-xl mb-4">Tu carrito está vacío</p>
            <a href="/productos" class="bg-amber-700 hover:bg-amber-800 text-white px-6 py-3 rounded-lg">
                Ver Menú
            </a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full border-collapse bg-white shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-amber-800 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">Imagen</th>
                        <th class="py-3 px-4 text-left">Producto</th>
                        <th class="py-3 px-4 text-left">Precio</th>
                        <th class="py-3 px-4 text-left">Cantidad</th>
                        <th class="py-3 px-4 text-left">Subtotal</th>
                        <th class="py-3 px-4 text-left">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($carrito as $id_producto => $producto)
                        @php 
                            $subtotal = $producto['precio'] * $producto['cantidad'];
                            $total += $subtotal;
                        @endphp
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">
                                <img src="{{ $producto['img'] }}" 
                                     alt="{{ $producto['nombre'] }}" 
                                     class="w-20 h-20 object-cover rounded">
                            </td>
                            <td class="py-3 px-4 font-semibold">{{ $producto['nombre'] }}</td>
                            <td class="py-3 px-4">${{ number_format($producto['precio'], 2) }}</td>
                            <td class="py-3 px-4">
                                <form action="{{ route('carrito.actualizar') }}" method="POST" class="flex items-center space-x-2">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id_producto }}">
                                    <input type="number" 
                                           name="cantidad" 
                                           value="{{ $producto['cantidad'] }}" 
                                           min="1"
                                           class="w-20 border rounded px-2 py-1 text-center focus:outline-none focus:ring-2 focus:ring-amber-600">
                                    <button type="submit" 
                                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
                                        Actualizar
                                    </button>
                                </form>
                            </td>
                            <td class="py-3 px-4 font-semibold text-amber-700">${{ number_format($subtotal, 2) }}</td>
                            <td class="py-3 px-4">
                                <a href="{{ route('carrito.eliminar', $id_producto) }}" 
                                   class="text-red-600 hover:text-red-800"
                                   onclick="return confirm('¿Eliminar producto del carrito?')">
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-8 flex flex-col md:flex-row justify-between items-start md:items-center bg-gray-50 p-6 rounded-lg">
            <div class="mb-4 md:mb-0">
                <h2 class="text-2xl font-bold text-amber-900">Total: ${{ number_format($total, 2) }}</h2>
            </div>
            
            <div class="flex space-x-4">
                <a href="{{ route('carrito.vaciar') }}" 
                   class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg"
                   onclick="return confirm('¿Vaciar todo el carrito?')">
                    Vaciar carrito
                </a>
                <a href="/productos" 
                   class="bg-amber-600 hover:bg-amber-700 text-white px-6 py-3 rounded-lg">
                    Seguir comprando
                </a>
            </div>
        </div>

        <!-- SECCIÓN DE PAGO -->
        <div class="mt-8 bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4 text-amber-900">Finalizar pedido</h2>
            
            <form action="{{ route('pedido.procesar') }}" method="POST">
                @csrf
                
                <!-- Selección de mesa -->
                <div class="mb-6">
                    <label for="id_mesa" class="block text-gray-700 font-semibold mb-2">
                        Número de mesa <span class="text-sm text-gray-500">(opcional)</span>
                    </label>
                    <select name="id_mesa" id="id_mesa" 
                            class="w-full md:w-64 border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-600">
                        <option value="">Seleccionar mesa</option>
                        <option value="1">Mesa 1</option>
                        <option value="2">Mesa 2</option>
                        <option value="3">Mesa 3</option>
                        <option value="4">Mesa 4</option>
                        <option value="5">Mesa 5</option>
                    </select>
                </div>

                <!-- Resumen del pedido -->
                <div class="mb-6">
                    <h3 class="font-semibold text-lg mb-2">Resumen del pedido:</h3>
                    <div class="bg-gray-50 p-4 rounded">
                        @foreach($carrito as $producto)
                            <div class="flex justify-between text-sm mb-1">
                                <span>{{ $producto['nombre'] }} x{{ $producto['cantidad'] }}</span>
                                <span>${{ number_format($producto['precio'] * $producto['cantidad'], 2) }}</span>
                            </div>
                        @endforeach
                        <div class="border-t mt-2 pt-2 font-bold flex justify-between">
                            <span>Total a pagar:</span>
                            <span class="text-amber-700">${{ number_format($total, 2) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Botón de pago -->
                <button type="submit" 
                        class="w-full md:w-auto bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-lg text-lg transition duration-300">
                    Proceder al pago
                </button>
            </form>
        </div>
    @endif
</div>

@endsection