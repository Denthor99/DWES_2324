<?php
    /*
    Función isset()

    Falso
        - variable no definida
        - variable asignada el valor null
    
    Verdadero
        - asignar el valor 0
        - asignar cualquier valor entero
        - asignar cadena vacía
        - asignar array vacio
    */

    // Casos

    $var;
    var_dump(isset($var));
    echo "<br>";

    $var1=null;
    var_dump(isset($var1));
    echo "<br>";

    $var2 = 0;
    var_dump(isset($var2));
    echo "<br>";

    $var3 = 45;
    var_dump(isset($var3));
    echo "<br>";

    $var4 = "";
    var_dump(isset($var4));
    echo "<br>";

    $var5=[];
    var_dump(isset($var5));
    echo "<br>";

?>