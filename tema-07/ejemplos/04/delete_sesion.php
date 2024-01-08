<?php
    /**
     * Ejemplo 7.4
     * Destruir la sesión
     */

    // Continuamos con la sesión
    session_start();

    // Detalles de la sesión
    echo "<br>";
     echo "SID: ". session_id();
     echo "<br>";
     echo "NAME: ". session_name();

     // Elimino sesión
     session_destroy();
     session_unset();
     echo "<br>";
     echo "Sesión iniciada correctamente";
     echo "<br>";
     echo session_cache_expire();
     

?>