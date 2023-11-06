<?php
    /*
        Modelo: multiplica.php
        Descripción: multiplicación de los valores del formulario
    */

    // Creamos dos variables, que almacenarán los valores enviados a tráves del metodo POST
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];

    // Creo otra variable para guardar la operación realizada
    $operacion = "Multiplicar";

    // Realizo los cálculos y lo almaceno en la variable resultado
    $resultado = $valor1 * $valor2;
?>