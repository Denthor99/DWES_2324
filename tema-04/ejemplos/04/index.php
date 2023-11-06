<?php
    // Cargamos el archivo php con la clase vehiculo
    include 'class/class.vehiculo.php';

    // Creamos un objeto
    $coche1 = new Vehiculo(
        'Audi A3',
        'Audi de ultima generación, motor electrico',
        '3289 GRT',
        220
        
    );

    $coche2 = new Vehiculo();

    // Mostramos el contenido de ambos objetos
    var_dump($coche1);
    var_dump($coche2);

    // Creamos otro objeto, pero no queremos añadir valor a la matrícula
    $coche3 = new Vehiculo(
        'Audi A3',
        'Audi de ultima generación, motor electrico',
        null,
        220
    );
    var_dump($coche3);

    // Destruimos el tercer objeto
    unset($coche3);
?>