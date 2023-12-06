<?php
    /**
     * Model editar.php
     * Muestra los datos de un corredor para su correspondiente edicion
     */

     // Capturamos el id con el método get
     $id = $_GET['id'];

     // Creamos la conexion
     $conexion = new Corredores();

     // Cargamos las categorias
     $categorias = $conexion->getCategorias();

     // Cargamos los clubs
     $clubs = $conexion->getClubs();

     // Cargamos los datos del corredor
     $corredor = $conexion->read($id);
?>