<?php
    /*
        Controlador: update.php
        Descripción: actualizar los datos de un artículo
    */

    // Cargamos la configuracion
    include 'config/db.php';
    // Cargamos las clases. A tener en cuenta el orden, ya que es importante
    include 'class/class.conexion.php';
    include 'class/class.alumno.php';
    include 'class/class.alumnos.php';
    
    // Cargaremos el modelo
    include 'models/modelUpdate.php';
    
    // Redireccionamos controlador principal
    header('location: index.php');
?>