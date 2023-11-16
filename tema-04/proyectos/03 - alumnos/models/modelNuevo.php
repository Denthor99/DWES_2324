<?php
    /*
        Modelo: modelNuevo.php
        Descripción: Cargamos los métodos correspondientes a los cursos y categorías, que usaremos para el select y el checkbox
    */

    // Cargamos los datos de categorias y marcas
    $cursos=ArrayAlumnos::getCursos();
    $asignaturas=ArrayAlumnos::getAsignaturas();

    $alumnos = new ArrayAlumnos();
    $alumnos->getAlumnos();
?>