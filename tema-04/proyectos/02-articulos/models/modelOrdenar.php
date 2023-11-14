<?php
/*
        Modelo: ordenar.php
        Descripción: muestra los libros a partir de un criterio

        Método GET:
            - criterio: titulo, autor, genero, precio.
    */

     // Cargamos los valores correspondientes
     $categorias = ArrayArticulos::getCategorias();
     $marcas = ArrayArticulos::getMarcas();
 
     # Creamos un objeto de la clase ArrayArticulos
     $articulos = new ArrayArticulos;
 
     // Cargamos los datos
     $articulos->getDatos();
     
    // Caargo el criterio de ordenación
    $criterio = $_GET['criterio'];

    // Invocamos la función que se encargará de ordenar el contenido de la vista
    $articulos->order($criterio);
    
?>