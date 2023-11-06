<?php

/*

    Modelo: model.mostrar.PHP

    - Carga los datos
    - Recibo por GET indice de la película que se desea mostrar

*/
// Cargamos las tablas correspondientes
$peliculas = getPeliculas();
$paises = getPaises();
$generos = getGeneros();

// Captamos el id de la película a tráves del método GET
$idPelicula = $_GET['id'];

$indicePelicula = buscarId($peliculas,'id',$idPelicula);
if ($indicePelicula !== false) {
    $pelicula = $peliculas[$indicePelicula];
} else {
    echo 'ERROR, articulo no existente';
    exit();
}




?>