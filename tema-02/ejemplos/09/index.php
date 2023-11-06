<?php
    // Tipos de variables
    // Boolean

    $test = false;
    echo "\$test= "; // Escapamos el dolar para indicar el nombre de la variable
    //var_dump() indica el tipo de dato y el valor de la variable
    var_dump($test);

    echo "<br>";

    // Tipo entero
    $edad = 24;
    echo "\$edad= ";
    var_dump($edad);

    echo "<br>";

    // Tipo float
    $altura = 1.70;
    echo "\$altura= ";
    var_dump($altura);

    echo "<br>";

    // Tipo exponencial
    $distancia = 15.899e2;
    echo "\$distancia= ";
    var_dump($distancia);
    
    echo "<br>";
    
    // Tipo String (cadena)
    $mensaje = "La distancia recorrida fue de $distancia km";
    echo "\$mensaje= ";
    var_dump($mensaje);

    echo "<br>";

    $mensaje = 'La distancia recorrida fue de $distancia km';
    echo "\$mensaje= ";
    var_dump($mensaje);

    echo "<br>";

    $mensaje = 'La distancia recorrida fue de ' . $distancia . ' km';
    echo "\$mensaje= ";
    var_dump($mensaje);

    echo "<br>";

?>