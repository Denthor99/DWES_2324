<?php
    /*
    Ejercicio 4. empty()
    Crear un script PHP donde se muestre el resultado de 3 valores verdaderos y tres valores falsos
     para la función empty()
    */

    echo "<center><h1>Actividad 2.3 - Estado de una variable. isset(), empty(), is_null()</h1></center>";
    echo "<h2>Uso de la función empty()</h2>";
    echo "<h3>Variable no definida</h3>";
    var_dump(empty($valor1));
     
    echo "<h3>Variable con valor nulo</h3>";
    $valor2= null;
    var_dump(empty($valor2));

    echo "<h3>Variable declarada sin valor</h3>";
    $valor3;
    var_dump(empty($valor3));

    echo "<h3>Variable con cadena</h3>";
    $valor4= "616";
    var_dump(empty($valor4));

    echo "<h3>Variable booleana con valor true</h3>";
    $valor5= true;
    var_dump(empty($valor5));

    echo "<h3>Variable con valor negativo</h3>";
    $valor5= -85;
    var_dump(empty($valor5));
?>