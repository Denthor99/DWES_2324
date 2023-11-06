<?php
    // Cargamos el archivo php con la clase vehiculo
    include 'class/class.vehiculo.php';
   include 'class/class.deportivo.php';

    // Creamos otro objeto, pero no queremos añadir valor a la matrícula
    $coche_1 = new Deportivo(
        'Audi A3',
        'Audi de ultima generación, motor electrico',
        null,
        220,
        '1500 cc',
        85000
    );
    
    $coche_1->velocidadMaxima();
    var_dump($coche_1);
?>