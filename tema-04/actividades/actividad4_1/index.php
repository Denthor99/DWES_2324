<?php
    // Cargamos la clase
    include 'class/class.calculadora.php';

    // Creamos un objeto por cada operacion
    $operacionSuma = new Calculadora();
    $operacionResta = new Calculadora();
    $operacionDividir = new Calculadora();
    $operacionMultiplicar = new Calculadora();
    $operacionPotencia = new Calculadora();

    // Asignamos valores a la operacion suma
    $operacionSuma->setValor1(9);
    $operacionSuma->setValor2(1);

    // Aplicamos la función sumar
    $resultadoSuma = $operacionSuma->sumar();
    
    // Asignamos valores a la operacion resta
    $operacionResta->setValor1(89);
    $operacionResta->setValor2(65);

    // Aplicamos la funcion restar
    $resultadoResta = $operacionResta->restar();

    // Asignamos valores a la operacion dividir
    $operacionDividir->setValor1(28);
    $operacionDividir->setValor2(4);

    // Aplicamos la funcion dividir
    $resultadoDividir = $operacionDividir->dividir();

    // Asignamos valores a la operacion multiplicar
    $operacionMultiplicar->setValor1(9);
    $operacionMultiplicar->setValor2(9);

    // Aplicamos la funcion multiplicar
    $resultadoMultiplicar = $operacionMultiplicar->multiplicar();

    // Asignamos valores a la operacion potencia
    $operacionPotencia->setValor1(5);
    $operacionPotencia->setValor2(4);

    // Aplicamos la funcion potencia
    $resultadoPotencia = $operacionPotencia->potencia();

    // Resultados de las distintas operaciones
    echo $operacionSuma->getOperacion() . ": " . $operacionSuma->getValor1() . " + " . $operacionSuma->getValor2() . " = " . $resultadoSuma . "<br>";
    echo $operacionResta->getOperacion() . ": ". $operacionResta->getValor1() . " - " . $operacionResta->getValor2() . " = " . $resultadoResta . "<br>";
    echo $operacionDividir->getOperacion() . ": " . $operacionDividir->getValor1() . " / " . $operacionDividir->getValor2() . " = " . $resultadoDividir . "<br>";
    echo $operacionMultiplicar->getOperacion() . ": " . $operacionMultiplicar->getValor1() . " x " . $operacionMultiplicar->getValor2() . " = " . $resultadoMultiplicar . "<br>";
    echo $operacionPotencia->getOperacion() . ": " . $operacionPotencia->getValor1() . "^" . $operacionPotencia->getValor2() . " = " . $resultadoPotencia . "<br>";
?>