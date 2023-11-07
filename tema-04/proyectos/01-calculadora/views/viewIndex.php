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
        <legend>Calculadora Orientada a Objetos</legend>

        <!-- Pie de documento -->
        <?php include 'partials/footer.html' ?>

        <!-- Añadimos un formulario para la calculadora -->
        <!-- Formulario Calculadora OOB -->

        <form action="calcular.php" method="POST">
            <!-- Valor 1 -->
            <div class="mb-3">
                <label class="form-label">Valor 1</label>
                <input type="number" class="form-control" name="valor1" step="0.01" placeholder="0">
            </div>

            <!-- Valor 2 -->
            <div class="mb-3">
                <label class="form-label">Valor 2</label>
                <input type="number" class="form-control" name="valor2" step="0.01" placeholder="0">
            </div>

            <!-- resultado -->
            <div class="mb-3" hidden>
                <label class="form-label">Resultado</label>
                <input type="number" class="form-control" name="resultado" disabled>
            </div>
           

            <!-- Botones de Acción -->
            <button type="reset" class="btn btn-danger">Borrar</button>
            <button type="submit" class="btn btn-primary" name="operacion" value="sumar">Suma</button>
            <button type="submit" class="btn btn-primary" name="operacion" value="restar">Resta</button>
            <button type="submit" class="btn btn-primary" name="operacion" value="dividir">Division</button>
            <button type="submit" class="btn btn-primary" name="operacion" value="multiplicar">Multiplica</button>
            <button type="submit" class="btn btn-primary" name="operacion" value="potencia">Potencia</button>

        </form>

    </div>


    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.html' ?>
</body>

</html>