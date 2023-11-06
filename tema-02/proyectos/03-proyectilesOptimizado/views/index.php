<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Usaremos una plantilla, que será usada para todos los proyectos -->
    <?php include 'plantilla/head.html'?>
    <title>Proyecto 2.2 - Calculo de Proyectiles</title>

</head>
<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-rocket-takeoff-fill"></i>
            <span class="fs-4">Proyecto 2.2 - Calculo de Proyectiles</span>
        </header>
        <legend>Lanzamiento de proyectiles</legend>

        <!-- Por defecto, el metodo es GET -->
        <form method="POST">
            <!-- Valor 1 -->
            <div class="mb-3">
                <label class="form-label">Velocidad Inicial:</label>
                <input type="number" name="velocidad" class="form-control" placeholder="" aria-describedby="helpId" step="0.01" value="0.00">
                <small id="helpId" class="text-muted">Velocidad en m/s</small>
            </div>

             <!-- Valor 2 -->
             <div class="mb-3">
                <label class="form-label">Angulo de Lanzamiento</label>
                <input type="number" name="angulo" class="form-control" placeholder="" aria-describedby="helpId" step="0.01" value="0.00">
                <small id="helpId" class="text-muted">Ángulo en grados</small>
            </div>
            
            <!-- Botones de acción -->
            <div class="btn-group" role="group">
                <!-- Con el contenido de class, estamos indicando el color -->
                <!-- Añandimos el parametro form action-->
                <button type="reset" class="btn btn-secondary">Borrar</button>
                <button type="submit" class="btn btn-primary" formaction="calcular.php">Calcular</button>             
            </div>
        </form>

        <!-- Pie de documento -->
        <?php
            include 'plantilla/footer.html';
        ?>
    </div>


    <!-- js bootstrap 532-->
    <?php
        include 'plantilla/javascript.html';
    ?>
</body>
</html>