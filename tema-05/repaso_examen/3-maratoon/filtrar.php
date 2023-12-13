<?php
    /**
     * Controlador filtrar.php
     * Muestra una tabla con todos los datos de los corredores que contengan una expresión
     */

     // Cargamos el archivo con todas las variables
     include 'config/db.php';

     // Cargamos las clases correspondientes (en orden)
     include 'class/class.conexion.php';
     include 'class/class.corredores.php';

     // Cargamos el modelo
     include 'models/modelFiltrar.php';

     // Cargamos la vista principal
     include 'views/viewIndex.php';
?>