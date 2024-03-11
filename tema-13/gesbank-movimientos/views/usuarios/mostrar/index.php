<!DOCTYPE html>
<html lang="es">

<head>
    <!-- bootstrap  -->
    <?php require_once("template/partials/head.php");  ?>
    <title><?=$this->title?></title>
</head>

<body>
    <!-- bootstrap -->
    <?php require_once "template/partials/menuAut.php"; ?>
    <!-- capa principal -->
    <div class="container">
        <br><br><br>
        <!-- Menú fijo principal -->
        <?php include "views/usuarios/partials/header.php" ?>
        <!-- Mostramos aquí un mensaje en caso de que exista un error -->
        <?php include "template/partials/error.php"; ?>
        <!-- formulario -->
        <form>
            <!-- Nombre de usuario -->
            <div class="mb-3">
                <label for="" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" value="<?=$this->usuario->name?>" disabled>
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label for="" class="form-label">Correo electronico</label>
                <input type="email" class="form-control" name="email" value="<?=$this->usuario->email?>" disabled>
            </div>
            <!-- Rol del usuario -->
            <div class="mb-3">
                <label for="" class="form-label">Rol del usuario</label>
                <input type="text" class="form-control" value="<?=$this->rol->name?>" disabled>
            </div>
            <!-- botones de acción -->
            <div class="mb-3">
                <a class="btn btn-secondary" href="<?= URL ?>usuarios" role="button">Volver</a>
            </div>
        </form>
    </div>

    <br><br><br>

    <!-- footer -->
    <?php require_once "template/partials/footer.php" ?>


    <!-- Bootstrap JS y popper -->
    <?php require_once "template/partials/javascript.php" ?>
</body>

</html>