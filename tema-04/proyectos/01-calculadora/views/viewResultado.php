<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/head.html' ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera -->
        <?php include 'partials/header.html' ?>
        <legend><?=ucfirst($calculo->getOperacion())?></legend>

        <!-- Pie de documento -->
        <?php include 'partials/footer.html' ?>

        <!-- Añadimos un formulario para la calculadora -->
        <!-- Formulario Calculadora OOB -->

        <form>
            <!-- Valor 1 -->
            <div class="mb-3">
                <label class="form-label">Valor 1</label>
                <input type="number" class="form-control" value="<?=$calculo->getValor1()?>" disabled>
            </div>

            <!-- Valor 2 -->
            <div class="mb-3">
                <label class="form-label">Valor 2</label>
                <input type="number" class="form-control" value="<?=$calculo->getValor2()?>" disabled>
            </div>

            <!-- resultado -->
            <div class="mb-3">
                <label class="form-label">Resultado</label>
                <input type="text" class="form-control" value="<?=number_format($calculo->getResultado(),2,',','.')?>" disabled>
            </div>
           

            <!-- Botones de Acción -->
            <a role="button" class="btn btn-secondary" href="index.php">Volver</a>

        </form>

    </div>


    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.html' ?>
</body>

</html>