<?php
    /**
     * Modelo index.php
     * Conexión a la base de datos + cargar los datos
     * 
     */

     // Creamos la conexión
     $conexion = new Corredores();

     // Cargamos los datos
     $corredores = $conexion->getCorredores();
?>