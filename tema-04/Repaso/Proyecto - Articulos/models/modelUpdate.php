<?php
    /*
        Modelo: modelUpdate.php
        Descripción: actualiza los detalle de un articulo

        Método POST 
            - descripcion
            - modelo
            - categorias (valor númerico)
            - unidades
            - precio
        
        Método GET
            - id
    */
    // cargamos los datos
    $categorias = ArrayArticulos::getCategorias();
    $marcas = ArrayArticulos::getMarcas();

    // Creamos un objeto de la clase ArrayArticulos
    $articulos = new ArrayArticulos();

    // Cargamos los datos
    $articulos->getDatos();

    // Capturamos las variables
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marcas'];
    $categorias_art = $_POST['categorias'];
    $precio = $_POST['precio'];
    $unidades = $_POST['unidades'];


    // Obtendremos el id del artículo a actualizar a través de una url dinámica (método GET)
    $idArticulo = $_GET['id'];

    // Creamos un objeto 
    $articulo = new Articulo($id,$descripcion,$modelo,$marca,$categorias_art,$unidades,$precio);

    $articulos->update($idArticulo,$articulo);
?>