<?php
    /*
        Modelo: modelEliminar.php
        Descripción: eliminar un elemento de la tabla

        Método GET:
            - id del artículo que quiero eliminar
    */

    // cargamos las tablas
    $articulos = generar_tabla();
    $categorias = generar_tabla_categorías();
    $marcas = generar_tabla_marcas();

    // Extraemos el id a través del método get
    $id = $_GET['id'];


    // invocamos a la función eliminar
    $articulos = eliminar($articulos,$id);
?>