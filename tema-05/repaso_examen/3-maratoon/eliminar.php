<?php
    /**
     * Controlador eliminar.php
     * Elimina un corredor de la base de datos, a traves de su id
     */

     // Cargamos el archivo con todas las variables
     include 'config/db.php';

     // Cargamos las clases correspondientes (en orden)
     include 'class/class.conexion.php';
     include 'class/class.corredores.php';

     // Cargamos el modelo
     include 'models/modelEliminar.php';

     // Rediccionamos
     header('Location: index.php');
?>