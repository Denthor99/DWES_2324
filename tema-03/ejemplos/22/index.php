<?php
/**
 * Funciones
 */

 // Declaramos varias funciones en un documento aparte, y las introducimos
 include 'aritmeticas.php';



// Creamos dos variables con contenido

$uno = 8;
$dos = 4;

// Mostramos los resultados
echo 'Suma= '. sumar($uno,$dos);
echo "<br>";

echo 'Resta= '. restar($uno,$dos);
echo "<br>";

echo 'Dividir= '. dividir($uno,$dos);
echo "<br>";

echo 'Multiplicar= '. multiplicar($uno,$dos);
echo "<br>";
?>