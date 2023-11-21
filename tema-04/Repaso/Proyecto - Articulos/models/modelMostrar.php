<?php
    /* 
        Modelo: modelMostrar.php
        Descripción: muestra los detalles de un artículo

        Método GET:
            - id del artículo que quiero mostrar
    */

    // cargamos los datos
    $categorias = ArrayArticulos::getCategorias();
    $marcas = ArrayArticulos::getMarcas();

    // Creamos un objeto de la clase ArrayArticulos
    $articulos = new ArrayArticulos();

    // Cargamos los datos
    $articulos->getDatos();

    // obtenemos el id a través del método GET
    $indice = $_GET['id'];

    // cargamos el array de ese artículo
    $articulo = $articulos->read($indice);
?>