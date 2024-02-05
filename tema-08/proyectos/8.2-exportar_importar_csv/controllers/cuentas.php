<?php

class Cuentas extends Controller
{

    # Método render
    # Principal del controlador Cuentas
    # Muestra los detalles de la tabla Cuentas
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
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['cuentas']['main'])){
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
        $this->view->title = "Tabla Cuentas";
        $this->view->cuentas = $this->model->get();
        $this->view->render("cuentas/main/index");
    }
    }

    # Método nuevo
    # Permite mostrar un formulario que permita añadir una nueva cuenta
    function nuevo($param = [])
    { 
        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['cuentas']['new'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:'.URL.'cuentas');
        } else {

        # Creamos un objeto vacío
        $this->view->cuenta = new classCuenta();

        # Comprobamos si existen errores
        if(isset($_SESSION['error'])){
            // Añadimos a la vista el mensaje de error
            $this->view->error = $_SESSION['error'];

            // Autorellenamos el formulario
            $this->view->cuenta = unserialize($_SESSION['cuenta']);

            // Recuperamos el array con los errores
            $this->view->errores = $_SESSION['errores'];

            // Una vez usadas las variables de sesión, las liberamos
            unset($_SESSION['error']);
            unset($_SESSION['errores']);
            unset($_SESSION['cuenta']);
        }

        // Añadimos a la vista la propiedad title
        $this->view->title = "Formulario añadir cuenta";

        // Para generar la lista select dinámica de clientes
        $this->view->clientes= $this->model->getClientes();

        // Cargamos la vista del formulario para añadir una nueva cuenta
        $this->view->render("cuentas/nuevo/index");
    }
    }

    # Método create
    # Envía los detalles para crear una nueva cuenta
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
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['cuentas']['new'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:'.URL.'cuentas');
        } else {

        # 1. Saneamiento de los datos del formulario
        $num_cuenta = filter_var($_POST['num_cuenta']??='',FILTER_SANITIZE_SPECIAL_CHARS);
        $id_cliente = filter_var($_POST['id_cliente']??='',FILTER_SANITIZE_NUMBER_INT);
        $fecha_alta = filter_var($_POST['fecha_alta']??='',FILTER_SANITIZE_SPECIAL_CHARS);
        $saldo = filter_var($_POST['saldo']??='',FILTER_SANITIZE_SPECIAL_CHARS);

        # 2. Creamos un objeto de la clase "classCuenta", con los datos saneados
        $cuenta = new classCuenta(
            null,
            $num_cuenta,
            $id_cliente,
            $fecha_alta,
            date("d-m-Y H:i:s"),
            0,
            $saldo,
            null,
            null
        );

        # 3. Validación
        $errores = [];

        // Número de la cuenta. Campo obligatorio, tamaño de 20 dígitos númericos, valor único (clave segundaria)
        // Definimos una expresión regular (REGEXP)
        $cuenta_regexp=[
            'options' => [
                'regexp' => '/^[0-9]{20}$/'
            ]
        ];
        if(empty($num_cuenta)){
            $errores['num_cuenta'] = 'Campo Obligatorio, añada un número de cuenta';
        } else if (!filter_var($num_cuenta,FILTER_VALIDATE_REGEXP,$cuenta_regexp)){
            $errores['num_cuenta'] = 'Formato no valido, deben ser 20 caracteres númericos';
        } else if (!$this->model->validateUniqueNumCuenta($num_cuenta)){
            $errores['num_cuenta'] = "El número de cuenta ya está registrado";
        }

        // Cliente. Campo obligatorio, valor numérico, debe existir en la tabla de clientes
        if(empty($id_cliente)){
            $errores['id_cliente'] = 'Campo Obligatorio, seleccione un cliente';
        } else if(!filter_var($id_cliente,FILTER_VALIDATE_INT)){
            $errores['id_cliente'] = 'Deberá introducir un valor númerico en este campo';
        } else if(!$this->model->validateCliente($id_cliente)){
            $errores['id_cliente']= 'No existe el cliente indicado';
        }

        // Fecha alta. Campo obligatorio, con formato valido
        if(empty($fecha_alta)){
            $errores['fecha_alta']='Campo Obligatorio, añada una fecha';
        } else if (!$this->model->validateFecha($fecha_alta)){
            $errores['fecha_alta']='La fecha no tiene el formato correcto';
        }

        # 4. Comprobar validación
        if(!empty($errores)){
            // Errores de validación
            $_SESSION['cuenta'] = serialize($cuenta);
            $_SESSION['error'] = 'Formulario no validado';
            $_SESSION['errores'] = $errores;

            // Redireccionamos de nuevo al formulario
            header('location:'.URL.'cuentas/nuevo/index');
        } else{
            # Añadimos el registro a la tabla
            $this->model->create($cuenta);

            // Crearemos un mensaje, indicando que se ha realizado dicha acción
            $_SESSION['mensaje']="Se ha creado la cuenta bancaria correctamente.";

            // Redireccionamos a la vista principal de cuentas
            header("Location:" . URL . "cuentas");
        }
    }
    }

    # Método delete
    # Permite eliminar una cuenta de la tabla
    function delete($param = [])
    {
        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['cuentas']['delete'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:'.URL.'cuentas');
        } else {
        $id=$param[0];
        $this->model->delete($id);
        header("Location:" . URL . "cuentas");
        }
    }

    # Método editar
    # Muestra los detalles de una cuenta en un formulario de edición
    # Sólo se podrá modificar el titular o cliente de la cuenta
    function editar($param = [])
    {
        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['cuentas']['edit'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:'.URL.'cuentas');
        } else {
        # Obtengo el id de la cuenta a editar
        $id = $param[0];

        # Asignamos dicho id a una propiedad de la vista
        $this->view->id = $id;

        # Comprobamos si el formulario viene de una no validación
        if(isset($_SESSION['error'])){
            // Añadimos a la vista en el mensaje de error
            $this->view->error = $_SESSION['error'];

            // Autorellenamos el formulario
            $this->view->cuenta = unserialize($_SESSION['cuenta']);

            // Recuperamos el array con los errores
            $this->view->errores = $_SESSION['errores'];

            // Una vez usadas las variables de sesión, las liberamos
            unset($_SESSION['error']);
            unset($_SESSION['errores']);
            unset($_SESSION['cuenta']);

        }

        // Añadimos a la propiedad de la vista title un texto
        $this->view->title = "Formulario editar cuenta";

        // Añadimos a la vista las siguientes propiedades:
        $this->view->clientes = $this->model->getClientes();
        $this->view->cuenta = $this->model->getCuenta($id);
        
        // Cargamos la vista de editar la cuenta
        $this->view->render("cuentas/editar/index");
    }
    }

    # Método update
    # Envía los detalles modificados de una cuenta para su actualización en la tabla
    function update($param = [])
    {
        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['cuentas']['edit'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:'.URL.'cuentas');
        } else {

        # 1. Saneamos los datos del formulario
        $num_cuenta = filter_var($_POST['num_cuenta']??='',FILTER_SANITIZE_SPECIAL_CHARS);
        $id_cliente = filter_var($_POST['id_cliente']??='',FILTER_SANITIZE_NUMBER_INT);
        $num_movimientos = filter_var($_POST['num_movtos']??='',FILTER_SANITIZE_SPECIAL_CHARS);
        $fechaUltMovimiento= filter_var($_POST['fecha_ul_mov']??='',FILTER_SANITIZE_SPECIAL_CHARS);
        $fecha_alta = filter_var($_POST['fecha_alta']??='',FILTER_SANITIZE_SPECIAL_CHARS);
        $saldo = filter_var($_POST['saldo']??='',FILTER_SANITIZE_SPECIAL_CHARS);
        
        # 2. Creamos el objeto cuenta, a partir de los datos saneados del formulario
        $cuenta = new classCuenta(
            null,
            $num_cuenta,
            $id_cliente,
            $fecha_alta,
            $fechaUltMovimiento,
            $num_movimientos,
            $saldo,
            null,
            null
        );

        // Cargamos el id de la cuenta a actualizar
        $id = $param[0];

        # Obtenemos el objeto original de la clase classCuenta
        $original = $this->model->getCuenta($id);
       

        # 3. Validación
        // Solo si es necesario y en caso de modificación del campo
        $errores = [];

        // Validar el numero de cuenta
        if (strcmp($num_cuenta,$original->num_cuenta) !==0){
            $cuenta_regexp=[
                'options' => [
                    'regexp' => '/^[0-9]{20}$/'
                ]
            ];
            if(empty($num_cuenta)){
                $errores['num_cuenta'] = 'Campo Obligatorio, añada un número de cuenta';
            } else if (!filter_var($num_cuenta,FILTER_VALIDATE_REGEXP,$cuenta_regexp)){
                $errores['num_cuenta'] = 'Formato no valido, deben ser 20 caracteres númericos';
            } else if (!$this->model->validateUniqueNumCuenta($num_cuenta)){
                $errores['num_cuenta'] = "El número de cuenta ya está registrado";
            }
        }

        // Validar el cliente
        if(strcmp($id_cliente,$original->id_cliente) !== 0){
            if(empty($id_cliente)){
                $errores['id_cliente'] = 'Campo Obligatorio, seleccione un cliente';
            } else if(!filter_var($id_cliente,FILTER_VALIDATE_INT)){
                $errores['id_cliente'] = 'Deberá introducir un valor númerico en este campo';
            } else if(!$this->model->validateCliente($id_cliente)){
                $errores['id_cliente']= 'No existe el cliente indicado';
            }
        }

        // Validar la fecha de alta
        if(strcmp($fecha_alta,$original->fecha_alta) !==0){
            if(empty($fecha_alta)){
                $errores['fecha_alta']='Campo Obligatorio, añada una fecha';
            } else if (!$this->model->validateFecha($fecha_alta)){
                $errores['fecha_alta']='La fecha no tiene el formato correcto';
            }
        }

        // Validamos la fecha de último movimiento
        if(strcmp($fechaUltMovimiento,$original->fecha_ul_mov)){
            if(!empty($fechaUltMovimiento && !$this->model->validateFecha($fechaUltMovimiento))){
                $errores['fecha_ul_mov']='La fecha no tiene el formato correcto';
            }
        }

        # 4. Comprobar validación
        if(!empty($errores)){
            // Errores de validación
            $_SESSION['cuenta'] = serialize($cuenta);
            $_SESSION['error'] = 'Formulario no validado';
            $_SESSION['errores'] = $errores;

            // Redireccionamos
            header('location:' . URL . 'cuentas/editar/'.$id);
        } else {
            // Actualizamos el registro de la base de datos
            $this->model->update($cuenta, $id);

            // Creamos el mensaje personalizado
            $_SESSION['mensaje'] = 'Se ha actualizado la cuenta con éxito';
            
            // Redireccionamos a la vista principal de cuentas
            header("Location:" . URL . "cuentas");
        }
    }
    }

    
    # Método mostrar
    # Muestra los detalles de una cuenta en un formulario no editable
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
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['cuentas']['show'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:'.URL.'cuentas');
        } else {
        # id de la cuenta
        $id = $param[0];

        $this->view->title = "Formulario Cuenta Mostar";
        $this->view->cuenta = $this->model->getCuenta($id);
        $this->view->cliente = $this->model->getCliente($this->view->cuenta->id_cliente);
       
        // // formateamos la fecha
        // $fechaf=(str_split($this->view->cuenta->fecha_alta));
        // for ($i=0; $i <9 ; $i++) { 
        //     array_pop($fechaf);
        // }
        // $fechafort=implode($fechaf);
        // $this->view->cuenta->fecha_alta=$fechafort;

        $this->view->render("cuentas/mostrar/index");
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
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['cuentas']['order'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:'.URL.'cuentas');
        } else {
        $criterio=$param[0];
        $this->view->title = "Tabla Cuentas";
        $this->view->cuentas=$this->model->order($criterio);
        $this->view->render("cuentas/main/index");
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
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['cuentas']['filter'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:'.URL.'cuentas');
        } else {
        $expresion=$_GET["expresion"];
        $this->view->title = "Tabla Cuentas";
        $this->view->cuentas= $this->model->filter($expresion);
        $this->view->render("cuentas/main/index");
        }
    }
}
