<?php
    /*
        Modelo: modelEditar.php
        Descripción: editar los detalles de un alumno

        Método GET:
            - id del alumno que quiero editar
    */
    // Cargamos los valores correspondientes
    $cursos=ArrayAlumnos::getCursos();
    $asignaturas=ArrayAlumnos::getAsignaturas();

    # Creamos un objeto de la clase ArrayAlumnos
    $alumnos = new ArrayAlumnos();

    // Cargamos los datos
    $alumnos->getAlumnos();

    // Extraemos el id
    $indice = $_GET['indice'];

    // cargamos los detallas del alumno a partir del indice (dentro de un objeto de la clase alumno)
    $alumno = $alumnos->read($indice);

?>