<?php
/**
 * Ejemplo 04
 * Envio de correo con PHPMailer (OutLook)
 */

// Cargamos la clase PHPMailer, para procesar email con PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Objeto clase PHPMailer
$email = new PHPMailer(true);

// En caso de error se lanza Exception
try {

    // Configurar juego de caracteres
    $email->CharSet = "UTF-8";
    $email->Encoding = "quoted-printable";

    // STMP Outlook
    $email->isSMTP();
    $email->Host = "smtp.office365.com";
    $email->Port = "587";

    //TLS
    $email->SMTPSecure = 'tls';
    $email->SMTPAuth = true;
    $email->Username = "darancuga@hotmail.com";
    $email->Password = "";

    // Creación del mensaje
    $email->setFrom("darancuga@hotmail.com", 'Daniel Alfonso Rodríguez Santos');
    $email->addAddress("drodsan2708@g.educaand.es", 'Annita Maxwinn');
    $email->Subject = "PHPMailer";
    $email->Body = "
    <!DOCTYPE html>
    <html lang=\"es\">
        <head>
            <meta charset=\"UTF-8\">
            <title>¡Hola, mundo!</title>
        </head>
        <body>
            <h1>¡Hola, mundo!</h1>
            <p>¿Sabías que los programadores tienen una frase especial para cada día? Hoy, nuestra frase es:</p>
            <blockquote><em>\"Los programadores no aman la limpieza, pero odian la suciedad.\"</em></blockquote>
            <p>¡Esperamos que hayas tenido un buen día y estés listo para un nuevo día lleno de código y risas!</p>
            <p>Saludos desde el equipo de desarrollo.</p>
        </body>
    </html>";
    $email->AltBody = "Este es un mensaje HTML. Si ves este mensaje, significa que tu cliente de correo no soporta HTML.";

    // Comprobación de errores
    if (!$email->send()) {
        echo "Error PHPMailer";
        echo "<pre>";
        print_r($email);
        exit();
    } else {
        echo "success";
        exit();
    }

} catch (Exception $th) {
    echo 'Error: PHPMailer ha sufrido un error critico';
}