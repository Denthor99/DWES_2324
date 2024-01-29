<?php

/**
 * Ejemplo 13
 * Directorios
 */
# Mostrar directorio actual
echo "Directorio actual: ". basename(getcwd());
echo "<br>";
# Mostrar el directorio padre
echo "Directorio padre: ". dirname(getcwd()). "\n";
echo "<br>";

