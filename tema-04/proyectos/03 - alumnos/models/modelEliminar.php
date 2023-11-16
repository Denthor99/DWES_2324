<?php
    /*
        Modelo: modelEliminar.php
        Descripción: eliminar un elemento de la tabla

        Método GET:
            - id del alumno que quiero eliminar
    */

    // cargamos las tablas
    $cursos = ArrayAlumnos::getCursos();
    $asignaturas = ArrayAlumnos::getAsignaturas();
    $alumnos = new ArrayAlumnos();
    $alumnos->getAlumnos();

    // Extraemos el id a través del método get
    $id = $_GET['indice'];


    // invocamos a la función eliminar
    $alumnos->delete($id);

    // Notificacion
    $notificacion="Alumno eliminado con éxito";
?>