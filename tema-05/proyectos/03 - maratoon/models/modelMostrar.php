<?php
    /**
     * Modelo mostrar.php
     * Mostramos en una vista los datos de un corredor concreto
     */

     // Recogemos el id a 
     $id = $_GET['id'];

     // Creamos la conexion
     $conexion = new Corredores();

     // Cargamos el nombre de la categoria
     $categoria = $conexion->getCategoria($id);

     // Cargamos el nombre del club
     $club = $conexion->getClub($id);

     // Cargamos los datos
     $corredor = $conexion->read($id);

?>