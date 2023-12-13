<?php

    /*
        Muestra formulario para crear nuevo libro

        Necesito obtener las editoriales y los autores para generación dinámica del combox 
        para autores y editoriales
    */

    // Crearemos la conexión
    $conexion = new Libros();

    // Cargamos los autores
    $autores = $conexion->getAutores();

    // Cargamos las editoriales
    $editoriales = $conexion->getEditoriales();
    
?>