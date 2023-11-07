<?php

    /*
        Modelo: model.create.PHP
        Descripcion: Añade un elemento a la tabla 

        Método POST
            - titulo
            - pais
            - director
            - generos (array)
            - año
    */

    // Cargamos los datos de la tabla
    $peliculas = getPeliculas();
    $paises = getPaises();
    $generos = getGeneros();

    // Recogemos los datos enviados a tráves del método POST
    // Para el id deberemos generarlo automaticamente usando una funcion creada por nosotros
    $id=generarId($peliculas);
    $titulo = $_POST['titulo'];
    $pais = $_POST['pais'];
    $director = $_POST['director'];
    $generosPelicula = $_POST['generos']; // Nombre usado para evitar errores
    $anno = $_POST['año'];


    //  Creamos un array nuevo, cuyos valores serán los enviados por el formulario
    $peliculaNueva = [
        'id'=> $id,
        'titulo' => $titulo,
        'pais' => $pais,
        'director' => $director,
        'generos' => $generosPelicula,
        'año' => $anno
    ];

    // Añadimos la película al array principal de películas
    $peliculas[]= $peliculaNueva;

?>