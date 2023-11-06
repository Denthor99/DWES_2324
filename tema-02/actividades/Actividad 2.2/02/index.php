<?php
/*
Crea un script PHP que cumpla los siguientes requisitos

*/

// Asignar a una variable un valor de cualquier tipo

echo "<center><h1>Actividad 2.2 - Tipos de datos y convesión</h1></center>";
echo "<h3>Mostramos el valor de las variables (usando función settype)</h3>";


$varEjemplo = "18 caras mirando al abismo";
var_dump($varEjemplo);
echo "<br>";

settype($varEjemplo,"integer");
var_dump($varEjemplo);
echo "<br>";

settype($varEjemplo,"boolean");
var_dump($varEjemplo);
echo "<br>";

settype($varEjemplo,"string");
var_dump($varEjemplo);
echo "<br>";

settype($varEjemplo,"float");
var_dump($varEjemplo);
echo "<br>";

?>