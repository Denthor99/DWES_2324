<?php
/*
        Modelo: ordenar.php
        Descripción: muestra los libros a partir de un criterio

        Método GET:
            - criterio: titulo, autor, genero, precio.
    */

    // Caargo el criterio de ordenación
    $criterio = $_GET['criterio'];

    

    // realizaremos una comprobación previa de si existe dicho criterio
    if (!in_array($criterio, array_keys($libros[0]))) {
        echo "ERROR: Criterio de ordenacion no disponible";
        exit();
    } 

    
    // Cargamos en un array todos los valores del criterio de ordenación
   // Extrae del array libros, la columna donde se encuentre el criterio de ordenación
   $aux = array_column($libros,$criterio);

   

    // Función array_multisort. Ordena arrays de multiples dimensiones
    array_multisort($aux,SORT_ASC,$libros);


?>