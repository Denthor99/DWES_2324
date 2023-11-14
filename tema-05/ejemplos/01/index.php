<?php
    /*
        Conexión localhost con usuario root a la BBDD fp
        127.0.0.1:3306
    */

    $servidor = 'localhost';
    $user = 'root';
    $password = '';
    $bd = 'fp';

    // Conexión
    $conexion= mysqli_connect($servidor,$user,$password,$bd);

    // Manejo de errores
    if(mysqli_connect_errno()){
        echo 'Error de conexión Nº: '. mysqli_connect_errno();
        echo "<br>";
        echo 'Error en la conexión'. mysqli_connect_error();
        exit(); 
    } else {
        echo 'Conexión establecida con éxito';
    }

?>