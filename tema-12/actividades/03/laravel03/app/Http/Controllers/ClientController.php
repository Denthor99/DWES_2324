<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Index
    public function index(){
        return "<h1 align='center'>Bienvenidos a todos</h1>";
    }

    // Create
    public function create() {
        return "Esta es la vista para crear un cliente";
    }

    // Delete
    public function delete($id) {
        return "Eliminar el cliente con id: {$id}";
    }

    // Edit
    public function edit($id){
        return "Editar datos del cliente {$id}";
    }

    // Show
    public function show($id) {
        return "Detalles del cliente {$id}";
    }
}
