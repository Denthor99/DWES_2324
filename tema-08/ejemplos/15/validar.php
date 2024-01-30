<?php
    /**
     * Ejemplo de validación de archivos subidos desde un formulaario
     */
    # Iniciamos sesión
    session_start();

    # Saneamiento del formulario
    $nombre = filter_var($_POST['nombre'] ??=null, FILTER_SANITIZE_SPECIAL_CHARS);
    $observaciones = filter_var($_POST['observaciones'] ??=null, FILTER_SANITIZE_SPECIAL_CHARS);

    # Cargamos el fichero
    $fichero = $_FILES['fichero'];

    # Geneero un array de errores de fichero
    $fileUploadErrors = array(
        0 => 'There is no error, the file uploaded with success',
        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        3 => 'The uploaded file was only partially uploaded',
        4 => 'No file was uploaded',
        6 => 'Missing a temporary folder',
        7 => 'Failed to write file to disk.',
        8 => 'A PHP extension stopped the file upload.',
    );

    # Validación
    $errores = [];
    if(($fichero['error']) !== UPLOAD_ERR_OK){

    } else if(is_uploaded_file($fichero['tmp_name'])) {
        # Validar maximo tamaño
        $max_tamanho = 2*1024*1024;
        if($fichero['size'] > $max_tamanho){
            $errores['fichero'] = "Tamaño de archivo no permitido. Máximo 2MB";
        }

        # Validar el tipo de archivo. El valor type no es de fiar, lo haremos de otra forma
        $info = new SplFileInfo($fichero['name']);

        // Array con los tipos de ficheros permitidos
        $tiposPerrmitidos = ['JPG', 'GIF', 'PNG','CBR'];
        if(!in_array(strtoupper($info->getExtension()),$tiposPerrmitidos)){
            $errores['fichero'] = "Tipo de archivo no permitido. Máximo 2MB";
        }

        # Comprobación de existencia de errores
        if(!empty($errores)){
            # Formulario no validado
            header('location: index.php');
        } else {
            # Mover fichero desde la carpeta temporal a carpeta del servidor
            move_uploaded_file($fichero['tmp_name'],'files/'.$fichero['name']);

            # Generamos un mensaje
            $_SESSION['mensaje'] = "Archivo subido correctamente";

            # Regresamos al formulario principal
            header('location: index.php');

        }

    }
?>