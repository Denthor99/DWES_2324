<?php
    /*
        Modelo: modelEliminar.php
        Descripción: eliminar un elemento de la tabla

        Método GET:
            - id del artículo que quiero eliminar
    */

    // cargamos las tablas
    $marcas = ArrayArticulos::getMarcas();
    $categorias = ArrayArticulos::getCategorias();

    // Creamos un objeto de la clase ArrayArticulos
    $articulos = new ArrayArticulos();

    // Cargamos los datos
    $articulos->getDatos();
    // Extraemos el id a través del método get
    $indice= $_GET['id'];


    // invocamos a la función eliminar
    $articulos->delete($indice);
?>