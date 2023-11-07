<?php

    /*

        Modelo: model.mostrar.PHP
        Descripción: muestra los detalles de una películas
        
        - Carga los datos
        - Recibo por GET indice de la película que se desea mostrar

    */

    // Cargamos los datos de la tabla
    $peliculas = getPeliculas();
    $paises = getPaises();
    $generos = getGeneros();

    // Recibiremos el id a través del método GET, lo añadimos a una variable
    $idPelicula = $_GET['id'];

    // Usando la función buscarEnTabla(), comprobaremos si existe dicho elemento
    $indiceBuscar = buscarEnTabla($peliculas,'id',$idPelicula);

    // Condicional creado para controlar si existe o no un elemento.
   if($indiceBuscar !== false){ // Usaremos comparación de tipo "no identico", para evitar problemas con el primer indice
    $pelicula = $peliculas[$indiceBuscar];
   } else {
    echo "Película no encontrada";
    exit();
   }
    
    

?>