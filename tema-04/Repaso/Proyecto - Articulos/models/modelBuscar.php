<?php
    /* 
        Modelo: model.buscar.php
        Descripcion: filtra los artículos a partir de la expresión búsqueda

        Método GET:
            - expresión: expresión de busqueda
    */

    // Cargamos los datos
    $articulos = generar_tabla();
    $categorias = generar_tabla_categorías();

    // Cargamos la expresion
    $expresion = $_GET['expresion'];

    // Invocamos la funcion
    $articulos = filtrar($articulos,$expresion);
?>