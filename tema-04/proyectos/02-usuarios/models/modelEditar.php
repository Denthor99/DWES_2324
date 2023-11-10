<?php
    /*
        Modelo: modelEditar.php
        Descripción: editar los detalles de un artículo

        Método GET:
            - id del articulo que quiero editar
    */
    // Cargamos los valores
    $categorias = ArrayArticulos::getCategorias();
    $marcas = ArrayArticulos::getMarcas();
    $articulos = new ArrayArticulos;
    $articulos->getDatos();

    // Extraemos el id
    $idArticulo = $_GET['indice'];

    // cargamos el array de ese artículo
    $indiceArticulo = buscar($articulos,'id',$idArticulo);
    if ($indiceArticulo !==false){
        // Obtengo el array del libro
        $articulo = $articulos[$indiceArticulo];
    } else{
        echo 'ERROR: Artículo no encontrado';
        exit();
    }

?>