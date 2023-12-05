<?php
    /**
     * Modelo index.php
     * Modelo encargado de cargar los datos extraidos de la base de datos
     */

     // Creamos una conexión a la base de datos
    $conexion = new Corredores();

    // Cargamos los datos para mostrarlos en la vista principal
    $corredores = $conexion->getCorredores();
?>