<?php
    /*
        Modelo: model.mostrar.php
        Descripción: Muestra los detalles de un jugador, a través de un indice (generado automaticamente)
    */

    // Cargamos los datos correspondientes
    $equipos = tablaJugadores::getEquipos();
    $paises = tablaJugadores::getPaises();
    $posiciones = tablaJugadores::getPosiciones();

    // Creamos un objeto de la clase tablaJugadores
    $jugadores = new tablaJugadores();
    $jugadores->getDatos();

    // Capturamos el id a través del método GET
    $id = $_GET['key'];

    // Elegimos el articulo a mostrar. Funcion read será necesaria
    $jugador = $jugadores->read($id);
?>