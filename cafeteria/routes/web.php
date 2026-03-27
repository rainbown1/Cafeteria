<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\AuthClienteController;
use App\Http\Controllers\RegistroClienteController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PagoController;


Route::view('/inicio','inicio');
Route::view('/contacto','contacto');
Route::view('/nosotros','nosotros');

Route::get('/pago/{id_pedido}', [PagoController::class, 'showCheckout'])->name('checkout');

Route::post('/process_payment', [PagoController::class, 'procesarPago'])->name('process.payment');

Route::get('/pago-exitoso/{id_pedido}', [PagoController::class,'obtenerTotalPedido']);

Route::view('/login','layout.login');
Route::post('/login',[AuthClienteController::class,'login'])->name('login');
Route::post('/logout',[AuthClienteController::class,'logout'])->name('logout');

Route::get('/carrito',[CarritoController::class,'index'])->name('carrito');
Route::post('/carrito/agregar',[CarritoController::class,'agregar'])->name('carrito.agregar');
Route::post('/carrito/actualizar',[CarritoController::class,'actualizar'])->name('carrito.actualizar');
Route::get('/carrito/eliminar/{id}',[CarritoController::class,'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/vaciar',[CarritoController::class,'vaciar'])->name('carrito.vaciar');

Route::get('/productos',[ProductosController::class,'index']);
Route::get('/detalle/{id_producto}',[ProductosController::class,'show']);

Route::post('/pedido/procesar', [PedidoController::class, 'procesar'])->name('pedido.procesar');


Route::view('/registro','registro');
Route::post('registro', [RegistroClienteController::class,'store'])->name('registro.store');

Route::get('/perfil',[PerfilController::class,'index']);
Route::get('/perfil/editar',[PerfilController::class,'edit']);
Route::post('/perfil/actualizar',[PerfilController::class,'update']);