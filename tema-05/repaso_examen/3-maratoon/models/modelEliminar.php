<?php
    /**
     * Modelo eliminar.php
     * Eliminamos un corredor
     */

     // Recogemos el id del corredor a eliminar, a traves del método GET
     $idEliminar = $_GET['id'];

     // Creamos la conexion
     $conexion = new Corredores();

     // Eliminamos el corredor
     $conexion->delete($idEliminar);
?>