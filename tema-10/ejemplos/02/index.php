<?php


//Cabecera. Debe establecerse la cabecera Content-type
$header = "Mime-Versión: 1.0" . "\n";
$header .= "Content-Type: text/html; charset-utf-8" . "\n";
$header .= "From: Daniel Alfonso Rodriguez <darancuga@hotmail.com>\n";
$header .= "CC: emailejemploCC@gmail.com" . "\r\n";
$header .= "CCo: emailOculto@gmail.com" . "\r\n";
$header .= "X-Mailer: PHP/" . phpversion();

//Parámetros
//Destinatario
$destino = "darancuga@hotmail.com";
//Asunto
$asunto = "Mensaje prueba de email";
//Mensaje
$mensaje = "Aquí aprenderán cómo enviar mensajes con la función <b>mail()</b>
de PHP con código HTML incrustado!";

//Mensaje de email enviado
if (mail($destino, $asunto, $mensaje, $header)) {
    echo ('Email enviado.');
} else {
    echo ('Error de Envío.');
};