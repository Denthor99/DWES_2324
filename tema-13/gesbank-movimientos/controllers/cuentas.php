<?php
// Deberemos incluir en el controlador la clase pdfCuentas, pues insertarla directamente en el index.php principal
// generará conflictos con FPDF
include 'class/class.pdfCuentas.php';
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
        $_SESSION['mensaje'] = "Cuenta eliminada correctamente";

        
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
    /**
     * Método exportar
     * Exportar los datos del cliente a un fichero csv 
     *
     */
    public function exportar($param = [])
    {
        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['cuentas']['export'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:'.URL.'cuentas');
        } else {
        // Invocamos al método encargado de la exportación
        $this->model->exportarCSV();

        // Redireccionamos al main de clientes
        $this->view->render("cuentas/main/index");
        }
    }

    /**
     * Método importar
     * Importar a un fichero csv datos de cuenta
     *
     */
    public function importar($param = [])
    {
        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['cuentas']['import'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:'.URL.'cuentas');
        } else {
            if (isset($_SESSION['error'])) {

                # Mensaje de error
                $this->view->error = $_SESSION['error'];

                # Elimino las variables de sesión
                unset($_SESSION['error']);
            }

        // Añadimos un titulo
        $this->view->title = "Importar CSV - Cuentas";
        // Redireccionamos al formulario de subida de csv
        $this->view->render("cuentas/importar/index");
        }
    }

/**
 * Método validarCSV
 * Valida el archivo CSV subido a la carpeta csv
 */
public function validarCSV($param = [])
{
    # Iniciamos o continuamos la sesión
    session_start();

    # Comprobamos si el usuario está identificado
    if (!isset($_SESSION['id'])) {
        $_SESSION['mensaje'] = "El usuario debe autenticarse";
        header('location:' . URL . 'login');
        exit();

    }// Verificar si el usuario tiene los permisos necesarios
   else if (!in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['import'])) {
        $_SESSION['mensaje'] = "No tienes privilegios para realizar esta operación";
        header('location:' . URL . 'cuentas');
        exit();
    }

    // Verificar si se ha enviado un archivo
    if (!isset($_FILES['fichero'])) {
        $_SESSION['error'] = "No se ha enviado ningún archivo";
        header('location:' . URL . 'cuentas/importar');
        exit();
    }

    // Verificar si hay errores al subir el archivo
    if ($_FILES['fichero']['error'] !== UPLOAD_ERR_OK) {
        $_SESSION['error'] = "Error al subir el archivo";
        header('location:' . URL . 'cuentas/importar');
        exit();
    }

    // Verificar la extensión del archivo
    $extension = pathinfo($_FILES['fichero']['name'], PATHINFO_EXTENSION);
    if ($extension !== 'csv') {
        $_SESSION['error'] = "El archivo debe tener extensión .csv";
        header('location:' . URL . 'cuentas/importar');
        exit;
    }


    // Mover el archivo a la carpeta de destino
    // Crearemos la carpeta
    mkdir('csv');
    $directorio_destino = 'csv/';
    $archivo_destino = $directorio_destino . basename($_FILES['fichero']['name']);

    if (!move_uploaded_file($_FILES['fichero']['tmp_name'], $archivo_destino)) {
        $_SESSION['error'] = "Error al mover el archivo";
        header('location:' . URL . 'cuentas/importar');
        exit;
    }

    # Procesar el archivo CSV y realizar las operaciones necesarias
    $archivo = "csv/".basename($_FILES["fichero"]["name"]);
    $fp = fopen($archivo, "rb");

    if ($fp !== false){
        // Leemos el archivo linea por linea
        while(($fila = fgetcsv($fp , 1000,';')) !== FALSE){
           $numCuenta = $fila[0];
           $clienteId = $fila[1];
           $fechAlta = $fila[2];
           $fechaUlMov = $fila[3];
           $numMovimientos = $fila[4]; 
           $saldo = $fila[5];

        // Ahora deberemos comprobar si existen registros existentes en el csv
        if($this->model->cuentaExistente($numCuenta)) {
            // Creamos un objeto de la clase cuenta
            $cuenta = new classCuenta();
            $cuenta->num_cuenta = $numCuenta;
            $cuenta->id_cliente = $clienteId;
            $cuenta->fecha_alta = $fechAlta;
            $cuenta->fecha_ul_mov=$fechaUlMov;
            $cuenta->num_movtos=$numMovimientos;
            $cuenta->saldo=$saldo;

            // Si no existe lo inserta
            $this->model->create($cuenta);
        } else {
            echo 'error, ya existe ese registro';
        }
    }

    // Cerramos el archivo CSV
    fclose($fp);

    // Eliminar el archivo después de procesarlo
    unlink($archivo_destino);

    // Eliminamos la carpeta
    rmdir('csv');
    
    // Redireccionar a la página principal
    $_SESSION['mensaje'] = "Archivo CSV importado correctamente";
    header('location:' . URL . 'cuentas');
    exit;
}
}

/**
 * Método PDF
 * Pasa los datos de la tabla a un pdf.
 */
public function pdf() {
    # Iniciamos o continuamos la sesión
    session_start();

    # Comprobamos si el usuario está identificado
    if (!isset($_SESSION['id'])) {
        $_SESSION['mensaje'] = "El usuario debe autenticarse";
        header('location:' . URL . 'login');
        exit();

    }// Verificar si el usuario tiene los permisos necesarios
   else if (!in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['pdf'])) {
        $_SESSION['mensaje'] = "No tienes privilegios para realizar esta operación";
        header('location:' . URL . 'cuentas');
        exit();
    }

    # Usando el método get del modelo, obtenemos los datos de las cuentas
    $cuentas = $this->model->get();

    // Creamos un objeto de la clase pdfCuentas
    $pdf = new pdfCuentas();

    // Añadimos el contenido al pdf
    $pdf->Contenido($cuentas);

    // Generamos el pdf  y lo mostramos en pantalla
    $pdf->Output();
}

/**
 * Método mostrarMovimientos
 * Muestra en una vista los movimientos de una cuenta según su id
 */
public function mostrarMovimientos($param=[]){
     //Iniciar o continuar sesión
     session_start();

     # id de la cuenta
     $id = $param[0];

     //Comprobar si el usuario está identificado
     if (!isset($_SESSION['id'])) {
         $_SESSION['mensaje'] = "Usuario No Autentificado";

         header("location:" . URL . "login");
     } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['showMovs']))) {
         $_SESSION['mensaje'] = "Operación sin privilegios";
         header('location:' . URL . 'cuentas');
     } else {

         $this->view->title = "Listado de Movimientos de la Cuenta";
         $this->view->movimientos = $this->model->getMovsIdCuenta($id);
         $this->view->render("cuentas/movimientos/index");
 }
}
}