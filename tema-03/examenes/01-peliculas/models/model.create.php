<?php

    /*

        model.create.PHP

        - Añade un elemento a la tabla 

    */
    // Cargamos las tablas correspondientes
    $peliculas = getPeliculas();
    $paises = getPaises();
    $generos = getGeneros();

    // Vamos a crear una serie de variables para captar los datos del formulario (método POST)
    $id=generarId($peliculas); // Generación automatica de id
    $titulo = $_POST['titulo'];
    $pais = $_POST['pais'];
    $director = $_POST['director'];
    $generosPelicula = $_POST['generos'];
    $anno = $_POST['año'];


    //  Creamos una pelicula
    $peliculaNueva = [
        'id'=> $id,
        'titulo' => $titulo,
        'pais' => $pais,
        'director' => $director,
        'generos' => $generosPelicula,
        'año' => $anno
    ];

    // Añadimos la película al array principal películas
    $peliculas[]= $peliculaNueva;

?>