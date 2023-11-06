<?php
    /*
        Controlador: eliminar.php
        Descripción: permite eliminar un elemento de la tabla
     */

    #Libreria
    include 'libs/crud_funciones.php';

    # Modelo
    include 'models/modelIndex.php';
    include 'models/modelEliminar.php'; // No se puede varios modelos en un controladorr

    # Vista
    include 'views/viewIndex.php';
?>