<?php
    /**
     * Modelo nuevo.php
     * Muestra un formulario donde se escribiran los datos para añadir a un nuevo corredor
     */

     // Creamos la conexión
     $conexion = new Corredores();

     // Cargamos las categorias
     $categorias = $conexion->getCategorias();

     // Cargamos los clubs
     $clubs = $conexion->getClubs();
?>