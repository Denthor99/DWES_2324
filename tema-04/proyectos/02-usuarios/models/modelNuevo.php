<?php
    /*
        Modelo: modelNuevo.php
        Descripción: introducir un nuevo elemento a la tabla
    */

    // Cargamos los datos de categorias
    
    $categorias = ArrayArticulos::getCategorias();
    $marcas = ArrayArticulos::getMarcas();

    $articulos=new ArrayArticulos();
    $articulos->getDatos();
?>