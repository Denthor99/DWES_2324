<?php
    /*
    Ejercicio 2. is_null()
    Crear un script PHP donde se muestre el resultado de 3 valores verdaderos y tres valores 
    falsos para la función is_null()


    */

    echo "<center><h1>Actividad 2.3 - Estado de una variable. isset(), empty(), is_null()</h1></center>";
    echo "<h2>Uso de la función is_null()</h2>";
    echo "<h3>Variable no definida</h3>";
    var_dump(is_null($valor1));
     
    echo "<h3>Variable con valor nulo</h3>";
    $valor2= null;
    var_dump(is_null($valor2));

    echo "<h3>Variable declarada sin valor</h3>";
    $valor3;
    var_dump(is_null($valor3));

    echo "<h3>Variable con valor 0</h3>";
    $valor4= 0;
    var_dump(is_null($valor4));

    echo "<h3>Variable con una cadena vacia</h3>";
    $valor5= "";
    var_dump(is_null($valor5));

    echo "<h3>Variable con valor negativo</h3>";
    $valor5= -85;
    var_dump(is_null($valor5));
    
?>