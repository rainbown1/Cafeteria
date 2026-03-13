<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/inicio','inicio');
Route::view('/registro', 'registro');
Route::view('/contacto','contacto');
Route::view('/nosotros','nosotros');

Route::view('/detalles','detalle_producto');
Route::view('/cafe','menu.cafe');
Route::view('/bebidas','menu.bebidas');
Route::view('/snacks','menu.snacks');
Route::view('/postres','menu.postres');
