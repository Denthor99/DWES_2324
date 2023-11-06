<?php
    /**
     * Actividad 3.2 - Estructura condicional Switch
     * Nombre alumno - Daniel Alfonso Rodríguez Santos
     * 
     * Enunciado:
     * Función date()
     * La función date() en PHP devuelve la fecha actual en distintos formatos, si usamos date('m') devolvería el número del mes al corriente. 
     * Se pide crear script PHP para que muestre el nombre del mes en español, a partir del valor que devuelve dicha función.
     * 
     */
    echo "<h1 align=\"center\">Mes actual</h1>";
    echo "Estamos en el mes de ";
    
    $mes = date("m");
    switch ($mes){
        case 1:
            echo "<strong>Enero</strong>";
            break;
        case 2:
            echo "<strong>Febrero</strong>";
            break;
        case 3:
            echo "<strong>Marzo</strong>";
            break;
        case 4:
            echo "<strong>Abril</strong>";
            break;
        case 5;
            echo "<strong>Mayo</strong>";
            break;
        case 6;
            echo "<strong>Junio</strong>";
            break;
        case 7:
            echo "<strong>Julio</strong>";
            break;
        case 8: 
            echo "<strong>Agosto</strong>";
            break;
        case 9:
            echo "<strong>Septiembre</strong>";
            break;
        case 10:
            echo "<strong>Octubre</strong>";
            break;
        case 11:
            echo "<strong>Noviembre</strong>";
            break;
        case 12:
            echo "<strong>Diciembre</strong>";
            break;
        default:
            echo "No tenemos un formato adecuado";
            break;
    }
?>