<?php
    // Creamos dos variables con valores numericos
    $intVar = 90;
    $deciVar = 2.508;

    // Almacenar en nuevas variables el resultado de la suma, resta, división, producto y potencia
    $sumaVars = $intVar + $deciVar;
    $restaVars = $intVar - $deciVar;
    $diviVars = $intVar / $deciVar;
    $multiVars = $intVar * $deciVar;
    $potenVars = pow($deciVar, $intVar);

    // Ahora mostraremos por pantalla las variables y los resultados obtenidos
    echo "\$sumaVars= ";
    var_dump($sumaVars);

    echo "<BR>";

    echo "\$restaVars= ";
    var_dump($restaVars);

    echo "<BR>";

    echo "\$diviVars= ";
    var_dump($diviVars);
    
    echo "<BR>";

    echo "\$multiVars= ";
    var_dump($multiVars);

    echo "<BR>";

    echo "\$potenVars= ";
    var_dump($potenVars);
?>