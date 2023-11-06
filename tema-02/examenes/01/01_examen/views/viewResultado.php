<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Incluir head -->
    <title>Calculadora de conversión digital</title>
    <?php
        include 'layouts/head.html';
    ?>
</head>
<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-calculator"></i>
            <span class="fs-6">Calculadora Conversor Decimal</span>   
        </header>
        <legend>Resultados</legend>
        <form>
            <!-- Valor Decimal -->
            <table class="table">
            <tbody>
                <tr>
                    <th scope="row">Decimal:</th>
                    <td><?=$valorInicial?></td>
                </tr>
                <tr>
                    <th scope="row"><?=$operacion?>:</th>
                    <td><?=$resultado?></td>
                </tr>
            </tbody>
            </table>

            <a href="index.php" class="btn btn-primary" role="button">Volver</a>
        </form>

        
        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>
        
    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>
</html>