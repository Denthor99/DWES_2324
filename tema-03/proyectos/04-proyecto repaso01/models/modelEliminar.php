<?php
    /*
        Modelo: modelEliminar.php
        Descripcion: Eliminamos un elemento de la tabla articulos
    */

    // Cargamos las tablas correspondientes
    $articulos = generar_tabla();
    $categorias = generar_tabla_categorías();
    $marcas = generar_tabla_marcas();

    // Obtenemos el id generado automaticamente (Método GET)
    $idArticulo = $_GET['id'];

    // Invocamos a la función eliminar
    $articulos = eliminar($articulos,$idArticulo);
?>