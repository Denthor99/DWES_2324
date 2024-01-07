<!DOCTYPE html>
<html lang="es">

<head>
<?php require_once("template/partials/head.php") ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <br><br>
        <!-- Cabecera -->
        <?php require_once("views/cuenta/partials/header.php") ?>

        <!-- El menú no es necesario-->

        <!-- Formulario Nueva Cuenta -->
        <form>
            <!-- id (no se deberá ni mostrar, ni estar oculto-->
            
            <!-- Número de cuenta-->
            <div class="mb-3">
                <label class="form-label">Número de cuenta</label>
                <input type="text" class="form-control" name="num_cuenta" value="<?=$this->cuenta->numCuenta?>" disabled>
            </div>
            <!-- Cliente -->
            <div class="mb-3">
                <label class="form-label">Cliente de la cuenta</label>
                <input type="text" class="form-control" name="num_cuenta" value="<?=$this->cuenta->nombre ." " .$this->cuenta->apellidos?>" disabled>
                
            </div>
            <!-- Fecha Alta -->
            <div class="mb-3">
                <label class="form-label">Fecha de Alta</label>
                <input type="text" class="form-control" name="fecha_alta" value="<?=$this->cuenta->fechAlta?>" disabled>
            </div>
            <!-- Fecha último movimiento -->
            <div class="mb-3">
                <label class="form-label">Fecha del último movimiento</label>
                <input type="text" class="form-control" name="fecha_ul_mov" value="<?=$this->cuenta->fechUltiMov?>" disabled>
            </div>
            <!-- Número de movimientos -->
            <div class="mb-3">
                <label class="form-label">Número de movimientos</label>
                <input type="number" class="form-control" name="num_movtos" value="<?=$this->cuenta->numMovs?>" disabled>
            </div>
            <!-- Saldo -->
            <div class="mb-3">
                <label class="form-label">Saldo</label>
                <input type="number" class="form-control" name="saldo" value="<?=$this->cuenta->saldo?>" disabled>
            </div>

            <div class="mb-3">
                <a class="btn btn-secondary" href="<?=URL?>cuenta" role="button">Volver</a>
            </div>

        </form>
        <br>
        <br>
        <br>
        <!-- Pie de documento -->
        <?php require_once("template/partials/footer.php") ?>

    </div>


	<?php require_once("template/partials/javascript.php") ?>
</body>

</html>