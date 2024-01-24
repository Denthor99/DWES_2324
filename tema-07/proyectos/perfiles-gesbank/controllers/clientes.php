<?php

class Clientes extends Controller
{

    # Método principal. Muestra todos los clientes
    public function render($param = [])
    {
        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['clientes']['main'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos al index, puesto que actualmente no tiene ningún privilegio
            header('location:'.URL.'index');
        } else {
            # Si existe un mensaje lo mostramos
            if (isset($_SESSION['mensaje'])) {
                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
            }

            # Creamos la propiedad title de la vista
            $this->view->title = "Tabla Clientes";

            # Añadimos a la propiedad de la vista "clientes" el resultado del método get(),
            // disponible en el modelo
            $this->view->clientes = $this->model->get();

            # Cargamos la vista principal
            $this->view->render("clientes/main/index");
        }
    }

    # Método nuevo. Muestra formulario añadir cliente
    public function nuevo($param = [])
    {
        # Iniciamos o continuamos la sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['clientes']['new'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:'.URL.'clientes');
        } else {
            # Creamos un objeto vacio
            $this->view->cliente = new classCliente();

            # Comprobamos si existen errores
            if (isset($_SESSION['error'])) {
                // Añadimos a la vista el mensaje de error
                $this->view->error = $_SESSION['error'];

                // Autorellenamos el formulario
                $this->view->cliente = unserialize($_SESSION['cliente']);

                // Recuperamos el array con los errores
                $this->view->errores = $_SESSION['errores'];

                // Una vez usadas las variables de sesión, deberemos eliminarlas, puesto que ya 
                // no las necesitamos y pueden causar problemas si se quedan sin borrar
                unset($_SESSION['error']);
                unset($_SESSION['cliente']);
                unset($_SESSION['errores']);


            }

            # Añadimos a la vista la propiedad title
            $this->view->title = "Formulario cliente nuevo";

            # Cargamos la vista del formulario para añadir un nuevo cliente
            $this->view->render("clientes/nuevo/index");
        }
    }

    # Método create. 
    # Permite añadir nuevo cliente a partir de los detalles del formuario
    public function create($param = [])
    {
        /**
         * Proceso de validación
         */

        # 1. Inicio/continuación de sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['clientes']['new'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:'. URL .'clientes');
        } else {
        # 2. Saneamiento de los datos del formulario
        $nombre = filter_var($_POST["nombre"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $apellidos = filter_var($_POST["apellidos"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $telefono = filter_var($_POST["telefono"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $ciudad = filter_var($_POST['ciudad'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);

        # 3. Creamos el cliente, con los datos saneados
        $cliente = new classCliente(
            null,
            $apellidos,
            $nombre,
            $telefono,
            $ciudad,
            $dni,
            $email,
            null,
            null
        );

        # 4. Validación
        // Creamos el array de errores, donde iremos añadiendo contenido si se cumplen errores
        $errores = [];

        // apellidos. Campo obligatorio y con un tamaño maximo de 45 caracteres
        if (empty($apellidos)) {
            $errores['apellidos'] = "Campo obligatorio";
        } else if (strlen($apellidos) > 45) {
            $errores['apellidos'] = "Superaste el limite de caracteres";
        }

        // nombre. Campo obligatorio y con un tamaño maximo de 20 caracteres
        if (empty($nombre)) {
            $errores['nombre'] = "Campo obligatorio";
        } else if (strlen($nombre) > 20) {
            $errores['nombre'] = "Superaste el limite de caracteres";
        }

        // Teléfono. No obligatorio, 9 dígitos numéricos
        // Creamos un regexp, ya que debe contener 9 caracteres númericos
        $tel = [
            'options' => [
                'regexp' => '/^[0-9]{9}$/'
            ]
        ];

        if (!empty($telefono) && !filter_var($telefono, FILTER_VALIDATE_REGEXP, $tel)) {
            $errores['telefono'] = "Debe ser numerico y tener 9 caracteres";
        }

        // Ciudad. Obligatorio, tamaño máximo de 20
        if (empty($ciudad)) {
            $errores['ciudad'] = "Campo obligatorio";
        } else if (strlen($ciudad) > 20) {
            $errores['ciudad'] = "Superaste el limite de caracteres";
        }

        // dni. Campo obligatorio, formato valido (8 digitos + 1 letra mayuscula) y valor unico
        // Creamos un regexp, que permita 8 digitos y 1 letra mayuscula
        $dniRegexp = [
            'options' => [
                'regexp' => '/^[0-9]{8}[A-Z]$/'
            ]
        ];

        if (empty($dni)) {
            $errores['dni'] = "Campo obligatorio";
        } else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $dniRegexp)) {
            $errores['dni'] = "Formato DNI incorrecto";
        } else if (!$this->model->validateUniqueDni($dni)) {
            $errores['dni'] = "El DNI introducido ya ha sido registrado";
        }

        // email. Campo obligatorio, formato valido y valor unico 
        if (empty($email)) {
            $errores['email'] = "Campo obligatorio";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = "Formato Email no válido";
        } else if (!$this->model->validateUniqueEmail($email)) {
            $errores['email'] = "El correo electrónico introducido ya está registrado";
        }

        # 5. Comprobar validación
        if (!empty($errores)) {
            // Errores de validación
            $_SESSION['cliente'] = serialize($cliente);
            $_SESSION['error'] = 'Formulario no validado';
            $_SESSION['errores'] = $errores;

            // Redireccionamos nuevamente al formulario nuevo
            header('Location:' . URL . 'clientes/nuevo');
        } else {
            // Añadimos el registro a la base de datos
            $this->model->create($cliente);

            // Creamos el mensaje personalizado
            $_SESSION['mensaje'] = 'Cliente creado correctamente';

            // Redirigimos a la vista principal de clientes
            header("Location:" . URL . "clientes");
        }
    }
    }

    # Método delete. 
    # Permite la eliminación de un cliente
    public function delete($param = [])
    {
        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['clientes']['delete'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:'. URL .'clientes');
        } else {
        $id = $param[0];
        $this->model->delete($id);
        $_SESSION['mensaje'] = "Cliente eliminado con correctamente";
        header("Location:" . URL . "clientes");
        }
    }

    # Método editar. 
    # Muestra un formulario que permita editar los detalles de un cliente
    public function editar($param = [])
    {
        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['clientes']['edit'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:'.URL.'clientes');
        } else {
        # Obtenemos el id del cliente a editar
        $id = $param[0];
        $this->view->id = $id;

        # Asignamos un valor a la propiedad de la vista title
        $this->view->title = "Formulario  editar cliente";

        # Asignamos a la propiedad de la vista cliente el resultado del método getCliente
        $this->view->cliente = $this->model->getCliente($id);

        # Comprobamos si el formulario viene de una no validación
        # Comprobamos si existen errores
        if (isset($_SESSION["error"])) {
            // Añadimos a la vista el mensaje de error
            $this->view->error = $_SESSION["error"];

            // Autorellenamos el formulario
            $this->view->cliente = unserialize($_SESSION['cliente']);

            // Recuperamos el array con los errores
            $this->view->errores = $_SESSION['errores'];

            // Una vez usadas las variables de sesión, las eliminmamos
            unset($_SESSION['error']);
            unset($_SESSION['cliente']);
            unset($_SESSION['errores']);
        }

        # Cargamos la vista edit del cliente
        $this->view->render("clientes/editar/index");
    }
    }

    # Método update.
    # Actualiza los detalles de un cliente a partir de los datos del formulario de edición
    public function update($param = [])
    {

        # 1. Inicio/continuación de sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['clientes']['edit'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:'. URL .'clientes');
        } else {

        # 2. Saneamiento de los datos del formulario
        $nombre = filter_var($_POST["nombre"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $apellidos = filter_var($_POST["apellidos"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $telefono = filter_var($_POST["telefono"] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $ciudad = filter_var($_POST['ciudad'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);

        # 3. Creamos el cliente, con los datos saneados
        $cliente = new classCliente(
            null,
            $apellidos,
            $nombre,
            $telefono,
            $ciudad,
            $dni,
            $email,
            null,
            null
        );

        # Cargamos el id del cliente que quiero actualizar
        $id = $param[0];

        # Obtenemos el objeto cliente original
        $clienteOriginal = $this->model->getCliente($id);

        # 4.Validación. Solo si es necesario o en caso de modificación de campo
        $errores = [];

        // Validación apellidos
        if (strcmp($apellidos, $clienteOriginal->apellidos) !== 0) {
            if (empty($apellidos)) {
                $errores['apellidos'] = "Campo obligatorio";
            } else if (strlen($apellidos) > 45) {
                $errores['apellidos'] = "Superaste el limite de caracteres";
            }
        }

        // Validación nombre
        if (strcmp($nombre, $clienteOriginal->nombre) !== 0) {
            if (empty($nombre)) {
                $errores['nombre'] = "Campo obligatorio";
            } else if (strlen($nombre) > 20) {
                $errores['nombre'] = "Superaste el limite de caracteres";
            }
        }

        // Validación telefono
        if (strcmp($telefono, $clienteOriginal->telefono)) {
            $tel = [
                'options' => [
                    'regexp' => '/^[0-9]{9}$/'
                ]
            ];

            if (!empty($telefono) && !filter_var($telefono, FILTER_VALIDATE_REGEXP, $tel)) {
                $errores['telefono'] = "Debe ser numerico y tener 9 caracteres";
            }
        }

        // Validación ciudad
        if (strcmp($ciudad, $clienteOriginal->ciudad) !== 0) {
            // Ciudad. Obligatorio, tamaño máximo de 20
            if (empty($ciudad)) {
                $errores['ciudad'] = "Campo obligatorio";
            } else if (strlen($ciudad) > 20) {
                $errores['ciudad'] = "Superaste el limite de caracteres";
            }
        }

        // Validación dni
        if (strcmp($dni, $clienteOriginal->dni) !== 0) {
            $dniRegexp = [
                'options' => [
                    'regexp' => '/^[0-9]{8}[A-Z]$/'
                ]
            ];

            if (empty($dni)) {
                $errores['dni'] = "Campo obligatorio";
            } else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $dniRegexp)) {
                $errores['dni'] = "Formato DNI incorrecto";
            } else if (!$this->model->validateUniqueDni($dni)) {
                $errores['dni'] = "El DNI introducido ya ha sido registrado";
            }
        }

        // Validación email
        if (strcmp($email, $clienteOriginal->email) !== 0) {
            if (empty($email)) {
                $errores['email'] = "Campo obligatorio";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = "Formato Email no válido";
            } else if (!$this->model->validateUniqueEmail($email)) {
                $errores['email'] = "El correo electrónico introducido ya está registrado";
            }
        }

        # 5. Comprobar validación
        if (!empty($errores)) {
            // Errores de validación
            $_SESSION['cliente'] = serialize($cliente);
            $_SESSION['error'] = 'Formulario no validado';
            $_SESSION['errores'] = $errores;

            // Redireccionamos
            header('location:' . URL . 'clientes/editar/' . $id);
        } else {
            // Actualizamos el registro
            $this->model->update($cliente, $id);

            // Añadimos a la variable de sesión un mensaje
            $_SESSION['mensaje'] = 'Cliente actualizado correctamente';

            // Redireccionamos al main de clientes
            header("Location:" . URL . "clientes");
        }
    }
    }


    # Método mostrar
    # Muestra en un formulario de solo lectura los detalles de un cliente
    public function mostrar($param = [])
    {
        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['clientes']['show'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:'.URL.'clientes');
        } else {
        $id = $param[0];
        $this->view->title = "Formulario Cliente Mostar";
        $this->view->cliente = $this->model->getCliente($id);
        $this->view->render("clientes/mostrar/index");
        }
    }

    # Método ordenar
    # Permite ordenar la tabla de clientes por cualquiera de las columnas de la tabla
    public function ordenar($param = [])
    {
        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['clientes']['order'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:'.URL.'clientes');
        } else {
        $criterio = $param[0];
        $this->view->title = "Tabla Clientes";
        $this->view->clientes = $this->model->order($criterio);
        $this->view->render("clientes/main/index");
        }
    }

    # Método buscar
    # Permite buscar los registros de clientes que cumplan con el patrón especificado en la expresión
    # de búsqueda
    public function buscar($param = [])
    {
        # Iniciamos o continuamos sesión
        session_start();

        # Comprobamos si el usuario está autentificado
        if (!isset($_SESSION['id'])) {
            // Añadimo el siguiente aviso al usuario: 
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            // Redireccionamos al login
            header('location:' . URL . 'login');
        } else if(!in_array($_SESSION['id_rol'],$GLOBALS['clientes']['filter'])){
            // Añadimos un mensaje, que indicará que el usuario actual no tiene permmisos para
            // usar esta funcionalidad
            $_SESSION['mensaje'] = "No tienes privilegios para realizar dicha operación";

            // Redireccionamos a la vista principal de clientes puesto que actualmente no tiene permisos
            header('location:'.URL.'clientes');
        } else {
        $expresion = $_GET["expresion"];
        $this->view->title = "Tabla Clientes";
        $this->view->clientes = $this->model->filter($expresion);
        $this->view->render("clientes/main/index");
        }
    }
}
