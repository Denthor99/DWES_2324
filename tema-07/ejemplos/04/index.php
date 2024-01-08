<?php
    /**
     * Ejemplo 7.4
     * Crea la sesion
     */

     // Iniciamos una sesion
     session_start();
     echo "Sesión iniciada correctamente";
     echo "<br>";
     echo "SID: ". session_id();
     echo "<br>";
     echo "NAME: ". session_name();


?>