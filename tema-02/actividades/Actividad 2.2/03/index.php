<?php
/*
Crea un script PHP que cumpla los siguientes requisitos

*/

// Asignar a una variable un valor de cualquier tipo

echo "<center><h1>Actividad 2.2 - Tipos de datos y convesión</h1></center>";
echo "<h3>Mostramos el valor de las variables (usando conversión implícita)</h3>";

$varEjemplo = "18 caras mirando al abismo";
var_dump($varEjemplo);
echo "<br>";

$intEjemplo = (int)$varEjemplo;
var_dump($intEjemplo);
echo "<br>";

$boolEjemplo = (boolean)$varEjemplo;
var_dump($boolEjemplo);
echo "<br>";

$stringEjemplo = (string)$varEjemplo;
var_dump($stringEjemplo);
echo "<br>";

$floatEjemplo = (float)$varEjemplo;
var_dump($floatEjemplo);
?>