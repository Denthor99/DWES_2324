<?php
    /**
     * Controlador filtrar.php
     * Descripción: muestra una tabla con los datos de todos los alumnos, donde se encuentren ciertas coicidencias
     * 
     */

     // Cargamos las constantes
     include 'config/db.php';

     // Cargamos las clases correspondientes
     include 'class/class.conexion.php';
     include 'class/class.corredores.php';

     // Cargamos el modelo correspondiente
     include 'models/modelFiltrar.php';

     // Cargamos la vista principal
     include 'views/viewIndex.php';
?>