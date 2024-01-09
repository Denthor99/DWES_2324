<?php
    /**
     * Iniciamos la sesión
     */
    session_start();

    // Creamos variables de sesión
    if(isset($_SESSION['num_visitas_home'])){
        $_SESSION['num_visitas_home']++;
    } else{
        $_SESSION['num_visitas_home']=1;
    }

    // Variable de sesión para la fecha de inicio de sesión
    if(!isset($_SESSION['fecha_inicio_home'])){
        $_SESSION['fecha_inicio_home'] = date("Y-m-d H:i:s");
    } 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 7.1</title>
</head>
<body>
    <ul>
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a href="sobreNosotros.php">Sobre Nosotros</a>
        </li>
        <li>
            <a href="servicios.php">Servicios</a>
        </li>
        <li>
            <a href="eventos.php">Eventos</a>
        </li>
        <li>
            <a href="close.php">Close</a>
        </li>
    </ul>
    <hr>
    <h3>Detalles de la página</h3>
    <ul>
        <li>
            Página: Home
        </li>
        <li>
            SID: <?=session_id()?> 
        </li>
        <li>
            Nombre Sesión: <?=session_name()?>
        </li>
        <li>
            Fecha/Hora Inicio Sesión: <?=$_SESSION['fecha_inicio_home']?>
        </li>
        <li>
            Visitas Home: <?=$_SESSION['num_visitas_home']?>
            <?php echo ini_get("session.gc_maxlifetime")?>
        </li>
    </ul>
</body>
</html>