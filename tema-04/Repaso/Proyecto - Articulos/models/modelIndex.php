<?php
    /*
        Modelo: modelIndex
        Descripcion: genera un array con datos de los artículos
    */
    setlocale(LC_MONETARY,"es_ES");
    $categorias = ArrayArticulos::getCategorias();
    $marcas = ArrayArticulos::getMarcas();
    $articulos = new ArrayArticulos();
    $articulos->getDatos();
?>