<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //return 'Hola Mundo!!!';
    return view('welcome');
});

// Definimos unas cuantas rutas de ejemplo
Route::get('/clients', function () {
    return '<h1>Hola Clientes!!</h1>';
});

Route::get('/clients/delete', function () {
    return '<h1 align="center">Eliminar clientes</h1>';
});

// Ruta con parametros
Route::get('/clients/edit/{id}', function ($id) {
    return "<h1 align='center'>Editar detalles del cliente {$id}</h1>";
});

Route::get('/clients/show/{id}', function ($id) {
    return "<h1 align='center'>Detalles del cliente {$id}</h1>";
});

Route::get('/clients/new', function () {
    return '<h1 align="center">Nuevo cliente</h1>';
});

// Ruta con parametros opcionales
Route::get('/clients/delete/{id1}/{id2?}', function ($id1,$id2 = null) {
    if ($id2){
        return "<h1 align='center'>Eliminar clientes desde el {$id1} hasta el  {$id2}</h1>";
    } else {
        return "<h1 align='center'>Eliminar cliente {$id1}</h1>";
    } 
});
