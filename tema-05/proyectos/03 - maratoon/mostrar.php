<?php
    /**
     * Controlador mostrar.php
     * Mostrará una vista con los datos de un corredor
     */

     // Cargamos las constantes necesarias
     include 'config/db.php';

     // Cargamos las clases necesarias
     include 'class/class.conexion.php';
     include 'class/class.corredores.php';

     // Cargamos el modelo
    include 'models/modelMostrar.php';

     // Cargamos la vista
     include 'views/viewMostrar.php';
?>