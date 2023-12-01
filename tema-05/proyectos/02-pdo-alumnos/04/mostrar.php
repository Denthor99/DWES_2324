<?php
/*
    Controlador: mostrar.php
    Descripción: muestra los detalles del alumno seleccionado
*/

// Cargamos la configuracion
include 'config/db.php';
// Cargamos las clases. A tener en cuenta el orden, ya que es importante
include 'class/class.conexion.php';
include 'class/class.alumno.php';
include 'class/class.alumnos.php';

// Cargamos modelo
include 'models/modelMostrar.php';

// Cargamos vista
include 'views/viewMostrar.php';
?>