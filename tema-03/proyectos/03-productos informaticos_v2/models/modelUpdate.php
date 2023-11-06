<?php
    /*
        Modelo: modelUpdate.php
        Descripción: actualiza los detalle de un articulo

        Método POST 
            - descripcion
            - modelo
            - Marca
            - categorias (valor númerico)
            - unidades
            - precio
        
        Método GET
            - id
    */
    // Cargamos las tablas
    $articulos = generar_tabla();
    $categorias = generar_tabla_categorías();
    $marcas = generar_tabla_marcas();

    // Con el metodo post recogeremos los datos de los campos
    $descripcion = $_POST['descripcion'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $categoria = $_POST['categorias'];
    $unidades = $_POST['unidades'];
    $precio = $_POST['precio'];

    // Obtendremos el id del artículo a actualizar a través de una url dinámica (método GET)
    $idArticulo = $_GET['id'];

    // Buscaremos dicho artículo
    $indiceActualizar = buscar($articulos,'id',$idArticulo);

    // Con los datos obtenidos del metodo POST, crearemos un array que contendrá los valores actualizados
    $articulo =  [
        'id' => $idArticulo,
        'descripcion' => $descripcion,
        'modelo' => $modelo,
        'marca'=> $marca,
        'categorias' => $categoria,
        'unidades' => $unidades,
        'precio' => $precio
    ];
    // Añadimos el articulo actualizado a la tabla
    $articulos=actualizar($articulos,$indiceActualizar,$articulo);
?>