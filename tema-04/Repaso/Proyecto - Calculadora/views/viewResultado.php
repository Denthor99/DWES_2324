<!DOCTYPE html>
<html lang="es">
<!-- Incluimos el head -->
<?php include 'layouts/head.html';?>
<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera -->
        <?php include 'partials/header.html'; ?>
            
        <!-- Cuerpo del formulario -->
        <div class="mb-3">
            <legend><?=ucfirst($calculos->getOperacion())?></legend>

            <form>
                <div class="mb-3">
                    <label class="form-label">Valor 1</label>
                    <input type="number" class="form-control" value="<?=$calculos->getValor1()?>" disabled/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Valor 2</label>
                    <input type="number" class="form-control" value="<?=$calculos->getValor2()?>" disabled/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Resultado</label>
                    <input type="number" class="form-control" value="<?=$calculos->getResultado()?>" disabled/>
                </div>
                <a role="button" class="btn btn-primary" href="index.php">Volver</a>
            </form>
        </div>
        <!-- Pie de documento -->
        <?php include 'partials/footer.html'; ?>
    </div>

    <!-- Incluimos javascript-->
    <?php include 'layouts/javascript.html';?>
</body>
</html>