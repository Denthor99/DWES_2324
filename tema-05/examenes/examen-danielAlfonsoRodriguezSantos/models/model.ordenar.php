<?php

   /*  
        model.ordenar.php

    */

    // Capturamos el criterio, a tráves del método GET
    $criterio = $_GET['criterio'];

    // Creamos la conexión
    $conexion = new Libros();

    // Ejecutamos el método específico que nos devolverá un conjunto de filas ordenadas según criterio
    $libros = $conexion->order($criterio);

?>