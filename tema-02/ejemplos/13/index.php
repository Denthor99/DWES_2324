<?php
    /*
        Función is_null()

        - variable no definida
    */

    // variable no definida
    var_dump(is_null($var));
    echo "<BR>";

    // variable definida con valor null
    $var=null;
    var_dump(is_null($var));
    echo "<BR>";

    // variable eliminada
    unset($var);
    var_dump(is_null($var));
    echo "<BR>";

?>