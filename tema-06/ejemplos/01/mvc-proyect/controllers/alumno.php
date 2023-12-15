<?php
    // Todos los controladores se crean a partir del controlador
    class Alumno Extends Controller {

        function __construct() {
            
            parent ::__construct();
            
            
        }
        // Render se ejecuta por defecto, es decir, se ejecuta cuando en la URL no hay un segundo parametro
        function render() {
            // Definimos las variables en la vista
            $this->view->nombre = "Juan";
            $this->view->apellidos = "Pérez Manzano";

            // Cargara la vista alumno
            $this->view->render('alumno/main/index');
        }

        /**
         * Método new
         * Creamos un nuevo alumno
         */
        function new(){
            $this->view->render('alumno/new/index');
        }
        /**
         * Método show
         * Muestra los detalles de un registro
         */
        function show($param = []){

        }
    }

?>