<?php
    /**
     * Ejemplo de iteración de un array con for
    */

    // Definimos un array con tipos enteros
    $numeros = array(1,2,6,7,8,9,10,56,68,80,92,104,116);

    // Recorremos el array con un for
    // Con la función count sacamos la longitud del array, aunque es un engorro puesto que es usar demasiados recursos
    for ($i=0; $i < count($numeros); $i++) { 
        echo $i;
        echo "=>";
        echo $numeros[$i];
        echo "<br>";
    }
?>