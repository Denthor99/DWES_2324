<?php
    /*
        Ejemplo 4:
        Calificación de una nota de 0 a 10
    */
// Declaración de las variables
$a = 11.2;

if ($a < 5) {
    echo "Insuficiente, te tienes que aplicar más.";
} else if ($a < 6){
    echo "Suficiente, muy justo, a la próxima tienes que estudiar más";
} else if ($a < 7){
    echo "Bien, al final te sacaste el curso";
} else if ($a < 9){
    echo "Notable, buen trabajo";
} else if ($a <=10){
    echo "Sobresaliente, enhorabuena!!!";
} else {
    echo "Valor no permitido";
}
?>