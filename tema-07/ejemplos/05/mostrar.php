<?php
    /**
     * Ejemplo 7.5
     * mostrar las variables de sesión
     */

     // Iniciamos una sesion
     session_start();

     // Mostrar las variables de sesión
    
     echo $_SESSION['id'];
     echo "<br>";
     echo $_SESSION['nombre'];
     echo "<br>";
     echo $_SESSION['apellidos'];
     echo "<br>";
?>