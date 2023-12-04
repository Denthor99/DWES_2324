<?php
/*
        Modelo: ordenar.php
        Descripción: muestra los libros a partir de un criterio

        Método GET:
            - criterio: titulo, autor, genero, precio.
    */

     

    // Capturamos el criterio
     $criterioOrder = $_GET['criterio'];

     // Conecto con la base de datos
     $conexion = new Alumnos();
     // Objeto de la clase pdostatement
     $alumnos = $conexion->order($criterioOrder);
    
?>