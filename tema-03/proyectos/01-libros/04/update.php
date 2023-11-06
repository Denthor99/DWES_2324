<?php
    // Controlador: update.php
    // Descripción: actualiza los detalles de un libros

    // Librería (Necesitamos buscar)
    include 'libs/crud_funciones.php';


    // Modelos
    include 'models/modelIndex.php'; // Cargamos el array de libros
    include 'models/modelUpdate.php'; // Cargo los detalles del libro a editar

    // vista
    include "views/viewIndex.php"; // Mostrar la vista con los detalles del libro
?>