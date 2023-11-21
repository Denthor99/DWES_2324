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
            <legend><?=ucfirst($calculo->getOperacion())?></legend>

            <form>
               <div class="mb-3">
                    <label class="form-label">Valor 1</label>
                    <input class="form-control" value="<?=$calculo->getValor1()?>" disabled/>
               </div>
               <div class="mb-3">
                    <label class="form-label">Valor 2</label>
                    <input class="form-control" value="<?=$calculo->getValor2()?>" disabled/>
               </div>
               <div class="mb-3">
                    <label class="form-label">Resultado</label>
                    <input class="form-control" value="<?=$calculo->getResultado()?>" disabled/>
               </div>
               <div class="mb-3">
                    <a role="button" class="btn btn-primary" href="index.php">Volver</a>
               </div>
            </form>
        </div>
        <!-- Pie de documento -->
        <?php include 'partials/footer.html'; ?>
    </div>

    <!-- Incluimos javascript-->
    <?php include 'layouts/javascript.html';?>
</body>
</html>