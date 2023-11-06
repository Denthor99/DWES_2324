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
    // Cargamos las tablas
    $articulos = generar_tabla();
    $categorias = generar_tabla_categorías();

    // Con el metodo post recogeremos los datos de los campos
    $descripcion = $_POST['descripcion'];
    $modelo = $_POST['modelo'];
    $categoria = $_POST['categoria'];
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
        'categoria' => $categoria,
        'unidades' => $unidades,
        'precio' => $precio
    ];
    // Añadimos el articulo actualizado a la tabla
    $articulos=actualizar($articulos,$indiceActualizar,$articulo);
?>