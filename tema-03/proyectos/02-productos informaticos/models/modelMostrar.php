<?php
    /* 
        Modelo: modelMostrar.php
        Descripción: muestra los detalles de un artículo

        Método GET:
            - id del artículo que quiero mostrar
    */

    // cargamos los datos
    $articulos = generar_tabla();
    $categorias = generar_tabla_categorías();

    // obtenemos el id a través del método GET
    $id = $_GET['id'];

    // cargamos el array de ese artículo
    $indiceArticulo = buscar($articulos,'id',$id);
    if ($indiceArticulo !==false){
        // Obtengo el array del libro
        $articulo = $articulos[$indiceArticulo];
    } else{
        echo 'ERROR: Libro no encontrado';
        exit();
    }
?>