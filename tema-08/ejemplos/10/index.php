<?php

/**
 * Ejemplo 10
 * Contenido de un directorio
 */
# Mostrar el directorio actual
echo "Directorio Actual: ".getcwd()."\n";

# Obtener contenido del directorio files
$contenido = scandir('files');
print_r($contenido);

