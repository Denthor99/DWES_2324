<?php
    /**
     * crear.php
     * Ejemplo de creación de una cookie
     */

     $nombre_cookie1 = "nombre";
     $nombre_cookie2 = "apellidos";

     // Creamos una variable con nuestro nombre
     $nombre1 ="Daniel Alfonso";
     $nombre2= "Rodríguez Santos";

     // Creamos una variable con el tiempo de expiración
    $expirar1 = time() + 60*60;
    $expirar2 =  time() + 60 * 60;

     setcookie($nombre_cookie1,$nombre1,$expirar1);
     setcookie($nombre_cookie2,$nombre2,$expirar2);
     
?>