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
        <form action="<?=URL?>cuenta/update/<?=$this->id?>" method="POST">
            <!-- id (no se deberá ni mostrar, ni estar oculto-->
            
            <!-- Número de cuenta-->
            <div class="mb-3">
                <label class="form-label">Número de cuenta</label>
                <input type="text" class="form-control" name="num_cuenta" size="20" minlength="20" maxlength="20" value="<?=$this->cuenta->numCuenta?>" required>
            </div>
            <!-- Cliente -->
            <div class="mb-3">
                <label class="form-label">Cliente de la cuenta</label>
                <select name="id_cliente" class="form-select" required>
                    <option disabled selected>Selecciona a un cliente</option>
                    <?php foreach ($this->clientes as $cliente):?>
                        <option value="<?=$cliente->id?>"
                        <?=($this->cuenta->idCliente == $cliente->id)?'selected':null?>
                        >
                        <?=$cliente->nombre?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <!-- Fecha Alta -->
            <div class="mb-3">
                <label class="form-label">Fecha de Alta</label>
                <input type="text" class="form-control" name="fecha_alta" value="<?=$this->cuenta->fechAlta?>" required>
            </div>
            <!-- Fecha último movimiento -->
            <div class="mb-3">
                <label class="form-label">Fecha del último movimiento</label>
                <input type="text" class="form-control" name="fecha_ul_mov" value="<?=$this->cuenta->fechUltiMov?>" required>
            </div>
            <!-- Número de movimientos -->
            <div class="mb-3">
                <label class="form-label">Número de movimientos</label>
                <input type="number" class="form-control" name="num_movtos" value="<?=$this->cuenta->numMovs?>" step="0.01" required>
            </div>
            <!-- Saldo -->
            <div class="mb-3">
                <label class="form-label">Saldo</label>
                <input type="number" class="form-control" name="saldo" value="<?=$this->cuenta->saldo?>" step="0.01" required>
            </div>

            <div class="mb-3">
                <a class="btn btn-secondary" href="<?=URL?>cuenta" role="button">Cancelar</a>
                <button type="reset" class="btn btn-danger">Borrar</button>
                <button type="submit" class="btn btn-primary">Añadir</button>
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