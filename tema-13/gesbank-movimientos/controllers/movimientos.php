<?php
class Movimientos extends Controller
{

    # Método render
    # Principal del controlador Movimiento
    # Muestra los detalles de la tabla movimientos
    function render($param = [])
    {
        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['movimientos']['main'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:'.URL.'index');
        } else {

        # Si existe un mensaje, lo mostramos
        if(isset($_SESSION['mensaje'])){
            // Añadimos a la vista el mensaje
            $this->view->mensaje = $_SESSION['mensaje'];
            // Destruimos el mensaje
            unset($_SESSION['mensaje']);
        }
        # Creamos la propiedad title a la vista
        $this->view->title = "Tabla Movimientos";


        $this->view->movimientos = $this->model->getMovimientos();
        $this->view->render("movimientos/main/index");
    }
    }

    # Método nuevo
    # Permite mostrar un formulario que permita añadir un nuevo movimiento
    function nuevo($param = [])
    {
        # Iniciamos o continuamos la sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['new']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'movimientos');
        } else {

            # Creamos un objeto vacío
            $this->view->movimiento = new classMovimiento();

            # Comprobamos si existen errores
            if (isset($_SESSION['error'])) {
                //Añadimos a la vista el mensaje de error
                $this->view->error = $_SESSION['error'];

                //Autorellenamos el formulario
                $this->view->movimiento = unserialize($_SESSION['movimiento']);

                // Recuperamos el array con los errores
                $this->view->errores = $_SESSION['errores'];

                //Una vez usadas las variables de sesión, las liberamos
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
                unset($_SESSION['movimientos']);
            }

            //Añadimos a la vista la propiedad title
            $this->view->title = "Añadir - Gestión Movimientos";
            //Para generar la lista select dinámica de cuentas
            $this->view->cuentas = $this->model->getCuentas();

            //Cargamos la vista del formulario para añadir una nueva movimientos
            $this->view->render("movimientos/nuevo/index");
        }
    }

    # Método create
    # Envía los detalles para crear un nuevo movimiento
    function create($param = [])
    {
       # Iniciamos o continuamos sesión
       session_start();

       # Comprobamos si el usuario está autentificado
       if (!isset($_SESSION['id'])) {
           // Añadimo el siguiente aviso al usuario: 
           $_SESSION['mensaje'] = "Usuario debe autentificarse";

           // Redireccionamos al login
           header('location:' . URL . 'login');
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['movimientos']['new'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de movimientos puesto que actualmente no tiene permisos
            header('location:'.URL.'movimientos');
        } else {

        # 1. Saneamiento de los datos del formulario
        $id_cuenta = filter_var($_POST['id_cuenta']??='',FILTER_SANITIZE_SPECIAL_CHARS);
        $fecha_hora = filter_var($_POST['fecha_hora']??='',FILTER_SANITIZE_SPECIAL_CHARS);
        $concepto = filter_var($_POST['concepto']??='',FILTER_SANITIZE_SPECIAL_CHARS);
        $tipo = filter_var($_POST['tipo']??='',FILTER_SANITIZE_SPECIAL_CHARS);
        $cantidad = filter_var($_POST['cantidad']??='',FILTER_SANITIZE_SPECIAL_CHARS);
        $saldo = $this->model->getSaldoIdCuenta($id_cuenta);

        # 2. Creamos un objeto de la clase "classMovimiento", con los datos saneados
        $movimiento = new classMovimiento(
            null,
            $id_cuenta,
            $fecha_hora,
            $concepto,
            $tipo,
            $cantidad,
            $saldo
        );

        # 3. Validación
        $errores = [];

        // id_cuenta. Cuenta valida y existente
        if(empty($id_cuenta)){
            $errores['id_cuenta'] = 'Campo Obligatorio, seleccione una cuenta';
        } else if(!filter_var($id_cuenta,FILTER_VALIDATE_INT)){
            $errores['id_cuenta'] = 'Deberá introducir un valor númerico en este campo';
        } else if(!$this->model->validateCuenta($id_cuenta)){
            $errores['id_cuenta']= 'No existe la cuenta indicada';
        }

        // fecha_hora. No obligatorio, fecha hora actual por defecto
        if(empty($fecha_hora || $fecha_hora = '0000-00-00 00:00:00')){
            $fecha_hora = date('Y-m-d\TH:i');
        }

        //Concepto - Valor obligatorio máximo 50 caracteres
        if (empty($concepto)) {
            $errores['concepto'] = 'El campo concepto es obligatorio';
        } else if (strlen($concepto) > 50) {
            $errores['concepto'] = 'Este campo no puede contener más de 50 caracteres';
        }

        // tipo - I o R - valor obligatorio. ha de tomar uno de estos valores ingreso o reintegro
        if(empty($tipo)){
            $errores['tipo'] = 'El campo tipo de movimiento es obligatorio';
        } else if ($tipo !== 'I' && $tipo !== 'R'){
            $errores['tipo'] = 'Tipo de movimiento invalido. Solo Ingreso (I) o Reintegro (R)';
        }

        /**
         * cantidad - ha de ser un valor tipo float. En caso de un reintegro la cantidad no podrá superar el saldo 
         * de la cuenta, en caso contrario, mostrará mensaje cantidad no disponible. Por otro lado la cantidad en caso 
         * de ser un reintegro se almacenará con un número negativo, de esta forma sumando todas las cantidades de los 
         * movimientos de una misma cuenta podré obtener el saldo.
         */

         if(empty($cantidad)){
            $errores['cantidad'] = 'El campo Cantidad es obligatorio';
         } else if(!is_numeric($cantidad)){
            $errores['cantidad'] = 'El campo Cantidad debe ser un valor númerico';
         } else if ($tipo == 'R'  && $cantidad > $saldo){
            $errores['cantidad'] = 'Cantidad no disponible, es superior al saldo actual de la cuenta';
         }


        # 4. Comprobar validación
        if(!empty($errores)){
            // Errores de validación
            $_SESSION['movimiento'] = serialize($movimiento);
            $_SESSION['error'] = 'Formulario no validado';
            $_SESSION['errores'] = $errores;

            // Redireccionamos de nuevo al formulario
            header('location:'.URL.'movimientos/nuevo/index');
        } else{
            # Ahora vamos a controlar que, según el tipo de ingreso, se actualice el saldo si:
            /**
             * 1. Tipo ingreso (i)-> le sumamos la cantidad del movimiento al saldo de la cuenta y lo actualizamos
             * 2. Tipo reintegro (r)->  restamos la cantidad del movimiento al saldo de la cuenta y lo actualizamos
             */
            if($tipo === "I"){
                $saldoActualizado = $saldo + $cantidad;
            } else {
                $saldoActualizado = $saldo - $cantidad;
            }

            # Ahora deberemos guardar el saldo actualizado
            $movimiento->saldo =  $saldoActualizado;

            # Además, guardaremos la fecha del movimiento a añadir
            $movimiento->fecha_hora = $fecha_hora;

            # Añadimos el registro a la tabla
            $this->model->create($movimiento);

            # Actualizamos el saldo y la fecha del ultimo movimiento de la cuenta, según su id
            $this->model->updateMovCuenta($id_cuenta, $saldoActualizado,$fecha_hora);

            // Crearemos un mensaje, indicando que se ha realizado dicha acción
            $_SESSION['mensaje']="Se ha realizado el movimiento en la cuenta correctamente.";

            // Redireccionamos a la vista principal de cuentas
            header("Location:" . URL . "movimientos");
        }
    }
    }
    
    # Método mostrar
    # Muestra los detalles de un movimiento en un formulario no editable
    function mostrar($param = [])
    {
        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['movimientos']['show'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de movimientos puesto que actualmente no tiene permisos
            header('location:'.URL.'movimientos');
        } else {
        # id del movimiento
        $id = $param[0];
        $this->view->title = "Mostrar movimiento";
        $this->view->movimiento = $this->model->getMovimiento($id);

        $this->view->render("movimientos/mostrar/index");
        }
    }

    # Método ordenar
    # Permite ordenar la tabla cuenta a partir de alguna de las columnas de la tabla
    function ordenar($param=[])
    {
        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['movimientos']['order'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de movimientos puesto que actualmente no tiene permisos
            header('location:'.URL.'movimientos');
        } else {
        $criterio=$param[0];
        $this->view->title = "Tabla movimientos";
        $this->view->movimientos=$this->model->order($criterio);
        $this->view->render("movimientos/main/index");
        }
    }

    # Método buscar
    # Permite realizar una búsqueda en la tabla cuentas a partir de una expresión
    function buscar($param=[])
    {
        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['movimientos']['filter'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:'.URL.'movimientos');
        } else {
        $expresion=$_GET["expresion"];
        $this->view->title = "Tabla Movimientos";
        $this->view->movimientos= $this->model->filter($expresion);
        $this->view->render("movimientos/main/index");
        }
    }
}