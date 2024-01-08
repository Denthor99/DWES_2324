<?php
    /**
     * Ejemplo 7.2
     * Inicio de sesión
     */

     // Iniciamos una sesion
     session_start();
     echo "Sesión iniciada correctamente";
     echo "<br>";
     echo "SID: ". session_id();
     echo "<br>";
     echo "NAME: ". session_name();


?>