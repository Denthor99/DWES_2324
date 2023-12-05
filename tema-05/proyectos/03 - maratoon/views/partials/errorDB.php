<?php
    /**
     * errorDB.php
     * Mensaje de error personalizado
     * 
     */

     echo "e BASE DE DATOS";
     echo "<hr>";
     echo "Mensaje: ". $e->getMessage();
     echo "<br>";
     echo "Código e: ". $e->getCode();
     echo "<br>";
     echo "Fichero: ". $e->getFile();
     echo "<br>";
     echo "Línea: ". $e->getLine();
     echo "<br>";
     echo "Traza: ". $e->getTraceAsString();
?>