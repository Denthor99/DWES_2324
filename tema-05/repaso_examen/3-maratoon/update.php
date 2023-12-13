<?php
    /**
     * Controlador update.php
     * Actualizamos los datos de un corredor
     */

     // Cargamos las constantes necesarias
     include 'config/db.php';

     // Cargamos las clases correspondientes
     include 'class/class.conexion.php';
     include 'class/class.corredor.php';
     include 'class/class.corredores.php';

     // Cargamos el modelo
     include 'models/modelUpdate.php';

     // Redireccionamos
     header('Location: index.php');
?>