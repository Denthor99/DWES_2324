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
        <form action="<?= URL ?>usuarios/update/<?=$this->id?>" method="POST">
            <!-- Roles de usuario -->
            <div class="mb-3">
                <label for="" class="form-label">Roles de usuario</label>
                <select class="form-select <?= (isset($this->errores['rol']))? 'is-invalid': null ?>" name="rol" required>
                    <option selected disabled>Seleccione un rol para el nuevo usuario</option>
                    <?php foreach ($this->roles as  $rol) : ?>
                        <div class="form-check">
                            <option value="<?= $rol->id ?>"
                            <?=($rol->id == $this->model->getRolUsuario($this->usuario->id)->id)? 'selected':null?>>
                                <?= $rol->name ?>
                            </option>
                        </div>
                    <?php endforeach; ?>
                </select>
                <?php if (isset($this->errores['rol'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['rol'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- Nombre de usuario -->
            <div class="mb-3">
                <label for="" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control <?= (isset($this->errores['name']))? 'is-invalid': null ?>" name="name" value="<?=$this->usuario->name?>">
                <?php if (isset($this->errores['name'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['name'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label for="" class="form-label">Correo electronico</label>
                <input type="email" class="form-control <?= (isset($this->errores['email']))? 'is-invalid': null ?>" name="email" value="<?=$this->usuario->email?>">
                <?php if (isset($this->errores['email'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['email'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- contraseña -->
            <div class="mb-3">
                <label for="" class="form-label">Contraseña</label>
                <input type="password" class="form-control <?= (isset($this->errores['password']))? 'is-invalid': null ?>" name="password">
                <?php if (isset($this->errores['password'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['password'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- Confirmar contraseña -->
            <div class="mb-3">
                <label for="" class="form-label">Vuelve a introducir la contraseña</label>
                <input type="password" class="form-control <?= (isset($this->errores['password_confirm']))? 'is-invalid': null ?>" name="password_confirm">
                <?php if (isset($this->errores['password_confirm'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['password_confirm'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- botones de acción -->
            <div class="mb-3">
                <a class="btn btn-secondary" href="<?= URL ?>usuarios" role="button">Cancelar</a>
                <button type="button" class="btn btn-danger">Borrar</button>
                <button type="submit" class="btn btn-primary">Crear</button>
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