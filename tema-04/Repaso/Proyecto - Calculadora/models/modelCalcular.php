<?php
    /*
        Modelo: modelCalcular.php
        Realizamos la operación correspondiente
    */

    // capturamos los valores enviados a través del método post
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $operacion = $_POST['operacion'];

    // Creamos la instancia de la clase calculadora
    $calculo = new Calculadora($valor1,$valor2,$operacion);

    // Deberemos plantear ahora que operación se mostrará. Para ello creamos una estructura condicional, junto a los métodos del objeto calculadora
    switch ($operacion) {
        case 'sumar':
            $calculo->sumar();
            break;
        case 'restar':
            $calculo->restar();
            break;
        case 'multiplicar':
            $calculo->multiplicar();
            break;
        case 'dividir':
            $calculo->dividir();
            break;
        case 'potencia':
            $calculo->potencia();
            break;
        default:
            echo 'Operación no valida';
            break;
    }
    
?>