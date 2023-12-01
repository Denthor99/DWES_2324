<?php
    /*
        Controlador: create.php
        Descripción: permite añadir un nuevo registro a la base de datos        
    */

    // Cargamos la configuracion
    include 'config/db.php';
    // Cargamos las clases. A tener en cuenta el orden, ya que es importante
    include 'class/class.conexion.php';
    include 'class/class.alumno.php';
    include 'class/class.alumnos.php';
    
    // Cargaremos el modelo
    include 'models/modelCreate.php';
    

    // Cargamos la vista
    include 'views/viewIndex.php';
?>