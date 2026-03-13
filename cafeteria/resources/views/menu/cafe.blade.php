@extends('menu.menu')

@section('app', 'Cafe')

@section('contenido')
<h1 class="text-4xl text-center font-bold text-amber-900 mb-4">Café</h1>
    <hr class="border-2 border-amber-900 mb-8 w-24 mx-auto">

<div class="grid grid-cols-4 gap-4">

<!-- PRODUCTO -->
        <div class="bg-white rounded-lg shadow-lg p-4">
            <h3 class="font-bold text-lg">Café Americano</h3>
            <img src="/imagenes/cafe.jpg" class="w-70 h-75" alt="">
            <p class="text-amber-700 font-bold text-xl">$45</p>
            <button onclick="agregarAlPedido(1,'Café Americano',45)" class="mt-2 w-full text-white py-2 rounded" style="background-color: var(--color-taupe-700);">
            Agregar al pedido
            </button>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-4">
            <h3 class="font-bold text-lg">Cappuccino</h3>
            <img src="/imagenes/cafe.jpg" class="w-70 h-75"" alt="">
            <p class="text-amber-700 font-bold text-xl">$55</p>
            <button onclick="agregarAlPedido(2,'Cappuccino',55)" class="mt-2 w-full text-white py-2 rounded" style="background-color: var(--color-taupe-700);">
            Agregar al pedido
            </button>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-4">
            <h3 class="font-bold text-lg">Latte</h3>
            <img src="/imagenes/cafe.jpg" class="w-70 h-75" alt="">
            <p class="text-amber-700 font-bold text-xl">$52</p>
            <button onclick="agregarAlPedido(3,'Latte',52)" class="mt-2 w-full text-white py-2 rounded" style="background-color: var(--color-taupe-700);">
            Agregar al pedido
            </button>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-4">
            <h3 class="font-bold text-lg">Mocha</h3>
            <img src="/imagenes/cafe.jpg" class="w-70 h-75" alt="">
            <p class="text-amber-700 font-bold text-xl">$58</p>
            <button onclick="agregarAlPedido(4,'Mocha',58)" class="mt-2 w-full  text-white py-2 rounded" style="background-color: var(--color-taupe-700);">
            Agregar al pedido
            </button>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-4">
            <h3 class="font-bold text-lg">Croissant</h3>
            <img src="/imagenes/cafe.jpg" class="w-70 h-75" alt="">
            <p class="text-amber-700 font-bold text-xl">$35</p>
            <button onclick="agregarAlPedido(5,'Croissant',35)" class="mt-2 w-full text-white py-2 rounded" style="background-color: var(--color-taupe-700);">
            Agregar al pedido
            </button>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-4">
            <h3 class="font-bold text-lg">Brownie</h3>
            <img src="/imagenes/cafe.jpg" class="w-70 h-75" alt="">
            <p class="text-amber-700 font-bold text-xl">$40</p>
            <button onclick="agregarAlPedido(6,'Brownie',40)" class="mt-2 w-full text-white py-2 rounded" style="background-color: var(--color-taupe-700);">
            Agregar al pedido
            </button>
        </div>

    </div>
</div>

</div>

<script>
    function agregarAlPedido(id,nombre,precio){

let producto = carrito.find(p=>p.id==id);

if(producto){
producto.cantidad++;
}else{

carrito.push({
id:id,
nombre:nombre,
precio:precio,
cantidad:1
});

}

renderCarrito();

}
</script>

@endsection