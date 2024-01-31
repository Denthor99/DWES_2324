<?php
$alumnos = [
    [
        1,
        'juan',
        'carlos pereira',
        '2daw',
        'El Bosque'
    ],
    [
        2,
        'juan',
        'carlos pereira',
        '2daw',
        'El Bosque'
    ],
    [
        3,
        'Lauren',
        'pereira smith',
        '1daw',
        'Hollywood'
    ]
];

# Abrimos el fichero, si no existe lo crea
$alumnos_csv = fopen("csv/alumnos.csv","ab");

foreach ($alumnos as $alumno){
    fputcsv($alumnos_csv,$alumno, ";");
}

fclose($alumnos_csv);
echo "fichero alumnos.csv creado con éxito"
?>