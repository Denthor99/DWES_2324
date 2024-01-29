<?php

/**
 * Ejemplo 9
 * Directorios
 */
# Mostrar el directorio actual
echo "Directorio Actual: ".getcwd()."\n";

# Cambiar directorio actual
chdir('../../../tema-07');
echo "<br>";
echo "Directorio Actual: ".getcwd()."\n";

