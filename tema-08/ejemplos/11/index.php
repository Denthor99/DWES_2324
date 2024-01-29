<?php

/**
 * Ejemplo 11
 * abrir directorio, leer y cerrar directorio
 */
# Mostrar el directorio actual
echo "Directorio Actual: ".getcwd()."\n";
echo "<br>";
if ($gestor = opendir('files')){
    echo "Gestor de directorio " . $gestor;
    echo "<br>";
    while ($entrada = readdir($gestor)){
        echo(is_dir($entrada)? 'directorio':'fichero');
        echo " ".$entrada;
        echo "<br>";
    }

# Cierro directorio
closedir($gestor);
echo "Directorio abierto correctamente";
} else {
    echo "Error apertura de directorio";
}