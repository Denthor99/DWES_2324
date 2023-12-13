<?php

    /*
        ordenar.php

        Permite mostrar los libros ordenados por criterio ASC a partir de las siguientes columnas:
        - id
        - titulo
        - autor
        - editorial
        - unidades
        - coste
        - pvp

    */
    // Cargamos las constantes necesarias
    include 'config/config.php';

    // Cargamos las clases necesarias
    include 'class/class.conexion.php';
    include 'class/class.libros.php';

    // Cargamos el modelo correspondiente
    include 'models/model.ordenar.php';

    // Cargamos la vista principal
    include 'views/view.index.php';
?>