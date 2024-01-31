<?php
    # Iniciamos o continuamos sesión
    session_start();

    # Iniciamos los campos del formulario
    $nombre = null;
    $observaciones = null;
    $fichero = null;

    # Compruebo si existe algún error
    if(isset($_SESSION['error'])){
        $error = $_SESSION['error'];
        $errores = $_SESSION['errores'];

        // Autocompletamos el formulario
        $nombre = $_SESSION['nombre'];
        $observaciones = $_SESSION['observaciones'];
        $fichero = $_SESSION['fichero'];

        // Eliminamos las variables de sesión
        unset($_SESSION['error']);
        unset($_SESSION['errores']);
        unset($_SESSION['nombre']);
        unset($_SESSION['observaciones']);
        unset($_SESSION['fichero']);

    }

    # Compruebo si existe algún mensaje
    if(isset($_SESSION['mensaje'])){
        $mensaje = $_SESSION['mensaje'];
        unset($_SESSION['mensaje']);
    }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Drive 2: Ahora es personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <br>
        <h1>Formulario Subida de Archivos</h1>
        <br>
        <!-- Mensaje -->
        <?php if (isset($mensaje)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Mensaje</strong>
                <?= $mensaje; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Error -->
        <?php if (isset($error)):?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>ERROR </strong> <?= $error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>   
        </div>
        <?php endif;?>
        <form method="POST" enctype="multipart/form-data">
            <!-- Campo oculto validar tamaño (2 MB)-->
            <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
            
            <!-- Nombre -->
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?=$nombre?>">
                <!-- errores -->
                <span class="form-text text-danger" role="alert">
                    <?=$errores['nombre'] ??= null ?>
                </span>
            </div>
            <!-- Observaciones -->
            <div class="mb-3">
                <label for="" class="form-label">Observaciones</label>
                <textarea name="observaciones" id="" cols="30" rows="4" class="form-control"
                    placeholder="Introduce las observaciones sobre el archivo" <?=$observaciones?>></textarea>
                <!-- errores -->
                <span class="form-text text-danger" role="alert">
                    <?=$errores['observaciones'] ??= null ?>
                </span>
            </div>
            <!-- Fichero con validación cliente mediante parametro accept -->
            <div class="mb-3">
                <label for="formFile" class="form-labl">Seleccione archivo</label>
                <input type="file" class="form-control" name="fichero" id="formFile" value="<?=$fichero?>" accept="image/*">
                <!-- errores -->
                <span class="form-text text-danger" role="alert">
                    <?=$errores['fichero'] ??= null ?>
                </span>
            </div>
            <!-- Botones de acción -->
            <div class="mb-3">
                <button class="btn btn-primary" type="submit" formaction="validar.php">Enviar</button>
            </div>
        </form>
    </div>
    <footer class="footer mt-auto py-3 fixed-bottom bg-light">
        <div class="container">
            <span class="text-muted">© 2024
                Daniel Alfonso Rodríguez Santos - DWES - 2º DAW - Curso 23/24</span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>