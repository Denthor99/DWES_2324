<?php

    /*
        Ejemplo 01

        Crear Archivo

    */


    //crear Archivo para escritura, si no existe lo crea

    //Apertura de archivo
    $fichero = "ejemplo.txt";
    $fp = fopen($fichero, "wb");

    //Escribir en el archivo
    fwrite($fp, "Cien complejos");

    //Cierre de archivo
    fclose($fp);


    echo "Archivo Creado";