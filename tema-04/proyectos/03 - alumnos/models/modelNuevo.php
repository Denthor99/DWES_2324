<?php
    /*
        Modelo: modelNuevo.php
        Descripción: Cargamos los arrays correspondientes para mostrar las categorias y marcas en los apartados "select" y "checkbox"
    */

    // Cargamos los datos de categorias y marcas
    $categorias = ArrayArticulos::getCategorias();
    $marcas = ArrayArticulos::getMarcas();

    $articulos=new ArrayArticulos();
    $articulos->getDatos();
?>