<?php
    /*
        Modelo: modelBuscar.php
        Descripcion: Buscamos uno o varios articulos según expresión
    */

    // Cargamos las correspondientes tablas
    $articulos = generar_tabla();
    $categorias = generar_tabla_categorías();
    $marcas = generar_tabla_marcas();

    // Obtenemos la expresion a través del método get
    $expresion = $_GET['expresion'];

    // Invocamos a la función correspondiente
    $articulos = filtrar($articulos,$expresion);
?>