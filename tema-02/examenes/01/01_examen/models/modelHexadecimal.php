<?php
    // Modelo: modelHexadecimal.php
    // Este modelo realizará la operación de conversión de decimal a hexadecimal

    // Vamos a crear una variable y almacenaremos en su interior el valor enviado por el formulario a través del metodo POST
    $valorInicial = $_POST['valorInicial'];

    // Ahora Indicaremos el tipo de conversión que vamos a realizar
    $operacion = "Hexadecimal";

    // Realizamos la conversion
    $resultado = dechex($valorInicial);
?>