<?php
/**
 * Array asociativos
 * 
 * Valor del indice personalizado con un número o string
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


// Mostramos el nombre del equipo que se encuentra en el segundo array 
print_r($equipos[1]['nombre']);
echo "<br>";

// Mostramos el contenido de cada array
foreach ($equipos as $equipo) {
    print_r($equipo);
    echo "<br>";
}

// Mostramos la información del equipo (forma poco práctica)
foreach ($equipos as $equipo) {
    echo 'id: '.$equipo['id'];
    echo "<br>";
    echo 'equipo: '.$equipo['nombre'];
    echo "<br>";
    echo 'ciudad: '.$equipo['ciudad'];
    echo "<br>";
}

?>