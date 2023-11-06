<?php
    // Cargamos el archivo php con la clase vehiculo
    include 'class/class.vehiculo.php';

    // Creamos un objeto
    $coche1 = new Vehiculo();

    // Mostramos el contenido del objeto. Valores por defecto del constructor
    var_dump($coche1);

    // Mostramos el contenido del campo matrícula. Valor por defecto del constructor
    var_dump($coche1->getMatricula());

    // Añadimos valores a los correspondientes campos. Usamos setters al ser campos de visibilidad "private"
    $coche1->setModelo('Audi A3');
    $coche1->setNombre('Audi de ultima generación, motor electrico');
    $coche1->setVelocidad('220');
    $coche1->setMatricula('3289 GRT');

    // Mostramos los valores dados usando los metodos getters
    var_dump($coche1->getModelo());
    var_dump($coche1->getNombre());
    var_dump($coche1->getMatricula());
    var_dump($coche1->getVelocidad());

    // Invocamos a una función creada especificamente para aumetaar a 10 km/h la velocidad
    $coche1->aumentarVelocidad();
    var_dump($coche1->getVelocidad());
?>