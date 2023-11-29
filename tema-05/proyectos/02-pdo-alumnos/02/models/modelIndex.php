<?php
    /*
        Modelo: modelIndex
        Descripcion: crear un array con los detalles de los alumnos
    */
    setlocale(LC_MONETARY,"es_ES"); // Indicamos 

    // Conecto con la base de datos
    $conexion = new Alumnos();

    // Extraigo los valores del alumno
    // Objeto de la clase pdostatement
    $alumnos = $conexion->getAlumnos();

?>