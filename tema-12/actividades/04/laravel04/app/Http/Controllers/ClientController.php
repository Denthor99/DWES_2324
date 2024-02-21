<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Clientes (index)
    public function index() {
        return "<h1 align='center'>Clientes</h1>";
    }

    // Create
    public function create(){
        return "<h1 align='center'>Formulario nuevo cliente</h1>";
    }

    // Update
    public function update($id){
       return "<h1 align='center'>Actualizar datos del cliente {$id}</h1>";
    }

    // Delete
    public function delete($id){
        return "<h1 align='center'>Eliminar datos del cleinte {$id}</h1>";
    }

    // Show
    public function show($id){
        return "<h1 align='center'>Datos del cliente {$id}</h1>";
     }
}
