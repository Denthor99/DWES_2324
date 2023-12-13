<?php
    /**
     * Controlador ordenar.php
     * Muestra una tabla con todos los datos de los corredores, ordenados por alguna de las
     * tuplas de la tabla
     */

     // Cargamos el archivo con todas las variables
     include 'config/db.php';

     // Cargamos las clases correspondientes (en orden)
     include 'class/class.conexion.php';
     include 'class/class.corredores.php';

     // Cargamos el modelo
     include 'models/modelOrdenar.php';

     // Cargamos la vista principal
     include 'views/viewIndex.php';
?>