<?php
    /*
        Modelo: modelCreate.php
        Descripción: Añadimos un nuevo artículo
    */

    // Cargamos las diferentes tablas
    $articulos = generar_tabla();
    $categorias = generar_tabla_categorías();
    $marcas = generar_tabla_marcas();

    // Lo primero que haremos será recoger los datos del formulario (metodo POST)
    $descripcion = $_POST['descripcion'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $unidades = $_POST['unidades'];
    $precio = $_POST['precio'];
    $categori = $_POST ['categorias'];

    // Como el usuario no ha introducido un id, lo generaremos de forma automatica
    $id = ultimoId($articulos);

    // Ahora crearemos un array de un artículo con los campos correspondientes
    $articulo = [
        'id' => $id,
        'descripcion' => $descripcion,
        'modelo' => $modelo,
        'marca'=> $marca,
        'categorias' => $categori,
        'unidades' => $unidades,
        'precio'=> $precio
    ];

    // Una vez creado el array, usaremos la funcion nuevo (ubicada en crud_funciones) para introducir ese nuevo elemento en el array $articulos
    $articulos = nuevo($articulos,$articulo);
?>