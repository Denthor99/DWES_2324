<?php

/**
 * Ejemplo 19
 * Descomprimimos un archivo .zip
 * 
 * Recordatorio: para usar ZipArchive es necesario ir php.ini
 * deberemos habilitar extension=zip, que se encuentra comentado
 */

 // Creamos un objeto de la clase ZipArchive
 $zip = new ZipArchive();
 
 // Abrimos el archivo zip
 if($zip->open('files.zip') === TRUE){
    // Extraemos el archivo al directorio que indiquemos
    $zip->extractTo('./spiderman');

    // Finalizamos el proceso de compresión
    $zip->close();
    echo "Archivo descomprimido";
 } else {
    echo "Error mamón";
 }