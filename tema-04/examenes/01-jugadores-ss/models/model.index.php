<?php
    /*
        Modelo: model.index.php
        Descripcion: Mostramos los datos de los jugadores en una vista
    */

    # Creo el objeto de la clase arrayUsuarios
    $jugadores = new tablaJugadores();

    # Obtengo arrays de paises, posiciones y equipos
    $paises = tablaJugadores::getPaises();
    $posiciones = tablaJugadores::getPosiciones();
    $equipos = tablaJugadores::getEquipos();

    # Cargo los datos
    $jugadores->getDatos();

    #cargo el encabezado
    $encabezado = tablaJugadores::getEncabezado();

?>