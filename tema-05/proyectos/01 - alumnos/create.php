<?php
    /*
        Controlador: create.php
        Descripción: permite añadir un nuevo registro a la base de datos        
    */

    // Cargamos las clases correspondientes
    include 'class/class.conexion.php';
    include 'class/class.fp.php';
    include 'class/class.alumno.php';

    // Cargaremos el modelo
    include 'models/modelCreate.php';
    

    // Cargamos la vista
    include 'views/viewIndex.php';
?>