<?php
    /**
     * Ejemplo 7.3
     * Sesión Personalizada
     */

     // Personalizamos la sesión
     session_id('697667252');
     session_name('first_connect');

     // Iniciamos una sesion
     session_start();
     echo "Sesión iniciada correctamente";
     echo "<br>";
     echo "SID: ". session_id();
     echo "<br>";
     echo "NAME: ". session_name();


?>