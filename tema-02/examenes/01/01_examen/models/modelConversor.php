<?php
    // Modelo: modelConversor.php
    // Este modelo realizará las multiples conversiones, para ser mostradas posteriormente.

    // Vamos a crear una variable y almacenaremos en su interior el valor enviado por el formulario a través del metodo POST
    $valorInicial = $_POST['valorInicial'];
    
    // Ahora iremos generamos una serie de variables donde almacenaremos el resultado dado por cada función de conversión
    // Podemos obviar en este caso la creación de una variable con el nombre de la operación, puesto que nos interesa más obtener directamente
    // las variables con las operaciones correspondientessss
    
    // Realizamos las conversiones que se nos piden
    $binario = decbin($valorInicial);
    $octal = decoct($valorInicial);
    $hexadec = dechex($valorInicial);
?>