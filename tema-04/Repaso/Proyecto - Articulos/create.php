<?php
    /*
        Controlador: create.php
        Descripción: permite cargar los nuevos valores al array principal con los datos de la aplicación        
    */

    // Cargamos las clases
        include 'class/class.articulo.php';
        include 'class/class.arrayArticulos.php';

    // Cargaremos el modelo
    include 'models/modelCreate.php';
    

    // Cargamos la vista
    include 'views/viewIndex.php';
?>