<?php
    /*
        Modelo: modelIndex
        Descripcion: genera un array con datos de los artículos
    */
    setlocale(LC_MONETARY,"es_ES"); // Indicamos 
    $articulos = generar_tabla();
    $categorias = generar_tabla_categorías();
    $marcas = generar_tabla_marcas();
?>