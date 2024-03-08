<?php
class Usuarios extends Controller{

    # Método render
    # Muestra los detalles de la tabla usuarios
    function render($param = []){
        # Iniciamos o continuamos la sesión
        session_start();

        # Comprobamos si el usuario está indentificado
        if(!isset($_SESSION['id'])){
            $_SESSION['mensaje'] = "Usuario no identificado";

            // Redireccionamos al login
            header('Location: '.URL.'login');
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['main']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'usuarios');
        } else {
            # Comprobar si existe el mensaje
            if(isset($_SESSION['mensaje'])){
                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
            }

            # Creamos la propiedad title de la vista
            $this->view->title = "Tabla de Usuarios";

            # Añadimos a la vista varias propiedades
            $this->view->usuarios = $this->model->getUsuarios();
            $this->view->roles = $this->model->getRoles();
            $this->view->render("usuarios/main/index");
        }
    }
}