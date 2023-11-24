<?php
    /*
        Controlador index con PDO
    */

    // Cargamos la configuracion
    include 'config/config.php';

  
    // Cargamos las clases en orden correspondiente
    include 'class/class.conexion.php';
    include 'class/class.curso.php';
    include 'class/class.fp.php';
    // Cargamos el modelo
    include 'models/modelIndex.php';

    // Cargamos la vista
?>