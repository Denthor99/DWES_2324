<?php
    /**
     * Controlador editar.php
     * Mostramos un formulario, donde podemos modificar los datos del corredor
     */

     // Cargamos las constantes necesarias
     include 'config/db.php';

     // Cargamos las clases correspondientes
     include 'class/class.conexion.php';
     include 'class/class.corredores.php';

     // Cargamos el modelo
     include 'models/modelEditar.php';

     // Cargamos la vista
     include 'views/viewEditar.php';
?>