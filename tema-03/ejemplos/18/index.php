<?php
    /**
     * Ejemplo de iteración de un array con foreach
    */

    // Definimos un array con tipos enteros
    $numeros = array(1,2,6,7,8,9,10,56,68,80,92,104,116);

    // Si usamos un unset previo a la iteración del array, se elimina la clave y el valor de un elemento del array
    unset($numeros[5]);
    // Recorremos el array con un foreach
    foreach ($numeros as $numero) {
        echo $numero;
        echo "<br>";
    }

    // Comprobamos la información del array
    print_r($numeros);
    
?>