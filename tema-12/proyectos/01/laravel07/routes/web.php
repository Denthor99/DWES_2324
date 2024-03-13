<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',HomeController::class);


// Rutas del controlador Student
Route::resource('student', StudentController::class);
Route::get('/student/order/{columna}', [StudentController::class, 'order'])->name('student.order');
// Route::get('/student/filter', [StudentController::class, 'filter'])->name('student.filter');

