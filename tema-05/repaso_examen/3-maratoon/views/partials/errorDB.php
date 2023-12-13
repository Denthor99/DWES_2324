<?php
    /**
     * errorDB.php
     * Mensaje de error personalizado
     * 
     */
    echo "ERROR - BASE DE DATOS";
    echo "<hr>";
    echo "Mensaje: ".$e->getMessage();
    echo "<br>";
    echo "Código del error: ". $e->getCode();
    echo "<br>";
    echo "Fichero: ". $e->getFile();
    echo "<br>";
    echo "Línea: ".$e->getLine();
    echo "<br>";
    echo "Traza: ".$e->getTraceAsString();

?>