<?php
    /*
        Modelo: modelCreate.php
        Descripción: Cargaremos los datos del formulario nuevo y los introducimos al array original de artículos

        Método POST 
            - descripcion
            - modelo
            - categorias (valor númerico)
            - unidades
            - precio
        
        El id será generado de forma automatica por la función ultimoId()
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
    $marca = $_POST['marca'];
    $categorias_art = $_POST['categorias'];
    $precio = $_POST['precio'];
    $unidades = $_POST['unidades'];

    // Creamos un objeto 
    $articulo = new Articulo($id,$descripcion,$modelo,$marca,$categorias_art,$unidades,$precio);

    // Añadimos el artículo usando la funcion nuevo
    $articulos->create($articulo);

?>