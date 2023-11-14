<?php
    /*
        Modelo: modelIndex
        Descripcion: genera un array con datos de los alumnos
    */
    setlocale(LC_MONETARY,"es_ES"); // Indicamos 

    // Cargamos los arrays a partir de los métodos estáticos
    $asignaturas = ArrayAlumnos::getAsignaturas();
    $cursos = ArrayAlumnos::getCursos();

    // Creamos un objeto de la clase ArrayArticulos
    $alumnos = new ArrayAlumnos(); // Inicializado como array vacio
    $alumnos->getAlumnos(); // Cargamos los datos
?>