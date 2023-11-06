<?php
    /**
     * Ejemplo 13
     * Imprime los numeros del 1 al 100 usando un bucle for de dos en dos. Además en el bucle for no indicaremos directamente
     * la inicialización del contador, la condición ni el propio incremento
     * 
     */
   $i=0;
     for(; ; ){
      if($i > 100){
         break;
      }
        echo "<br>";
        echo $i;
        $i+=2;
     }
?>