<?php

    /*

        nuevo.php

        Controlador que permite acceder a geslibros, extraer la lista de Autores y Editoriales
        y mostrar el formulario que permitirá añadir nuevo libro.

    */
    // Cargamos las constantes necesarias
    include 'config/config.php';

    // Cargamos las clases necesarias
    include 'class/class.conexion.php';
    include 'class/class.libros.php';

    // Cargamos el modelo correspondiente
    include 'models/model.nuevo.php';

    // Cargamos la vista principal
    include 'views/view.nuevo.php';

?>