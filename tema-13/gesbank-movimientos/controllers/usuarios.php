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
            $this->view->title = "Tabla de Usuarios - Administrador";

            # Añadimos a la vista varias propiedades
            $this->view->usuarios = $this->model->getUsuarios();
            $this->view->roles = $this->model->getRoles();

            # Antes de redireccionar al main, deberemos crear una propiedad model, esto es debido a que
            # si no no se puede mostrar el rol de usuario
            $this->view->model = $this->model;
            $this->view->render("usuarios/main/index");
        }
    }

    # Método nuevo
    # Vista para añadir nuevos usuarios
    function nuevo($param = []){
         # Iniciamos o continuamos la sesión
         session_start();

         # Comprobamos si el usuario está indentificado
         if(!isset($_SESSION['id'])){
             $_SESSION['mensaje'] = "Usuario no identificado";
 
             // Redireccionamos al login
             header('Location: '.URL.'login');
         } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['new']))) {
             $_SESSION['mensaje'] = "Operación sin privilegios";
             header('location:' . URL . 'usuarios');
         } else {
            # Creamos un objeto vació de la clase Usuarios
            $this->view->usuario = new classUser();

            # Comprobación de errores
            if (isset($_SESSION['error'])) {
                # Añadimos como propiedad de la vista el mensaje de error
                $this->view->error = $_SESSION['error'];

                # Deberemos autorellenar el formulario
                $this->view->usuario = unserialize($_SESSION['usuario']);

                # Añadimos el array de errores a la vista
                $this->view->errores = $_SESSION['errores'];

                # Borramos las variables de sesión una vez utilizadas
                unset($_SESSION['error']);
                unset($_SESSION['usuario']);
                unset($_SESSION['errores']);
            }

            # Añadimos la propiedad title a la vista
            $this->view->title = "Añadir nuevo usuario - Administrador";

            # Mostramos en la vista los roles de usuario (select)
            $this->view->roles = $this->model->getRoles();

            # Cargamos el formulario donde se añadiran nuevos usuarios
            $this->view->render('usuarios/nuevo/index');
         }
    }

    # Método Create
    # Validación de los datos del formulario y creación de los nuevos usuarios
    public function create($param = []) {
        # Iniciamos o continuamos la sesión
        session_start();

        # Comprobamos si el usuario está indentificado
        if(!isset($_SESSION['id'])){
            $_SESSION['mensaje'] = "Usuario no identificado";

            // Redireccionamos al login
            header('Location: '.URL.'login');
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['new']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'usuarios');
        } else {
            # 1. Saneamos los datos del formulario
            $rol = filter_var($_POST['rol']??='',FILTER_SANITIZE_SPECIAL_CHARS);
            $name = filter_var($_POST['name']??='',FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email']??='',FILTER_SANITIZE_EMAIL);
            $password = filter_var($_POST['password']??='',FILTER_SANITIZE_SPECIAL_CHARS);
            $password_confirm = filter_var($_POST['password_confirm']??='',FILTER_SANITIZE_SPECIAL_CHARS);

            # 2. Creamos un objeto de la clase classUser con los datos saneados del formulario
            $usuario = new classUser(
                null,
                $name,
                $email,
                $password,
                $password_confirm,
                $rol
            );

            # 3. Validación
            $errores = [];

            // Nombre. Obligatorio, no puede superar los 15 caracteres y debe ser unico
            if (empty($name)) {
                $errores['name'] = 'El campo nombre es obligatorio';
            } else if(strlen($name) > 15){
                $errores['name'] = 'El nombre de usuario no debe de superar los 15 caracteres';
            } else if (!$this->model->usuarioUnique($name)){
                $errores['name'] = 'El nombre de usuario ya está registrado';
            }

            # Contraseña. Obligatorio.
            if (empty($password)){
                $errores['password'] = 'El campo Contraseña es obligatorio';
            } else if ($password != $password_confirm){
                $errores['password'] = 'No coinciden las contraseñas, intente nuevamente';
            }

            # Verificación de contraseña. Obligatorio. Se debe coincidir 
            if (empty($password_confirm)){
                $errores['password_confirm'] = 'Se debe confirmar la contraseña para continuar';
            } else if ($password != $password_confirm){
                $errores['password_confirm'] = 'No coinciden las contraseñas, intente nuevamente';
            }

            # Email. Obligatorio, y email unico
            if (empty($email)) {
                $errores['email'] = 'El campo Email es obligatorio';
            }else if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errores['email'] = 'Formato no valido';

            } else if (!$this->model->emailUnique($email)){
                $errores['email'] = 'El correo electrónico ya está registrado';
            }

            # Roles
            if(empty($rol)){
                $errores['rol'] = "Debe asignar obligatoriamente un rol al usuario";
            } else if (!in_array($rol,[1,2,3])) {
                $errores['rol'] = "El rol asignado no existe";
            }

            # 4. Comprobar validación
            if(!empty($errores)){
                # Si existe algún error
                $_SESSION['usuario'] = serialize($usuario);
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;

                # Redireccionamos de nuevo al formulario
                header('location:'.URL.'usuarios/nuevo');
            } else {
                # Añadimos el registro a la tabla
                $this->model->create($usuario);

                # Indicamos un mensaje, confirmando la creación del usuario
                $_SESSION['mensaje'] = 'Se ha creado el usuario correctamente';
                
                // Redireccionamos a la vista principal de usuarios
                header('Location: '.URL.'usuarios');
            }
        }
    }

    # Método Delete
    # Eliminar un usuario de la tabla
    public function delete($param = []) {
        # Iniciamos o continuamos la sesión
        session_start();

        # Comprobamos si el usuario está indentificado
        if(!isset($_SESSION['id'])){
            $_SESSION['mensaje'] = "Usuario no identificado";

            // Redireccionamos al login
            header('Location: '.URL.'login');
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['delete']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'usuarios');
        } else {

            # Obtenemos el id del usuario
            $id = $param[0];

            # Usando un método del modelo, eliminamos el usuario
            $this->model->delete($id);

            # Añadimos un mensaje sobre el estado actual de ese usuario
            $_SESSION['mensaje'] = "Usuario eliminado correctamente";

            # Redireccionamos a la vista principal del usuario
            header("location: ".URL."usuarios");
        }
    }

    # Método ordenar
    # Permite ordenar la tabla usuario a partir de alguna de las columnas de la tabla
    function ordenar($param = [])
    {
       # Iniciamos o continuamos la sesión
       session_start();

       # Comprobamos si el usuario está indentificado
       if(!isset($_SESSION['id'])){
           $_SESSION['mensaje'] = "Usuario no identificado";

           // Redireccionamos al login
           header('Location: '.URL.'login');
       } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['order']))) {
           $_SESSION['mensaje'] = "Operación sin privilegios";
           header('location:' . URL . 'usuarios');
       } else {

            $criterio = $param[0];
            $this->view->title = "Tabla Usuarios - Administrador";
            $this->view->usuarios = $this->model->order($criterio);
            $this->view->model = $this->model;
            $this->view->render("usuarios/main/index");
        }
    }

    # Método buscar
    # Muestra en la tabla los registros coincidentes
    function buscar($param = [])
    {
         # Iniciamos o continuamos la sesión
       session_start();

       # Comprobamos si el usuario está indentificado
       if(!isset($_SESSION['id'])){
           $_SESSION['mensaje'] = "Usuario no identificado";

           // Redireccionamos al login
           header('Location: '.URL.'login');
       } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['filter']))) {
           $_SESSION['mensaje'] = "Operación sin privilegios";
           header('location:' . URL . 'usuarios');
       } else {

            $expresion = $_GET["expresion"];
            $this->view->title = "Tabla Usuarios - Administrador";
            $this->view->usuarios = $this->model->filter($expresion);
            $this->view->model = $this->model;
            $this->view->render("usuarios/main/index");
        }
    }

    # Método mostrar
    # Muestra en un formulario los detalles de un usuario especifico
    function mostrar($param = []){
        # Iniciamos o continuamos la sesión
       session_start();

       # Comprobamos si el usuario está indentificado
       if(!isset($_SESSION['id'])){
           $_SESSION['mensaje'] = "Usuario no identificado";

           // Redireccionamos al login
           header('Location: '.URL.'login');
       } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['show']))) {
           $_SESSION['mensaje'] = "Operación sin privilegios";
           header('location:' . URL . 'usuarios');
       } else {

        # Obtenemos el id del usuario
        $id = $param[0];

        # Añadimos a una propiedad de la vista los datos del usuario
        $this->view->usuario = $this->model->getUsuario($id);

        # Deberemos añadir también a la vista como una propiedad el rol del usuario
        # para poder mostrarlo en la vista
        $this->view->rol = $this->model->getRolUsuario($id);

        # Añadimos un titulo a la vista
        $this->view->title = "Detalles del usuario";

        # Cargamos la vista  correspondiente
        $this->view->render('usuarios/mostrar/index');
       }
    }

    # Método editar
    # Nos permite cargar el formulario para editar los datos de un usuario
    function editar($param = []){
        # Iniciamos o continuamos la sesión
       session_start();

       # Comprobamos si el usuario está indentificado
       if(!isset($_SESSION['id'])){
           $_SESSION['mensaje'] = "Usuario no identificado";

           // Redireccionamos al login
           header('Location: '.URL.'login');
       } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['edit']))) {
           $_SESSION['mensaje'] = "Operación sin privilegios";
           header('location:' . URL . 'usuarios');
       } else {
        # Recogemos el id por parámetro y lo asignamos a una variable
        $id = $param[0];

        # Creamos la propiedad title de la vista
        $this->view->title = "Editar usuario - Administrador";

        # Añadimos a la vista el usuario a editar
        $this->view->usuario = $this->model->getUsuario($id);

        # Ahora añadiremos el rol del usuario
        $this->view->rol = $this->model->getRolUsuario($id);

        # Generamos la lista select con todos los roles
        $this->view->roles = $this->model->getRoles();

        # Añadimos a la vista el id
        $this->view->id = $id;

        # Por motivos de impelementación, deberemos añadir a la vista el modelo
        $this->view->model = $this->model;

        # Deberemos realizar la comprobación de que hemos vuelto del formulario
        if(isset($_SESSION['error'])){
            // Mensaje de error
            $this->view->error = $_SESSION['error'];

            // Autorrellenamos el formulario con los detalles del usuario
            $this->view->usuario = $this->model->getUsuario($id);

            // Recuperar array de errores específicos
            $this->view->errores = $_SESSION['errores'];

            unset($_SESSION['error']);
            unset($_SESSION['errores']);
            unset($_SESSION['usuario']);
        }

        # Cargamos la vista correspondiente
        $this->view->render('usuarios/editar/index');
       }
    }

    # Método update
    # Actualizamos los datos de un usuario en la base de datos.
    public function update($param = [])
{
    # Iniciamos o continuamos la sesión
    session_start();

    # Comprobamos si el usuario está indentificado
    if(!isset($_SESSION['id'])){
        $_SESSION['mensaje'] = "Usuario no identificado";

        // Redireccionamos al login
        header('Location: '.URL.'login');
    } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['edit']))) {
        $_SESSION['mensaje'] = "Operación sin privilegios";
        header('location:' . URL . 'usuarios');
    } else {

    # Obtenemos el id del usuario a editar
    $id = $param[0];

    # 1. Saneamos los datos del formulario
    $rol = filter_var($_POST['rol']??='',FILTER_SANITIZE_SPECIAL_CHARS);
    $name = filter_var($_POST['name']??='',FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email']??='',FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password']??='',FILTER_SANITIZE_SPECIAL_CHARS);
    $password_confirm = filter_var($_POST['password_confirm']??='',FILTER_SANITIZE_SPECIAL_CHARS);

    # 2. Creamos un objeto de la clase classUser con los datos saneados del formulario
    $usuario = new classUser(
        null,
        $name,
        $email,
        $password,
        $password_confirm,
        $rol
    );

    # 3. Vamos a guardar una copia del objeto original
    $original = $this->model->getUsuario($id);

    // Validar los datos
    $errores = [];

    // Validar nombre
    if (empty($name))
    {
        $errores['nombre'] = 'El campo nombre es obligatorio. Valor restablecido.';
    }

    // Validar email
    if (empty($email))
    {
        $errores['email'] = 'El campo email es obligatorio. Valor restablecido.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errores['email'] = 'El formato del email no es correcto';
    } elseif ($email !== $original->email && !$this->model->emailUnique($email))
    {
        $errores['email'] = 'El email ya está en uso';
    }

    // Validar contraseña
    if (!empty($password) || !empty($confirmPassword))
    {
        if (empty($password))
        {
            $errores['contraseña'] = 'El campo contraseña es obligatorio';
        } elseif ($password !== $confirmPassword)
        {
            $errores['confirmarContraseña'] = 'Las contraseñas no coinciden';
        }
    }

    // Comprobar si hay errores de validación
    if (!empty($errores))
    {
        // Errores de validación
        $_SESSION['error'] = 'Formulario no validado';
        $_SESSION['errores'] = $errores;
        header('Location:' . URL . 'usuarios/editar/' . $id);
        exit();
    }

    // Si la contraseña no está vacía, cifrarla
    if (!empty($password))
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    } else
    {
        // Mantener la contraseña original si no se proporciona una nueva contraseña
        $hashedPassword = $original->password;
    }

    

    // Obtener el ID del rol seleccionado del formulario
    $idRol = filter_input(INPUT_POST, 'rol', FILTER_SANITIZE_NUMBER_INT);

    // Crear un objeto de usuario con los datos actualizados
    $usuario = new classUser(
        $id,
        $name,
        $email,
        $hashedPassword,
        $hashedPassword,
        $idRol
    );

    // Actualizar el usuario y el rol en la base de datos
    $this->model->update($usuario, $id, $idRol);

    // Mensaje de éxito
    $_SESSION['mensaje'] = "Usuario editado correctamente";

    // Redirigir al listado de usuarios
    header('location:' . URL . 'usuarios');
    exit();
}
}
}