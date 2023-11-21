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
            <legend>Realizar operación</legend>

            <form action="calcular.php" method="POST">
                <div class="mb-3">
                    <label class="form-laberl">Valor 1</label>
                    <input type="number" class="form-control" name="valor1" placeholder="0" step="0.01"/>
                </div>
                <div class="mb-3">
                    <label class="form-laberl">Valor 2</label>
                    <input type="number" class="form-control" name="valor2" placeholder="0" step="0.01"/>
                </div>

                <div class="mb-3">
                    <button type="reset" class="btn btn-secondary">Borrar</button>
                    <button type="submit" class="btn btn-primary" name="operacion" value="sumar">Sumar</button>
                    <button type="submit" class="btn btn-primary" name="operacion" value="restar">Restar</button>
                    <button type="submit" class="btn btn-primary" name="operacion" value="multiplicar">Multiplicar</button>
                    <button type="submit" class="btn btn-primary" name="operacion" value="dividir">Dividir</button>
                    <button type="submit" class="btn btn-primary" name="operacion" value="potencia">Potencia</button>




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