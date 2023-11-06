<?php
    /*
    Ejemplo 2
    */

    // Declaración de las variables a usar
    $a = 1;
    $b = "1";

    $c = 4;
    $d = 5;

    // Dará false, debido a que ambas
    if(($a===$b) && ($c<=$d)){
        echo "Verdadero";
    } else {
        echo "Falso";
    }
?>