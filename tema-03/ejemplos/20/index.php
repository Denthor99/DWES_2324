<?php
/**
 * Recorrer Array asociativos
 */

 // El formato de este array cuenta con dos indices: el valor del indice (indexado), y el segundo es asociativo
 // Cuando realicemos una consulta, sql devuelve el resultado en este tipo de arrays

$equipos = [
    [
        'id' => 1,
        'nombre' => 'Real Madrid',
        'ciudad' => 'Madrid'
    ],
    [
        'id' => 2,
        'nombre' => 'Real Betis',
        'ciudad' => 'Sevilla'
    ],
    [
        'id' => 3,
        'nombre' => 'FC Barcelona',
        'ciudad' => 'Barcelona'
    ]
];


// Mostramos la información del equipo
foreach ($equipos as $equipo) { // Iteramos los indices
    foreach ($equipo as $key => $dato) { // Iteramos dentro del array
        echo "$key: ".$dato;
        echo "<br>";
    }
    echo "<br>";
}

?>