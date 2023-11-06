<?php
/*
        Modelo: modelBuscar.php
        Descripción: filtra los libros a partir de la expresión búsqueda

        Método GET:
            - expresión: prompt o expresión de búsqueda
    */

    // Cargo la expresión de busqueda
    $expresion = $_GET['expresion'];

    // Creamos un array vacío donde se cargarán las filas que cumplan
    // con la expresión de busqueda
    $aux = [];
    foreach($libros as $libro){
        if(array_search($expresion,$libro,false)){
            $aux[] = $libro;
        }
    }

    // Validaremos la busqueda
    if(!empty($aux)){
        $libros = $aux;
    }
?>