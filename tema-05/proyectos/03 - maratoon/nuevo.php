<?php
    /**
     * Controlador nuevo.php
     * Mostrará formulario para añadir un nuevo corredor
     */

     // Cargamos las constantes necesarias
     include 'config/db.php';

     // Cargamos las clases necesarias
     include 'class/class.conexion.php';
     include 'class/class.corredores.php';

     // Cargamos el modelo
    include 'models/modelNuevo.php';

     // Cargamos la vista
     include 'views/viewNuevo.php';
?>