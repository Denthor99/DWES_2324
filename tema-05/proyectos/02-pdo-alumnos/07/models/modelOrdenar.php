<?php
/*
        Modelo: ordenar.php
        Descripción: muestra los libros a partir de un criterio

        Método GET:
            - criterio: titulo, autor, genero, precio.
    */

     // Conecto con la base de datos
     $conexion = new Alumnos();

     // Extraigo los valores del alumno

     $criterioOrder = $_GET['criterio'];
     // Objeto de la clase pdostatement
     $alumnos = $conexion->order($criterioOrder);
    
?>