<?php
    /*
        Modelo: model.nuevo.php
        Descripción: En el formulario view.nuevo.php, cargamos los valores en select y checkbox correspondientes
    */
    # Obtengo arrays de paises, posiciones y equipos
    $paises = tablaJugadores::getPaises();
    $posiciones = tablaJugadores::getPosiciones();
    $equipos = tablaJugadores::getEquipos();
   
    
?>