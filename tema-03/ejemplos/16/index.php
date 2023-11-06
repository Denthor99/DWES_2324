<?php
    /**
     * Ejemplo de definición de una matriz (array multidimensional)
    */

    $numeros = [[6,8],[10,20]];

    // Mostramos un valor de la matriz
    echo $numeros[0][1];
    echo "<br>";

    // print_r nos muestra los valores de una matriz
    print_r($numeros);
    echo "<br>";

    // Otra forma alternativa de definir una matriz
    // $numeros = array(array(6,8), array(10,20));

    // Mostrar el primer array de la matriz

    print_r($numeros[0]);

?>