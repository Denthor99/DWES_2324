<?php
    /* 
        Modelo: model.buscar.php
        Descripcion: filtra los artículos a partir de la expresión búsqueda

        Método GET:
            - expresión: expresión de busqueda
    */

    // Conecto con la base de datos
    $conexion = new Alumnos();

    // Cargamos la expresion
    $expresion = $_GET['expresion'];

    // Invocamos la funcion
    $alumnos = $conexion->filter($expresion);
?>