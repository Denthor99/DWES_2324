<?php
    /*
        Modelo: modelEditar.php
        Descripción: editar los detalles de un artículo

        Método GET:
            - id del articulo que quiero editar
    */
    // Cargamos los valores
    $marcas = ArrayArticulos::getMarcas();
    $categorias = ArrayArticulos::getCategorias();

    // Cargamos los datos
    $articulos = new ArrayArticulos();
    $articulos->getDatos();

    // Extraemos el id
    $idArticulo = $_GET['id'];

    $articulo = $articulos->read($idArticulo);

    

?>