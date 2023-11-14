<?php
    /*
        Modelo: modelEditar.php
        Descripción: editar los detalles de un artículo

        Método GET:
            - id del articulo que quiero editar
    */
    // Cargamos los valores correspondientes
    $categorias = ArrayArticulos::getCategorias();
    $marcas = ArrayArticulos::getMarcas();

    # Creamos un objeto de la clase ArrayArticulos
    $articulos = new ArrayArticulos;

    // Cargamos los datos
    $articulos->getDatos();

    // Extraemos el id
    $idArticulo = $_GET['indice'];

    // cargamos los detallas del artículo a partir del indice (dentro de un objeto de la clase artículo)
    $articulo = $articulos->read($idArticulo);


?>