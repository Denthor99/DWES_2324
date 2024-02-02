<?php

/**
 * Ejemplo 18
 * Comprimir todos los archivos de una carpeta
 * 
 * Recordatorio: para usar ZipArchive es necesario ir php.ini
 * deberemos habilitar extension=zip, que se encuentra comentado
 */

 // Creamos un objeto de la clase ZipArchive
 $zip = new ZipArchive();
 
 // Abrimos el archivo zip
 if($zip->open('files.zip',ZipArchive::CREATE) === TRUE){
    // Usaremos la función glob 
   $files = glob('files/*');

   // Recorremos el array
   foreach($files as $file){
      $zip->addFile($file);
   }

    // Finalizamos el proceso de compresión
    $zip->close();
    echo "Carpeta comprimida correctamente";
 } else {
    echo "Error mamón";
 }