<?php
    /*
    Función empty()

    Verdadero
        - variable no definida, sin generar aviso
        - variable asignada el valor null
        - asignar el valor 0
        - asignar cadena vacía
        - asignar array vacio
        - asignar false
    Falso
        - asignar cualquier valor entero
    */

    // Casos

    var_dump(empty($var));
    echo "<br>";

    $var1=null;
    var_dump(empty($var1));
    echo "<br>";

    $var2 = 0;
    var_dump(empty($var2));
    echo "<br>";

    $var4 = "";
    var_dump(empty($var4));
    echo "<br>";

    $var5=[];
    var_dump(empty($var5));
    echo "<br>";

    $var5=false;
    var_dump(empty($var5));
    echo "<br>";

    $var3 = 45;
    var_dump(empty($var3));
    echo "<br>";


?>