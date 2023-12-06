<?php
    /**
     * Controlador editar.php
     * Descripción: muestra un formulario con datos para su edición
     * 
     */

     // Cargamos las constantes
     include 'config/db.php';

     // Cargamos las clases correspondientes
     include 'class/class.conexion.php';
     include 'class/class.corredores.php';

     // Cargamos el modelo correspondiente
     include 'models/modelEditar.php';

     // Cargamos la vista principal
     include 'views/viewEditar.php';
?>