<?php
    // Controlador index.php
    // Muestra los detalles de los artículos
    
    // Cargamos la configuracion
    include 'config/db.php';
    // Cargamos las clases. A tener en cuenta el orden, ya que es importante
    include 'class/class.conexion.php';
    //include 'class/class.alumno.php'; -> No es necesario
    include 'class/class.alumnos.php';

    // Cargamos el modelo
    include 'models/modelIndex.php';

    // Cargamos la vista principal
    include 'views/viewIndex.php';
?>