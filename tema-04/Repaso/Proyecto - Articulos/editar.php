<?php
    // Controlador: editar.php
    // Descripción: Mostrar un formulario con los detalles editables del libro seleccionado

     // Cargamos las clases
     include 'class/class.articulo.php';
     include 'class/class.arrayArticulos.php';


    // Modelos
    include 'models/modelEditar.php'; // Cargo los detalles del libro a editar

    // vista
    include "views/viewEditar.php"; // Mostrar la vista con los detalles del libro
?>