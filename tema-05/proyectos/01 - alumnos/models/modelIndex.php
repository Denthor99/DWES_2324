<?php
    /*
        Modelo: modelIndex
        Descripcion: crear un array con los detalles de los alumnos
    */
    setlocale(LC_MONETARY,"es_ES"); // Indicamos 

    // Conecto con la base de datos
    $db = new Fp();

    // Objeto result con los detalles del alumno
    $alumnos= $db->getAlumnos();

?>