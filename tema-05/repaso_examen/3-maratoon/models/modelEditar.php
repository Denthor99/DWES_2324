<?php
    /**
     * Modelo editar.php
     * Muestra un formulario donde se escribiran los datos para añadir a un nuevo corredor
     */

     // A través del método GET, obtenemos el id del corredor
     $idCorredor = $_GET['id'];

     // Creamos la conexión
     $conexion = new Corredores();

     // Cargamos las categorias
     $categorias = $conexion->getCategorias();

     // Cargamos los clubs
     $clubs = $conexion->getClubs();

     // Cargamos los datos del corredor
     $corredor = $conexion->read($idCorredor);
?>