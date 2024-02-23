<?php
/**
 * Controlador Contactar
 * Este controlador tendrá la función de cargar el formulario de contacto
 */

 // Añadimos PHPMailer
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'config/auth.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Contactar extends Controller{

    /**
     * Método render
     * Método encargado de cargar el formulario de contacto
     */
    public function render(){
        # Iniciaremos (o continuamos) la sesión
        session_start();

        # Realizaremos el control de errores
        if (!empty($_SESSION['error'])){
            # Añadimos el corresondiente mensaje de error a la vista
            $this->view->error = $_SESSION['error'];

            # Añadimos a la vista el array con los errores especificos
            $this->view->errores = $_SESSION['errores'];

            # Una vez usadas las variables de sesión, las eliminamos
            unset($_SESSION['error']);
            unset($_SESSION['errores']);
        }

        # Realizaremos la comprobación de mensaje
        if(isset($_SESSION['mensaje'])) {
            # Añadimos a la vista el mensaje
            $this->view->mensaje = $_SESSION['mensaje'];

            # Una vez usada la variable de sesión, la eliminamos
            unset($_SESSION['mensaje']);
        }

        # Añadimos a la vista un titulo descriptivo
        $this->view->title = "Contacta con Gesbank";

        # Cargamos la vista principal de contacto
        $this->view->render('contacto/index');

    }

    /**
     * Método validate()
     * Válida los datos enviados a través del formulario.
     * Se enviará a nuestro correo
     */
    public function validate(){
         # Iniciaremos (o continuamos) la sesión
         session_start();

         # Saneamos los datos del formulario
        $nombre = filter_var($_POST['nombre'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
        $asunto = filter_var($_POST['asunto'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $mensaje = filter_var($_POST['mensaje'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

        # Validación de errores
        $errores = [];

        # Nombre de usuario (obligatorio)
        if(empty($nombre)){
            $errores['nombre']  = 'El campo Nombre es obligatorio';
        }

        # Email (obligatorio y con formato valido)
        if( empty($email) ){
            $errores['email']   = 'El campo Email es obligatorio';
        } else if (!filter_var( $email, FILTER_VALIDATE_EMAIL)) {
            $errores['email']   = 'Formato Email no válido';
        }

        # Asunto  (obligatorio)
        if(empty($asunto)){
            $errores['asunto']  = 'El campo Asunto es obligatorio';
        }

        # Mensaje (obligatorio y al menos 10 caracteres)
        if(empty($mensaje)){
            $errores['mensaje']  = 'El campo Mensaje es obligatorio';
        } elseif(strlen($mensaje) < 10){
            $errores['mensaje']  = 'Debe especificar claramente su consulta';

        }

        # Comprobación de errores
        if(!empty($errores)){
            # Si encontramos  errores, asignamos los errores a la sesión
            $_SESSION['errores'] = $errores;

            # Añadimos el mensaje de error en el formulario
            $_SESSION['error'] = 'Formulario no validado';

            # Realizamos la redirección al formulario de contacto
            header('Location:'.URL.'contactar');

        } else{
            // Si no hay errores, enviamos los datos haciendo mano de la clase PHPMailer
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
                $remitente = $email;
                $destinatario = USER_MAIL;

                $mail->setFrom($remitente, $nombre);
                $mail->addAddress($destinatario,'Daniel A. Rodríguez Santos');
                $mail->addReplyTo($remitente, $nombre);

                //Content
                $mail->isHTML(true);
                $mail->Subject = $asunto;
                $mail->Body = $mensaje;

                // Enviamos el mensaje
                $mail->send();

                // Redirigir a la página de éxito
                $_SESSION['mensaje'] = 'Mensaje enviado correctamente.';
                header('Location:' . URL . 'index');
                exit();
            } catch (Exception $e) {
                // Manejar excepciones
                $_SESSION['error'] = 'Error al enviar el mensaje: ' . $e->getMessage();
                header('Location:' . URL . 'contactar');
                exit();
            }
        }
    }
}