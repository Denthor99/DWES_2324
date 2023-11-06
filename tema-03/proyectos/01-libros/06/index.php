<?php
    // Controlador: index.php
    // Descripción: Muestra los detalles de los libros ordenados por id

    // añadimos la libreria
    include 'libs/crud_funciones.php';

    // Modelo
    include 'models/modelIndex.php';

    // solo nos hará falta la vista con el formulario inicials
    include "views/viewIndex.php";
?>