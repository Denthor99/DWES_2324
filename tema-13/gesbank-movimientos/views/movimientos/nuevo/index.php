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
        <?php include "views/movimientos/partials/header.php" ?>
        <!-- Mostramos aquí un mensaje en caso de que exista un error -->
        <?php include "template/partials/error.php"; ?>
        <!-- formulario -->
        <form action="<?= URL ?>movimientos/create" method="POST">
            <!-- id_cuenta -->
            <div class="mb-3">
                <label for="" class="form-label">Numero de Cuenta</label>
                <select class="form-select <?= (isset($this->errores['id_cuenta']))? 'is-invalid': null ?>" name="id_cuenta" required>
                    <option selected disabled>Seleccione un numero de cuenta </option>
                    <?php foreach ($this->cuentas as  $cuenta) : ?>
                        <div class="form-check">
                            <option value="<?= $cuenta->id ?>"
                            <?=($cuenta->id == $this->movimiento->id_cuenta)? 'selected':null?>>
                                <?= $cuenta->num_cuenta ?>
                            </option>
                        </div>
                    <?php endforeach; ?>
                </select>
                <?php if (isset($this->errores['id_cuenta'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['id_cuenta'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- fecha_hora -->
            <div class="mb-3">
                <label for="" class="form-label">Fecha/hora del movimiento</label>
                <input type="datetime-local" class="form-control <?= (isset($this->errores['fecha_hora']))? 'is-invalid': null ?>" name="fecha_hora" value="<?=$this->movimiento->fecha_hora?>">
                <?php if (isset($this->errores['fecha_hora'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['fecha_hora'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- concepto -->
            <div class="mb-3">
                <label for="" class="form-label">Concepto</label>
                <input type="text" class="form-control <?= (isset($this->errores['concepto']))? 'is-invalid': null ?>" name="concepto" maxlength="50" value="<?=$this->movimiento->concepto?>" required>
                <?php if (isset($this->errores['concepto'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['concepto'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- tipo -->
            <div class="mb-3">
                <label for="" class="form-label">Tipo de movimiento</label>
                <select class="form-select <?= (isset($this->errores['tipo']))? 'is-invalid': null ?>" name="tipo" required>
                    <option selected disabled>Seleccione el tipo de movimiento</option>
                    <option value="R" <?=($this->movimiento->tipo == 'R')?'selected':null?>>Reintegro</option>
                    <option value="I" <?=($this->movimiento->tipo == 'I')?'selected':null?>>Ingreso</option>
                </select>
                <?php if (isset($this->errores['tipo'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['tipo'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- cantidad -->
            <div class="mb-3">
                <label for="" class="form-label">Cantidad</label>
                <input type="number" class="form-control" name="cantidad" <?= (isset($this->errores['cantidad'])) ? 'is-invalid' : null ?> value="<?=$this->movimiento->cantidad?>" step="0.01">
                <?php if (isset($this->errores['cantidad'])): ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['cantidad'] ?>
                    </span>
                <?php endif; ?>
            </div>
            <!-- botones de acción -->
            <div class="mb-3">
                <a class="btn btn-secondary" href="<?= URL ?>movimientos" role="button">Cancelar</a>
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