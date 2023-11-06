<?php
    /*
        Modelo: modelEditar.php
        Descripción: Permite editar los detalles de un artículo
    */

    // Cargamos las tablas correspondientes
    $articulos = generar_tabla();
    $categorias = generar_tabla_categorías();
    $marcas = generar_tabla_marcas();

    // Captamos el id generado automaticamente (METODO GET)
    $idArticulo = $_GET['id'];

    // Buscamos el id en el array de articulos
    $indiceBuscar = buscar($articulos,'id',$idArticulo);
    if ($indiceBuscar !== false ) {
        $articulo = $articulos[$indiceBuscar];
    } else {
        echo 'ERROR, articulo no existente';
        exit();
    }
?>