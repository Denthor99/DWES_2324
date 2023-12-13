<?php

    /*

        index.php

        Controlador que permite realizar una consulta de libros en geslibros y mostrarlos en
        una vista a partir del diseño establecido

    */

    // Cargamos las constantes necesarias
    include 'config/config.php';

    // Cargamos las clases necesarias
    include 'class/class.conexion.php';
    include 'class/class.libros.php';

    // Cargamos el modelo correspondiente
    include 'models/model.index.php';

    // Cargamos la vista principal
    include 'views/view.index.php';

?>