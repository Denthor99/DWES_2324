<?php
    /**
     * Ejemplo 7.5
     * variables de sesión
     */

     // Iniciamos una sesion
     session_start();

     // Crear variable de sesión
     $_SESSION['nombre'] = 'Daniel Alfonso';
     $_SESSION['apellidos'] = 'Rodríguez Santos';
     $_SESSION['id'] = 897;
?>