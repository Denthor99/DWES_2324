<!DOCTYPE html>
<html lang="es">

<head>
    <!-- bootstrap  -->
    <?php require_once("template/partials/head.php");  ?>
</head>

<body>
    <!-- bootstrap -->
    <?php require_once "template/partials/menuBar.php"; ?>
    <br><br><br>
    <!-- capa principal -->
    <div class="container">
        <!-- Header -->
        <?php include "views/contacto/partials/header.php"?>
        <!-- Mostramos aquí un mensaje en caso de que exista un error -->
        <?php include "template/partials/error.php"; ?>
        <!-- formulario -->
        <form action="<?= URL ?>contactar/validate" method="POST">
            <!-- Nombre -->
            <div class="mb-3">
                <label for="" class="form-label">Nombre *</label>
                <input type="text" class="form-control <?= (isset($this->errores['nombre']))? 'is-invalid': null ?>" name="nombre" value="<?= isset($this->contactar->nombre) ? $this->contactar->nombre : ''?>" required>
                <?php if (isset($this->errores['nombre'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['nombre'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label for="" class="form-label">Email *</label>
                <input type="email" class="form-control <?= (isset($this->errores['email']))? 'is-invalid': null ?>" name="email" value="<?= isset($this->contactar->email) ? $this->contactar->email : ''?>" required>
                <?php if (isset($this->errores['email'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['email'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- Asunto -->
            <div class="mb-3">
                <label for="" class="form-label">Asunto *</label>
                <input type="text" class="form-control <?= (isset($this->errores['asunto']))? 'is-invalid': null ?>" name="asunto" value="<?= isset($this->contactar->asunto) ? $this->contactar->asunto : ''?>" required>
                <?php if (isset($this->errores['asunto'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['asunto'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- Mensaje -->
            <div class="mb-3">
                <label for="" class="form-label">Mensaje *</label>
                <textarea class="form-control <?= (isset($this->errores['mensaje'])) ? 'is-invalid' : null ?>" name="mensaje" value="<?= isset($this->contactar->mensaje) ? $this->contactar->mensaje : '' ?>"> </textarea>
                <?php if (isset($this->errores['mensaje'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['mensaje'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- botones de acción -->
            <div class="mb-3">
                <a name="" id="" class="btn btn-secondary" href="<?= URL ?>index" role="button">Cancelar</a>
                <button type="reset" class="btn btn-danger">Borrar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
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