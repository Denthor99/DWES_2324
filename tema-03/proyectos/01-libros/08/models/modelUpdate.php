<?php
/*
        Modelo: modelUpdate.php
        Descripción: actualiza los detalle del libro

        Método POST
            - id del libro 
            - titulo
            - autor
            - genero
            - precio
        
        Método GET
            - id
    */

    // cargamos la tabla
    $libros = generar_tabla();

    // Extraemos el valor de las distintas variables enviadas por el metodo POST
    // Debemos tener en cuenta en viewEditar que el valor id debe ser readonly. Con disabled no te envia el valor
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $genero = $_POST['genero'];
    $precio = $_POST['precio'];

    // id del libro que quiero editar
    $id_editar = $_GET['id'];

    // Obtener el indice del libro
    $indiceLibroEditar = buscar_en_tabla($libros,'id',$id_editar);

    // Creamos un array asociativo con los detalles del libro modificado
    $libro = [
        'id' => $id,
        'titulo'=> $titulo,
        'autor'=> $autor,
        'genero'=> $genero,
        'precio'=> $precio
    ];

    // Actualizo la tabla libros
    $libros[$indiceLibroEditar] = $libro;

?>