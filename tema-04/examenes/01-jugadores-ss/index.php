<?php
    /*
        Controlador: index.php
        Descripcion: Nos muestra los datos de los jugadores en una tabla
    */
    // Cargamos las clases correspondientes
    include 'class/class.jugador.php';
    include 'class/class.arrayJugadores.php';

    // Cargamos el modelo
    include 'models/model.index.php';

    // Cargamos la vista principal
    include 'views/view.index.php';
?>