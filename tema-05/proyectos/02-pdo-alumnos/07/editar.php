<?php
    // Controlador: editar.php
    // Descripción: Mostrar un formulario con los detalles editables del alumno seleccionado

     // Cargamos la configuracion
     include 'config/db.php';
     // Cargamos las clases. A tener en cuenta el orden, ya que es importante
     include 'class/class.conexion.php';
     include 'class/class.alumno.php';
     include 'class/class.alumnos.php';
     
     // Cargaremos el modelo
     include 'models/modelEditar.php';
     
 
     // Cargamos la vista
     include 'views/viewEditar.php';
 ?>
?>