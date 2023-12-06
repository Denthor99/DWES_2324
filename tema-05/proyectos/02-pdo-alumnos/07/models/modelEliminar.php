<?php
    /*
        Modelo: modelEliminar.php
        Descripción: eliminar un elemento de la tabla

        Método GET:
            - id del artículo que quiero eliminar
    */

    // cargamos las tablas
    $conexion = new Alumnos();

    // Extraemos el id a través del método get
    $id = $_GET['id'];

    // Cargamos los cursos
    //$cursos = $conexion->getCursos();
    // Cargamos los alumnos
    //$alumnos = $conexion->getAlumnos();
   // Borramos el alumno
   $conexion->deleteAlumno($id);
?>