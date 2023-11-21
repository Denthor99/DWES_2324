<?php
    /*
        Modelo: modelNuevo.php
        Descripción: introducir un nuevo elemento a la tabla
    */

    // Cargamos los datos de marcas y categorias
    $categorias = ArrayArticulos::getCategorias();
    $marcas = ArrayArticulos::getMarcas();
?>