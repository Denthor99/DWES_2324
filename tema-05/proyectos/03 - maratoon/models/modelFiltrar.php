<?php
    /**
     * Model filtrar.php
     * Según una expresión, muestra los registros que coincidan con dicha expresion
     */

     // Capturamos la expresion
     $expresion = $_GET['expresion'];

     // Creamos la conexion
     $conexion = new Corredores();

     // Añadimos a una variable el resultado del metodo (objeto de tipo PDOStatement)
     $corredores = $conexion->filter($expresion);
?>