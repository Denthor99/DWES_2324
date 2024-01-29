<?php

/**
 * Ejemplo 8
 * Copiar, mover, cambiar nombre, eliminar
 */

 # Copiar archivo
// Una nueva versión
// copy('datos.txt','datos2.txt');
// echo  'Archivo copiado con exito....';

# Copiar archivo en otra carpeta
// copy('datos2.txt','files/datos2.txt');
// echo  'Archivo copiado con exito....';

# Copiar archivo a otra carpeta + cambio de nombre
// copy('datos2.txt','files/datos.txt');
// echo  'Archivo copiado con exito....';

# Machacar a la hora de copiar (sobreescribir)
// copy('datos.txt','files/datos.txt');
// echo  'Archivo copiado con exito....';

# Cambiar nombre a un archivo
// rename('datos.txt','detalles.txt');
// echo  'Operación realizada con exito....';

# Mover archivo
// rename('detalles.txt','files/detalles.txt');
// echo  'Operación realizada con exito....';

# Eliminar archivo
unlink('datos2.txt');
echo  'Eliminación realizada con exito....';
