<?php

use Illuminate\Support\Facades\Route;

// Añadimos la ruta del controlador
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AccountController;

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

// Vinculamos cada ruta con un método del controlador
// Route::get("/clients", [ClientController::class, "index"]);
// Route::get("/clients/delete", [ClientController::class, "delete"]);
// Route::get("/clients/edit/{id}", [ClientController::class, "edit"]);
// Route::get("/clients/show/{id}", [ClientController::class, "show"]);

// Agrupamos las rutas que pertenezcan a un mismo controlador
Route::controller(ClientController::class)->group(function(){
    Route::get("/clients", "index");
    Route::get("/clients/delete", "delete");
    Route::get("/clients/edit/{id}", "edit");
    Route::get("/clients/show/{id}", "show");
    Route::get("/clients/create", "create");
});

// Generamos las rutas del AccountController, creado con resource
Route::resource('cuentas',AccountController::class);

// Definimos unas cuantas rutas de ejemplo
// Route::get('/clients', function () {
//     return '<h1>Clientes</h1>';
// });

// Route::get('/clients/delete', function () {
//     return '<h1 align="center">Eliminar clientes</h1>';
// });

// // Ruta con parametros
// Route::get('/clients/edit/{id}', function ($id) {
//     return "<h1 align='center'>Editar detalles del cliente {$id}</h1>";
// });

// Route::get('/clients/show/{id}', function ($id) {
//     return "<h1 align='center'>Detalles del cliente {$id}</h1>";
// });

// Route::get('/clients/new', function () {
//     return '<h1 align="center">Nuevo cliente</h1>';
// });

// // Ruta con parametros opcionales
// Route::get('/clients/delete/{id1}/{id2?}', function ($id1,$id2 = null) {
//     if ($id2){
//         return "<h1 align='center'>Eliminar clientes desde el {$id1} hasta el  {$id2}</h1>";
//     } else {
//         return "<h1 align='center'>Eliminar cliente {$id1}</h1>";
//     } 
// });
