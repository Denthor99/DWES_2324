<?php
    /*
        Modelo: modelOrdenar.php
        Descripcion: Ordenamos la tabla según criterio
    */

    // Cargamos las tablas correspondientes
    $articulos = generar_tabla();
    $categorias = generar_tabla_categorías();
    $marcas = generar_tabla_marcas();

    // Recogemos el criterio (Método GET)
    $criterio = $_GET['criterio'];

    // Invocamos a la funcion
    $articulos = ordenar($articulos, $criterio);
?>