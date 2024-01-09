<?php
    /**
     * eliminar.php
     * Ejemplo de eliminación de una cookie
     */

     // Eliminación de cookies
     if (isset($_COOKIE['nombre'])  && isset($_COOKIE['apellidos'])){
        setcookie('nombre','',time()-3600);
        setcookie('apellidos','',time()-3600);
        echo 'Cookies borradas correctamente';
     } else {
        echo 'No existen dichas cookies';
     }
     

    
     
?>