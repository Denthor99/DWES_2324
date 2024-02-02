<?php

/**
 * Ejemplo 17
 * Comprimir ficheros
 * 
 * Para usar ZipArchive es necesario ir php.ini
 * deberemos habilitar extension=zip, que se encuentra comentado
 */

 // Creamos un objeto de la clase ZipArchive
 $zip = new ZipArchive();
 
 // Abrimos el archivo zip
 if($zip->open('files.zip',ZipArchive::CREATE) === TRUE){
    // Añadimos ficheros de forma manual (uno por uno)
    $zip->addFile('files/fichero_01.jpg');
    $zip->addFile('files/fichero_02.php','files/bbdd.php'); // Cambiamos el nombre del fichero
    $zip->addFile('files/fichero_03.png');
    $zip->addFile('files/fichero_04.jpg');

    // Finalizamos el proceso de compresión
    $zip->close();
    echo "Archivo comprimido correctamente";
 } else {
    echo "Error mamón";
 }