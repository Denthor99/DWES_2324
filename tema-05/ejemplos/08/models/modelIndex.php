<?php
/*
    Modelo: modelIndex.php
*/

    // Creamos objeto de la clase curso
    $curso = new Curso();

    // Asignamos valores a las propiedades del objeto
    $curso->nombre = "Primero Desarrollo de Aplicaciones Multiplataformas";
    $curso->ciclo = "Desarrollo de Aplicaciones Multiplataformas";
    $curso->nombreCorto = "1DAM";
    $curso->nivel = 1;

    // Conexión a base de datos
    $fp = new Fp();
    $fp->insertarCurso($curso);

    echo "Curso añadido correctamente";

?>