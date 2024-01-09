<?php
    /**
     * Contador de visitas a la página
     */

     // Comprobamos si existe la cookie contador
     if(isset($_COOKIE['contador'])){
        // Actualizar el número de visitas
        $numVisitas = $_COOKIE['contador'];
        $numVisitas+=1;
        setcookie('contador',$numVisitas, time() + 365 *24*60*60);
     } else {
        // Creo la cookie con valor 1
        setcookie('contador',1, time() + 365 *24*60*60);
        $numVisitas = 1;
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Cookies</title>
</head>
<body>
    <h1>Número de visitantes: <?=$numVisitas?></h1>
    <ul>
        <li>
            <a href="crear.php">Crear cookie</a>
        </li>
        <li>
            <a href="mostrar.php">Mostrar</a>
        </li>
        <li>
            <a href="eliminar.php">Eliminar</a>
        </li>
    </ul>
    
</body>
</html>