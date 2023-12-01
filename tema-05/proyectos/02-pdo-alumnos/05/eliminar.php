<?php
     /*
        Controlador: eliminar.php
        Descripción: permite eliminar un elemento de la tabla
     */

    // Cargamos la configuracion
    include 'config/db.php';
    // Cargamos las clases. A tener en cuenta el orden, ya que es importante
    include 'class/class.conexion.php';
    include 'class/class.alumno.php';
    include 'class/class.alumnos.php';
    
    // Cargamos el modelo
    include 'models/modelEliminar.php';

    
    // Notificación
   $notificacion = "Alumno eliminado satisfactoriamente";
   
    // Cargamos la vista principal
    header('location: index.php');
?>