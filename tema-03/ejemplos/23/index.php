<?php
    /*
    Funciones PHP
    Argumentos por valor o referencia 
    */

    function sumar($var1, $var2, &$resultado){ // Funge como procedimiento
        $resultado = $var1 + $var2;

    }

    $r = 0 ;
    $num1 = 12;
    $num2 = 15;

    sumar($num1,$num2,$r);

    echo "Resultado: $num1 + $num2 = ".$r;
?>