<?php
/*
        Modelo: ordenar.php
        Descripción: muestra los libros a partir de un criterio

        Método GET:
            - criterio: titulo, autor, genero, precio.
    */

    // Cargamos las correspondientes tablas
    $articulos = generar_tabla();
    $categorias = generar_tabla_categorías();
    $marcas=generar_tabla_marcas();
    // Caargo el criterio de ordenación
    $criterio = $_GET['criterio'];

    // Invocamos la función que se encargará de ordenar el contenido de la vista
    $articulos = ordenar($articulos, $criterio);
    
?>