<?php

    /*  
        model.index.php

        Mostrar contenido de la tabla fp.alumnos

        Mostrará la tabla como array de objetos
    */
    // Crearemos la conexión a la base de datos
    $conexion = new Libros();

    // Cargamos los datos necesarios
    $libros = $conexion->getLibros();


?>