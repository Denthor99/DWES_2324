<?php
    /*
        Modelo: modelEditar.php
        Descripción: editar los detalles de un alumno

        Método GET:
            - id del alumno que quiero editar
    */
    // Captamos en una variable el id enviado a tráves del método GET
    $id = $_GET['id'];

    // Creamos una conexion
    $conexion = new Alumnos();

    // Cargamos los cursos
    $cursos = $conexion->getCursos();

    // 
    $alumno = $conexion->readAlumno($id);


?>