<?php
    /**
     * Modelo ordenar.php
     * Muestra en una tabla todos los corredores
     */

     // Capturamos el criterio usando el método GET
     $criterio = $_GET['criterio'];

     // Creamos la conexión
     $conexion = new Corredores();

     // Ejecutamos el método order, y lo inicializammos variable
     $corredores = $conexion->order($criterio);
?>