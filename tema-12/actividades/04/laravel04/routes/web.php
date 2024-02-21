<?php

use Illuminate\Support\Facades\Route;

// Añadimos la ruta al controlador Client
use App\Http\Controllers\ClientController;

// Añadimos la ruta del controlador Producto
use App\Http\Controllers\ProductoController;

// Añadimos la ruta del controlador Account
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
    return view('welcome');
});

// Agrupamos las rutas del controlador Client
Route::controller(ClientController::class)->group(function(){
    Route::get("/clients", "index");
    Route::get("/clients/delete/{id}", "delete");
    Route::get("/clients/update/{id}", "update");
    Route::get("/clients/show/{id}", "show");
    Route::get("/clients/create", "create");
});

// Agregamos la ruta del controlador Producto, que ha sido creado usando resource
Route::resource('productos',ProductoController::class);

// Agregamos la ruta del controladro  Account y le asignamos un nombre a cada una de sus funciones
Route::controller(AccountController::class)->group(function(){
    Route::get("cuentas", "index")->name("cuentas.index");
    Route::get("cuentas/create", "create")->name("cuentas.create");
    Route::get("cuentas/update/{id}", "update")->name("cuentas.update");
    Route::get("cuentas/edit/{id}", "edit")->name("cuentas.edit");
    Route::get("cuentas/delete/{id}", "delete")->name("cuentas.delete");
    Route::get("cuentas/show/{id}", "show")->name("cuentas.show");
});