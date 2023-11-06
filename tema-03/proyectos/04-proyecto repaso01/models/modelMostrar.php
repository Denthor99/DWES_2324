<?php
    /*
        Modelo: modelMostrar.php
        Descripción: mostramos los detalles de un artículo
    */

    // Cargamos las diferentes tablas
    $articulos = generar_tabla();
    $categorias = generar_tabla_categorías();
    $marcas = generar_tabla_marcas();

    // Cogemos el id generado de la url dinamica (metodo GET)
    $idArticulo = $_GET['id'];

    $indiceBuscar = buscar($articulos,'id',$idArticulo);
    if ($indiceBuscar !== false ) {
        $articulo = $articulos[$indiceBuscar];
    } else {
        echo 'ERROR, articulo no existente';
        exit();
    }

    
?>