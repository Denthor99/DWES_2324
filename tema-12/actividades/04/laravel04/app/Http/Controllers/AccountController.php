<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    // index
    public function index() {
        return "<h1 align='center'>Cuentas</h1>";
    }

    // Create
    public function create(){
        return "<h1 align='center'>Formulario creación nueva cuenta</h1>";
    }

    // Update
    public function update($id){
       return "<h1 align='center'>Actualizar datos de la cuenta {$id}</h1>";
    }

    // Delete
    public function delete($id){
        return "<h1 align='center'>Eliminar cuenta nº{$id}</h1>";
    }

    // Show
    public function show($id){
        return "<h1 align='center'>Datos de la cuenta {$id}</h1>";
     }

    // edit
    public function edit($id){
        return "<h1 align='center'>Editar datos de la cuenta {$id}</h1>";
     }
}
