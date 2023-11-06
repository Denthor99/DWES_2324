<?php
    /*
        Controlador: nuevo.php
        Descripción: nos mostrará un formulario donde añadiremos un nuevo artículo
    */

    // Cargaremos las librerias, con sus correpondientes funciones
    include 'libs/crud_funciones.php';

    // Cargaremos el modelo correspondiente
    include 'models/modelNuevo.php';

    // Cargaremos la vista correspondiente, donde definiremos el formulario
    include 'views/viewNuevo.php';
?>