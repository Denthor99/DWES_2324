<?php
     // Controlador: buscar.php
    // Descripción: filtra la tabla a partir de la expresión de búsqueda

    // Cargamos la configuracion
    include 'config/db.php';

    // Cargamos las clases. A tener en cuenta el orden, ya que es importante
    include 'class/class.conexion.php';
    include 'class/class.alumno.php';
    include 'class/class.alumnos.php';
    
    // Cargamos el modelo
    include 'models/modelFiltrar.php';

    // Cargamos la vista principal
    include 'views/viewIndex.php';
?>