<?php
    /**
     * Modelo ordenar.php
     * Ordenamos 
     */

     // Capturamos el criterio de ordenación a través del método GET
     $criterio = $_GET['criterio'];

     // Creamos la conexion
     $conexion = new Corredores();

     // Ejecutamos el método order, y lo inicializamos en una variable
     $corredores = $conexion->order($criterio);
?>