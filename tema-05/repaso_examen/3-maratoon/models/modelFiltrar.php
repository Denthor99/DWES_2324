<?php
    /**
     * Modelo filtrar.php
     * Mostramos todos los registros que tengan una expresión específica
     */

     // Capturamos la expresión
     $expresion = $_GET['expresion'];

     // Creamos la conexion
     $conexion = new Corredores();

     // Ejecutamos el método filter
     $corredores = $conexion->filter($expresion);
?>