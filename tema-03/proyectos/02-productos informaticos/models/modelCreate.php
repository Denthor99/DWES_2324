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


    // Carga de datos
    $categorias = generar_tabla_categorías();
    $articulos = generar_tabla();

    // Recogemos los datos del formulario
    $descripcion = $_POST['descripcion'];
    $modelo = $_POST['modelo'];
    $categori = $_POST['categorias'];
    $unidades = $_POST['unidades'];
    $precio = $_POST['precio'];

    // Deberemos crear la estructura de un array asociativo
    // Al no pedir introducir un id, deberá generarse automaticamente
    $id = ultimoId($articulos);

    // Invocamos a la función nuevo(), que nos permitirá introducir
    //nuevo($articulos,$id,$descripcion,$modelo,$categori,$unidades,$precio);
    $articulo = [
        'id' => $id,
        'descripcion'=> $descripcion,
        'modelo'=> $modelo,
        'categoria'=> $categori,
        'unidades'=> $unidades,
        'precio'=> $precio
    ];

    // Añadimos el artículo usando la funcion nuevo
    $articulos = nuevo($articulos, $articulo);

?>