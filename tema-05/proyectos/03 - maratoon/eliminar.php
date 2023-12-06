<?php
    /**
     * Controlador eliminar.php
     * Descripción: elimina un registro de la base de datos
     * 
     */

     // Cargamos las constantes
     include 'config/db.php';

     // Cargamos las clases correspondientes
     include 'class/class.conexion.php';
     include 'class/class.corredores.php';

     // Cargamos el modelo correspondiente
     include 'models/modelEliminar.php';

     // Redireccion
     header('Location: index.php');
?>