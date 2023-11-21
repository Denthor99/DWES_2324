<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once("layouts/layout.head.php");?>
    <title>Jugadores - Mostrar Jugador </title> 
</head>
<body>
    <!-- Capa Principal -->
    <div class="container">

        <?php include("partials/partial.header.php"); ?>

        <legend>Mostrar Jugador</legend>

      <form>
        <!-- id -->
        <div class="mb-3">
            <label for="titulo" class="form-label">Id</label>
            <input type="text" class="form-control" value="<?= $jugador->getId()?>" disabled>
            <!-- <div class="form-text">Introduzca identificador del libro</div> -->
        </div>
        <!-- Nombre -->
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" value="<?= $jugador->getNombre()?>" disabled >
        </div>
        <!-- Numero -->
        <div class="mb-3">
            <label class="form-label">Número</label>
            <input type="number" class="form-control" value="<?= $jugador->getNumero()?>" disabled>
            <!-- <div class="form-text">Introduzca Autor del libro</div> -->
        </div>
        <!-- Pais -->
        <div class="mb-3">
            <label class="form-label">Pais</label>
            <input type="text" class="form-control" value="<?= $paises[$jugador->getPais()]?>" disabled>
        </div>
        <!-- Equipo -->
        <div class="mb-3">
            <label class="form-label">Equipo</label>
            <input type="text" class="form-control" value="<?= $equipos[$jugador->getEquipo()]?>" disabled >
            <!-- <div class="form-text">Introduzca Precio</div> -->
        </div>
        <!-- Posiciones -->
        <div class="mb-3">
            <label class="form-label">Posiciones</label>
            <input type="text" class="form-control" value="<?= implode(', ',tablaJugadores::listaPosiciones($jugador->getPosiciones(),$posiciones))?>" disabled >
            <!-- <div class="form-text">Introduzca Precio</div> -->
        </div>
        <!-- Contraro -->
        <div class="mb-3">
            <label class="form-label">Contrato (€)</label>
            <input type="text" class="form-control" value="<?= number_format($jugador->getContrato(), 2, ',', '.')?> €" disabled >
            <!-- <div class="form-text">Introduzca Precio</div> -->
        </div>
        
        
        <a class="btn btn-secondary" href="index.php" role="button">Volver</a>
        
      </form>

      <br>
      <br>
      <br>
    </div>
    <!-- Pie del documento -->
    <?php include("partials/partial.footer.php");?>

    <!-- Bootstrap Javascript y popper -->
    <?php include("layouts/layout.javascript.php");?>
 
</body>
</html>