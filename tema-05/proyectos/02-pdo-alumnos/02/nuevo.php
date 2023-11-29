<?php
    // Controlador nuevo.php
    // Cargara el formulario de introducción de nuevo artículo
    // Cargamos la configuracion
    include 'config/db.php';
    // Cargamos las clases. A tener en cuenta el orden, ya que es importante
    include 'class/class.conexion.php';
    include 'class/class.alumno.php';
    include 'class/class.alumnos.php';

    // añadimos el modelo donde tenemos lo datos definidos
    include 'models/modelNuevo.php';

    // cargamos la vista
    include 'views/viewNuevo.php';
?>