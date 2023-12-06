<?php
    /**
     * Controlador create.php
     * Añade un nuevo corredor a la base de datos
     */

     // Cargamos las constantes correspondientes
     include 'config/db.php';

     // Cargamos las clases necesarias
     include 'class/class.conexion.php';
     include 'class/class.corredor.php';
     include 'class/class.corredores.php';

     // Cargamos el modelo
     include 'models/modelCreate.php';

     // Rediccionamos
     header('Location: index.php');

?>