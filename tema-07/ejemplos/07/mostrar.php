<?php
    /**
     * mostrar.php
     * Ejemplo de lectura de una cookie
     */

     // Accedo a la cookie
     if (isset($_COOKIE['nombre'])  && isset($_COOKIE['apellidos'])){
        echo 'Datos de las cookies: ';
        echo '<br>';
        echo $_COOKIE['nombre'];
        echo '<br>';
        echo $_COOKIE['apellidos'];

     } else {
        echo 'No existen dichas cookies';
     }
     
     
?>