<?php

/**
 * Ejemplo 14
 * Directorios
 */
# Mostrar directorio actual
echo "Directorio actual: ". basename(getcwd());
echo "<br>";
# Cambiar directorio
chdir('files/images');
echo "Directorio padre: ". dirname(getcwd()). "\n";
echo "<br>";

// Eliminamos la carpeta
// chdir('..');
// rmdir('images');
// echo "Carpeta eliminada con éxito";

// Cambiar nombre carpeta
chdir('..');
rename('images','imagenes');