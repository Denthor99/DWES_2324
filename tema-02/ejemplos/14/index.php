<?php
    /*
    Función is_null()

    VERDADERO
        - variable no definida (genera avisos)
        - variable asignada el valor null
    
    Falso
        - asignar el valor 0
        - asignar cualquier valor entero
        - asignar cadena vacía
        - asignar array vacio
    */

    // Casos

    $var;
    var_dump(is_null($var));
    echo "<br>";

    $var1=null;
    var_dump(is_null($var1));
    echo "<br>";

    $var2 = 0;
    var_dump(is_null($var2));
    echo "<br>";

    $var3 = 45;
    var_dump(is_null($var3));
    echo "<br>";

    $var4 = "";
    var_dump(is_null($var4));
    echo "<br>";

    $var5=[];
    var_dump(is_null($var5));
    echo "<br>";

?>