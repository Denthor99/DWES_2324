<?php
    /**
     * Modelo eliminar.php
     * Elimina de la base de datos un registro según el id generado automaticamente,
     * obtenido a tráves del método GET
     */
    // Capturamos el id usando el método GET
    $id = $_GET['id'];

    // Conexión con la BD
    $conexion = new Corredores();

    // Invocamos al método encargado de eliminar dicho registro
    $conexion->delete($id);
?>