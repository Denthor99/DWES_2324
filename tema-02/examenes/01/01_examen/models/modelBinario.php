<?php
    // Modelo: modelBinario.php
    // Este modelo realizará la operación de conversión de decimal a binario

    // Vamos a crear una variable y almacenaremos en su interior el valor enviado por el formulario a través del metodo POST
    $valorInicial = $_POST['valorInicial'];

    // Ahora Indicaremos el tipo de conversión que vamos a realizar
    $operacion = "Binario";

    // Realizamos la conversion
    $resultado = decbin($valorInicial);
?>