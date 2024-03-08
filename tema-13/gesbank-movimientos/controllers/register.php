<?php
 // Añadimos PHPMailer
 require_once 'PHPMailer/src/Exception.php';
 require_once 'PHPMailer/src/PHPMailer.php';
 require_once 'PHPMailer/src/SMTP.php';
 require_once 'config/auth.php';
 
 
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

    class Register Extends Controller {

        public function render() {

            # iniciamos o continuar sessión
            session_start();

            # Si existe algún mensaje 
            if (isset($_SESSION['mensaje'])) {

                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);

            }

            # Inicializamos los campos del formulario
            $this->view->name = null;
            $this->view->email = null;
            $this->view->password = null;

            if (isset($_SESSION['error'])) {

                # Mensaje de error
                $this->view->error = $_SESSION['error'];
                unset($_SESSION['error']);

                # Variables de autorrelleno
                $this->view->name = $_SESSION['name'];
                $this->view->email = $_SESSION['email'];
                $this->view->password = $_SESSION['password'];
                unset($_SESSION['name']);
                unset($_SESSION['email']);
                unset($_SESSION['password']);

                # Tipo de error
                $this->view->errores = $_SESSION['errores'];
                unset($_SESSION['errores']);

            }
        
            $this->view->render('register/index');
        }
    

    public function validate() {

        # Iniciamos o continuamos con la sesión
        session_start();

        # Saneamos el formulario
        $name = filter_var($_POST['name'],FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'],FILTER_SANITIZE_SPECIAL_CHARS);
        $password_confirm = filter_var($_POST['password-confirm'],FILTER_SANITIZE_SPECIAL_CHARS);

        # Validaciones

        $errores = array();

        # Validar name
        if (empty($name)) {
            $errores['name'] = "Campo obligatiorio";
        } else if (!$this->model->validaName($name)) {
            $errores['name'] = "Nombre de usuario no permitido";
        }

        # Validar Email
        if (empty($email)){
            $errores['email'] = "Campo obligatorio";
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = "Email: Email no válido";
        } elseif (!$this->model->validateEmailUnique($email)) {
            $errores['email'] = "Email existente, ya está registrado";
        }

        # Validar password
        if(empty($password)){
            $errores['password'] = "No se ha introducido una contraseña";
        }else if (strcmp($password, $password_confirm) !== 0) {
            $errores['password'] = "Password no coincidentes";
        } elseif (!$this->model->validatePass($password)) {
            $errores['password'] = "Password: No permitido";
        }

        if (!empty($errores)) {

            $_SESSION['errores'] = $errores;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['error'] = "Fallo en la validación del formulario";
            
            header("location:". URL. "register");
   
        } else {
            
            # Añade nuevo usuario
            $this->model->create($name, $email, $password);
            $_SESSION['mensaje'] = "Usuario registrado correctamente";
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            // Enviaremos el mail con los datos del usuario recién registrado
            try {
                $mail = new PHPMailer(true);
                $mail->CharSet = "UTF-8";
                $mail->Encoding = "quoted-printable";

                // Credenciales SMPT gmail
                $mail->Username = USER_MAIL;
                $mail->Password = PASS_MAIL;

                // Configuración SMPT gmail
                $mail->SMTPDebug = 2;                                       //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host = 'smtp.gmail.com';                       //Set the SMTP server to send through
                $mail->SMTPAuth = true;                                   //Enable SMTP authentication                             //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // tls Enable implicit TLS encryption
                $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


                // Desactivamos  la verificación del certificado SSL porque Google bloquea las conexiones sin certificado
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                //Cabecera del email
                $remitente = USER_MAIL;
                $destinatario = $email;

                $mail->setFrom($remitente, 'Gesbank S.L.');
                $mail->addAddress($destinatario,$name);
                $mail->addReplyTo($remitente, 'Gesbank S.L.');

                //Content
                $mail->isHTML(true);
                $mail->Subject = 'Bienvenido a Gesbank - Tu Banca Digital';
                $mail->Body = '<h2>Te damos la bienvenida a Gesbank. Te facilitamos las credenciales de acceso: </h2><br>' .
                '<ul><li><b>Nombre</b>: ' . $name . '</li><br>' .
                '<li><b>Email</b>: ' . $email . '</li><br>' .
                '<li><b>Contraseña</b>: ' . $password . '</li><br>' .
                '</ul><h3>Gracias por confiar en nuestro banco.</h3>';

                // Enviamos el mensaje
                $mail->send();
            } catch (Exception $e) {
                // Manejar excepciones
               echo "Problema con el envio del correo: ". $mail->ErrorInfo;
            }
            
            #Vuelve login
            header("location:". URL. "login");
        }
        


    }

}

?>