<?php
    /*
        Modelo: model.create.php
        Descripción: se añade un nuevo objeto de tipo jugador a la tabla (array de objetos)
    */

    // Cargaremos los arrays correspondientes
    $paises = tablaJugadores::getPaises();
    $equipos = tablaJugadores::getEquipos();
    $posiciones = tablaJugadores::getPosiciones();

    // Creamos un objeto de tipo tablaJugadores
    $jugadores = new tablaJugadores();

    // Cargamos los datos
    $jugadores->getDatos();

    // Cargamos el encabezado
    $encabezado = tablaJugadores::getEncabezado();

    // Capturamos en variables el envio de datos del formulario (método POST)
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $numero = $_POST['numero'];
    $pais = $_POST['pais'];
    $equipo = $_POST['equipo'];
    $posicionesJugador = $_POST['posiciones'];
    $contrato = $_POST['contrato'];

    // Creamos un objeto de tipo jugador.
    $jugador = new Jugador($id,$nombre,$numero,$pais,$equipo,$posicionesJugador,$contrato);

    // Usaremos el método create para incorporar el nuevo jugador a la tabla (array de objetos)
    $jugadores->create($jugador);

    // Notificación personalizada
    $notificacion = "Jugador añadido satisfactoriamente!!";
    
?>