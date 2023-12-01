<?php
    /*
        Controlador: ordenar.php
        Descripción: ordena el contenido 
    */

    // Cargamos la configuracion
    include 'config/db.php';
    // Cargamos las clases. A tener en cuenta el orden, ya que es importante
    include 'class/class.conexion.php';
    include 'class/class.alumno.php';
    include 'class/class.alumnos.php';

    // Cargamos modelo
    include 'models/modelOrdenar.php';

    // Cargamos la vista principal
    include 'views/viewIndex.php';
?>