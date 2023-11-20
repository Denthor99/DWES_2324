<?php
    /*
        Modelo: modelCalcular.php
        Realizamos la operación correspondiente
    */

    // capturamos los valores enviados a través del método post
    $valor1=$_POST['valor1'];
    $valor2=$_POST['valor2'];
    $operacion = $_POST['operacion'];

    // Creamos la instancia de la clase calculadora
    $calculos=new Calculadora($valor1,$valor2,$operacion,0);

    // Deberemos plantear ahora que operación se mostrará. Para ello creamos una estructura condicional, junto a los métodos del objeto calculadora
    switch ($operacion) {
        case 'sumar':
            $calculos->sumar();
            break;
        case 'restar':
            $calculos->restar();
            break;

        case 'dividir':
            $calculos->dividir();
            break;
        case 'multiplicar':
            $calculos->multiplicar();
            break;
        case 'potencia':
            $calculos->potencia();
            break;
        default:
            echo 'Operacion no existente';
            break;
    }
?>