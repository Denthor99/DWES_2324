<?php
    /*
        Modelo: modelUpdate.php
        Descripción: actualizaremos los datos de un artículo
    */

     // Cargamos las tablas correspondientes
     $articulos = generar_tabla();
     $categorias = generar_tabla_categorías();
     $marcas = generar_tabla_marcas();

      // Con el metodo post recogeremos los datos de los campos
    $descripcion = $_POST['descripcion'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $categori = $_POST['categorias'];
    $unidades = $_POST['unidades'];
    $precio = $_POST['precio'];

     // Obtenmos el id (método GET)
     $idArticulo = $_GET['id'];

     // Busacamos el articulo
     $indiceActualizar = buscar($articulos,'id',$idArticulo);

     // Creamos el articulo (machacamos el original)
     $articulo = [
        'id' => $idArticulo,
        'descripcion' => $descripcion,
        'modelo' => $modelo,
        'marca'=> $marca,
        'categorias' => $categori,
        'unidades' => $unidades,
        'precio'=> $precio
    ];

    // Invocamos a la funcion actualizar
    $articulos = actualizar($articulos,$indiceActualizar,$articulo);
?>