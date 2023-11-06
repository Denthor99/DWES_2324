<?php
/**
 * Archivo: index.php
 * Descripción: Ejemplo 7
 * Autor: Daniel Alfonso Rodríguez Santos
 * Fecha: 26/09/2023
 */
include 'modelUsuario.php';
include 'viewUsuario.php';

$alumno = "Daniel Alfonso";
echo "El alumno es: ";
echo "<br>";
print $alumno;

// Tambien se pueden imprimir valores numericos
echo "<br>";
echo 3.14568796;
echo "<br>";
print 123.456789;
echo "<br>";

// Prueba concatenación de cadenas. echo es una funcion con una serie de parametros
// cuya sintaxis no hace necesaria el uso de parentesis
// Echo se usa para mostrar textos largos
echo "Erase una vez...."," no me acuerdo ya";
echo "<br>";

// Print es una función parecida al echo, con la diferencia de que no admite más de un parametro
// la sintaxis permite que no sea necesaria el uso de parentesis
// Print se usa para imprimir el valor de una variable, y nos permite concatenar el contenido
print "- Cuenteme un cuento Iron Man...." . "<br>" . "- Iron know";

// Cuando queramos asignarrle un formato concreto a un valor númerico, usaremos la función print

?>