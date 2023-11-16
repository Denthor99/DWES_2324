<?php
    // Controlador: editar.php
    // Descripción: Mostrar un formulario con los detalles editables del alumno seleccionado

    // Cargamos las clases correspondientes
    include 'class/class.alumno.php';
    include 'class/class.arrayAlumnos.php';


    // Modelos
    include 'models/modelEditar.php'; // Cargo los detalles del alumno a editar

    // vista
    include "views/viewEditar.php"; // Mostrar la vista con los detalles del alumno
?>