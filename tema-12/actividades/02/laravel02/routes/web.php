<?php

use Illuminate\Support\Facades\Route;
/**
 * Daniel Alfonso Rodríguez Santos
 * 19/02/2024
 */
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
    return view('welcome');
});

// Ruta /test
Route::get('/test', function () {
    return ("<h1 align='center'>Daniel Alfonso Rodríguez Santos</h1><br/>
    <h2 align='center'>2º Desarrollo de Aplicaciones Web (DAW) - Prueba</h2>");
});

// Ruta /api/user
Route::get('/api/user', function () {
    return ("<h1 align='center'>La Ley de Moore</h1><br/>
    <h2 align='center'>La ley de Moore expresa que aproximadamente cada 2 años se duplica el número de transistores en un microprocesador");
});

// Ruta /user/view/id
Route::get('/user/view/{id?}', function ($id = null) {
    if ($id){
        return "<h1>Vista del cliente nº{$id}</h1>";
    } else {
        return "<h1>Vista vacía</h1>";
    }
});

// Ruta /user/nombre/apellidos
Route::get('/user/{nombre}/{apellidos}', function ($nombre, $apellidos) {
    return "<h1>Buenos días {$nombre} {$apellidos}</h1>";
});


// Ruta dos paremetros uno opcional
Route::get('/bank/{infoTarjeta}/{cvc?}', function ($infoTarjeta,$cvc = null) {
    if ($cvc){
        return "<h1>cvc de la tarjeta: {$cvc}</h1>";
    } else {
        return "<h1>Detalles de la tarjeta num {$infoTarjeta}</h1>";
    }
});