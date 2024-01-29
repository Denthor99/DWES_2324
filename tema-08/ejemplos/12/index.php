<?php

/**
 * Ejemplo 12
 * glob()
 * Permite especificar  un patrón de búsqueda para los nombres de archivo o directorio.
 */
# Abrimos el directorio files

// Todos los archivos
//$archivos = glob('files/*');

// Todos los archivos con extensión .txt
$archivos = glob('files/*.txt');

print_r($archivos);