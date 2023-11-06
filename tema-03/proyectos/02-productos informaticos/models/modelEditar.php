<?php
    /*
        Modelo: modelEditar.php
        Descripción: editar los detalles de un artículo

        Método GET:
            - id del articulo que quiero editar
    */
    // Cargamos los valores
    $articulos = generar_tabla();
    $categorias = generar_tabla_categorías();

    // Extraemos el id
    $idArticulo = $_GET['id'];

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