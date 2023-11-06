<?php
    /**
     * Ejemplo de Switch condicional
     */
$nota = 6.99;
switch (true) {
    case ($nota < 5):
        echo "Insuficiente";
        break;
    case ($nota < 6):
        echo "Suficiente";
        break;
    case ($nota < 7):
        echo "Bien";
        break;
    case ($nota < 9):
        echo "Notable";
        break;
    case ($nota <= 10):
        echo "Sobresaliente";
        break;
    default:
        echo "Valor no valido";
        break;
}
?>