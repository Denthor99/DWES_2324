<?php
    /*
        Controlador: create.php
        Descripción: añadimos el nuevo alumno al array de alumnos       
    */

    // Cargamos las clases correspondientes
    include 'class/class.alumno.php';
    include 'class/class.arrayAlumnos.php';

    // Cargaremos el modelo
    include 'models/modelCreate.php';
    

    // Cargamos la vista
    include 'views/viewIndex.php';
?>