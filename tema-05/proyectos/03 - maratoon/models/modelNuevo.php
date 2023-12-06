<?php
    /**
     * Modelo nuevo
     * Modelo encargado de mostrar en el formulario los correspondientes select
     */

     // Creamos la conexion
     $conexion = new Corredores();

     // Cargaremos las categorias
     $categorias = $conexion->getCategorias();

     // Cargamos los clubs
     $clubs = $conexion->getClubs();
?>