<?php
    /*
        Modelo: modelCalculadora.php
        Descripción: Realizar las distintas operaciones necesarias
    */

    // Deberemos definir el valor constante de la gravedad
    Define("G",9.81);

    // Creamos dos variables, que almacenarán los valores enviados a tráves del metodo POST
    $valor1 = $_POST['velocidad'];
    $valor2 = $_POST['angulo'];

    // Calculo de los radianes de un angulo
    $radianes = deg2rad($valor2);

    // La siguiente operación a realizar sería calcular la velocidad inicial de X
    $vx = $valor1 * cos($radianes);

    // Ahora calcularemos la velocidad inicial
    $vy = $valor1 * sin($radianes);

    // Calculamos el alcance máximo
    $xMax = (pow($valor1,2))*(sin(2*$radianes))/(G);

    // Tiempo de Vuelo del proyectil
    $t = (2*$vy)/G;

    // Altura máxima del proyectil
    $yMax = (pow($valor1,2)*pow(sin($radianes),2))/(2*G);

    /*
        Ahora le daremos el formato correspondiente
    */
    $valor1 = number_format($valor1,2,",",".");
    $valor2 = number_format($valor2,0);
    $radianes = number_format($radianes,5,",",".");
    $vx = number_format($vx,2,",",".");
    $vy = number_format($vy,2,",",".");
    $xMax = number_format($xMax,2,",",".");
    $t = number_format($t,2,",",".");
    $yMax = number_format($yMax,2,",",".");
?>