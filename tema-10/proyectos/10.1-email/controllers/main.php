<?php

class Main extends Controller
{

    function __construct()
    {

        parent::__construct();


    }

    function render()
    {
        //Iniciar sesión
        session_start();

        # Comprobar si vuelvo de un registro no validado
        if (isset($_SESSION['error'])) {
            # Mensaje de error
            $this->view->error = $_SESSION['error'];

            # Recupero array de errores específicos
            $this->view->errores = $_SESSION['errores'];

            unset($_SESSION['error']);
            unset($_SESSION['errores']);
        }

        # Comprobar si existe el mensaje
        if (isset($_SESSION['mensaje'])) {
            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }

        $this->view->render('main/index');
    }
}

?>