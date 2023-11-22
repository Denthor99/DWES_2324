<?php
    /*
        Conexión mediante PDO
    */

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'fp';

    //  Establecemos la conexión
    try {
        $dsn = "mysql:host = $server;dbname=$database";

        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

        // Guardamos la conexion en una variable
        $pdo = new PDO($dsn,$user,$password,$options);
    } catch (PDOException $e) {
        include 'errorDB.php';
        exit();
    }
?>