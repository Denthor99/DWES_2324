<?php
    /**
     * Controlador nuevo.php
     * Mostramos un formulario, donde introducimos los datos de un nuevo corredor
     */

     // Cargamos las constantes necesarias
     include 'config/db.php';

     // Cargamos las clases correspondientes
     include 'class/class.conexion.php';
     include 'class/class.corredores.php';

     // Cargamos el modelo
     include 'models/modelNuevo.php';

     // Cargamos la vista
     include 'views/viewNuevo.php';
?>