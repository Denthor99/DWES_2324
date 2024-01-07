<?php
    class Cuenta extends Controller{
        function __construct(){
            parent::__construct();
        }

        // Método render, se ejecuta si no hay parametros
        function render(){
            // Añadimos un título a la vista
            $this->view->title = "Tabla Cuentas";

            // Creamos la propiedad clientes dentro de la vista, y ejecutamos el método get
            $this->view->cuentas = $this->model->get();

            // Cargamos la vista cliente
            $this->view->render('cuenta/main/index');
        }

        // Método new, donde saldrá un formulario para introducir una nueva cuenta
        function new(){
            // Añadimos un titulo a la vista
            $this->view->title = "Añadir - Gestión Cuentas";

            // Creamos una propiedad llamada clientes, donde almacenaremos el resultado de método getClientes del modelo cuenta
            $this->view->clientes = $this->model->getClientes();

            // Cargamos la vista con el formulario correspondiente
            $this->view->render('cuenta/new/index');
        }

        // Método create, introduce una nueva cuenta a la base de datos
        function create($param=[]){
            // Cargamos los datos del formulario
            $cuenta = new classCuenta(null,
            $_POST['num_cuenta'],
            $_POST['id_cliente'],
            $_POST['fecha_alta'],
            $_POST['fecha_ul_mov'],
            $_POST['num_movtos'],
            $_POST['saldo']);

            // Añadimos el registro a la tabla
            $this->model->create($cuenta);

            // Redireccionamos
            header('Location:'.URL.'cuenta');
        }

        // Método edit, editar un registro de la base de datos
        function edit($param = []){
            // obtenemos el id de la cuenta
            $id = $param[0];

            // Creamos una propiedad de la vista llamada id
            $this->view->id = $id;

            // Asignamos un título a la página
            $this->view->title = 'Editar - Gestión Cuentas';

            // Creamos en la vista una propiedad de cuenta
            $this->view->cuenta = $this->model->read($id);
            
            // Creamos una propiedad llamada clientes, donde almacenaremos el resultado de método getClientes del modelo cuenta
            $this->view->clientes = $this->model->getClientes();

            // Cargamos la vista con el formulario correspondiente
            $this->view->render('cuenta/edit/index');
        }

        // Método update
        function update($param = []){
            //Obtenemos el id de la cuenta
            $id = $param[0];

            // Asignamos el id a una propiedad de la vista
            $this->view->id = $id;

            // Cargamos los datos del formulario
            $cuenta = new classCuenta(null,
            $_POST['num_cuenta'],
            $_POST['id_cliente'],
            $_POST['fecha_alta'],
            $_POST['fecha_ul_mov'],
            $_POST['num_movtos'],
            $_POST['saldo']);

             // Actualizamos el registro de la base de datos
             $this->model->update($id,$cuenta);

             // Redireccionamos
             header("Location:".URL."cuenta");
        }


        // Método delete, elimina una cuenta según su id
        function delete($param=[]){
         //Obtenemos el id de la cuenta
         $id = $param[0];

         // Asignamos el id a una propiedad de la vista
         $this->view->id = $id;

         // Eliminamos el registro de la base de datos
         $this->model->delete($id);

         // Redireccionamos
         header("Location:".URL."cuenta");

        }

        // Método show, muetra los datos de una cuenta
        function show($param=[]){
            // Obtenemos el id de la cuenta
            $id = $param[0];

            // Creamos una propiedad llamada id a la vista
            $this->view->id = $id;

            // Añadimos un propiedad llamada title
            $this->view->title = "Datos de la cuenta";

            // Obtenemos un objeto de la clase cuenta
            $this->view->cuenta = $this->model->read($id);

            // Cargamos la vista con los datos del cliente
            $this->view->render('cuenta/show/index');
        }


        // Método order
        function order($param=[]){
            // Obtenemos el criterio de Ordenacion
            $criterio = $param[0];

            // Añadimos una propiedad title a la vista
            $this->view->title = 'Ordenar - Tabla Cuentas';

            // Creamos la propiedad cuetnas dentro de la vista, y ejecutamos el método order del modelo
            $this->view->cuentas = $this->model->order($criterio);

            // Cargamos la vista de clientes
           $this->view->render('cuenta/main/index');
        }

        // Método filter
        function filter($param=[]){
            // Capturamos la expresión a través del método GET
            $expresion = $_GET['expresion'];

            // Creamos la propiedad title en la vista
            $this->view->title = 'Filtrar - Tabla Cuentas';

            // Creamos en la vista la propiedad cuentas, y ejecutamos el método filter del modelo cuenta
            $this->view->cuentas = $this->model->filter($expresion);

            // Cargamos la vista principal de clientes
            $this->view->render('cuenta/main/index');
        }
    }
?>