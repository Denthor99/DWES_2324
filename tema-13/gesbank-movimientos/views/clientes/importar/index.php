<!doctype html>
<html lang="en">
<head>
    <!-- head -->
    <?php require_once("template/partials/head.php") ?>
    <title><?= $this->title ?></title>
</head>

<body>
    <!-- Menú Principal -->
	<?php require_once("template/partials/menuAut.php") ?>
	<br><br><br>

    <div class="container">
        
        <!-- header -->
        <?php include 'views/clientes/partials/header.php' ?>

        <!-- comprobamos si existe error -->
        <?php include 'template/partials/error.php' ?>
        <?php include 'template/partials/notify.php' ?>

        <legend>Formulario Subida de nuevos clientes (csv)</legend>
        
        <form method="POST" action="<?=URL?>clientes/validarCSV" enctype="multipart/form-data">
            
            <!-- Fichero con validación cliente mediante parametro accept -->
            <div class="mb-3">
                <label for="formFile" class="form-labl">Seleccione archivo</label>
                <input type="file" class="form-control" name="fichero" id="formFile" accept=".csv">
            </div>
            <!-- Botones de acción -->
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
        </form>
    </div>
    <!-- Pié del documento -->
    <?php require_once("template/partials/footer.php") ?>


    <!-- javascript bootstrap 532 -->
    <?php require_once("template/partials/javascript.php") ?>
</body>

</html>