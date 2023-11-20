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
                    <label class="form-label">Valor 1</label>
                    <input type="number" class="form-control" placeholder="0" name="valor1" step="0.01"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Valor 2</label>
                    <input type="number" class="form-control" placeholder="0" name="valor2" step="0.01"/>
                </div>
                <div class="mb-3" hidden>
                    <label class="form-label">Resultado</label>
                    <input type="number" class="form-control" name="resultado"/>
                </div>
                <button type="reset" class="btn btn-primary">Borrar</button>
                <button type="submit" class="btn btn-secondary" name="operacion" value="sumar">Sumar</button>
                <button type="submit" class="btn btn-secondary" name="operacion" value="restar">Restar</button>
                <button type="submit" class="btn btn-secondary" name="operacion" value="multiplicar">Multiplicar</button>
                <button type="submit" class="btn btn-secondary" name="operacion" value="dividir">Dividir</button>
                <button type="submit" class="btn btn-secondary" name="operacion" value="potencia">Potencia</button>




            </form>
        </div>
        <!-- Pie de documento -->
        <?php include 'partials/footer.html'; ?>
    </div>

    <!-- Incluimos javascript-->
    <?php include 'layouts/javascript.html';?>
</body>
</html>