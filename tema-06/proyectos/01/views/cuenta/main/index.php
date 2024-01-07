<!doctype html>
<html lang="es">
<!-- Head -->
<head>
<?php require_once("template/partials/head.php") ?>
<title><?=$this->title?></title>
</head>


<body>
	<!-- Page Content -->
	<div class="container">
    <?php require_once("template/partials/menu.php")?>
    <br>
    <br>
    <br>

		<!-- Mensaje -->
		<?php require_once("template/partials/notify.php") ?>


		<!-- Estilo card de bootstrap -->
		<div class="card">
			<div class="card-header">
                <!-- Cabecera -->
		        <?php require_once("views/cuenta/partials/header.php") ?>
			</div>
			<div class="card-header">
				<!-- Menú -->
				<?php require_once("views/cuenta/partials/menu.php") ?>
			</div>
			<div class="card-body">
				
				<!-- Añadimos una tabla con los artículos -->
				<table class="table table-striped">
					<!-- Mostremos el nombre de las columnas, para nuestra comodidad y personalizción introduciremos lo datos manualmente -->
					<thead>
						<tr>
							<th scope="col">Id</th>
							<th scope="col">Número de cuenta</th>
							<th scope="col">Nombre</th>
							<th scope="col">Apellidos</th>
							<th scope="col">Fecha Alta</th>
							<th scope="col">Fecha ultimo movimiento</th>
							<th scope="col">Nº Movimientos</th>
							<th scope="col">Saldo</th>
							<th scope="col">Acciones</th>
						</tr>
					</thead>
					<!-- Mostraremos el contenido de cada artículo -->
					<tbody>
						<?php foreach ($this->cuentas as $cuenta): ?>
							<tr>
								<th>
									<?= $cuenta->id ?>
								</th>
								<td>
									<?= $cuenta->numCuenta ?>
								</td>
								<td>
									<?= $cuenta->nombre ?>
								</td>
								<td>
									<?= $cuenta->apellidos ?>
								</td>
								<td>
									<?= $cuenta->fechAlta ?>
								</td>
								<td>
									<?= $cuenta->fechUltiMov ?>
								</td>
								<td class="text-end">
									<?= $cuenta->numMovs ?>
								</td>
                                <td class="text-end">
									<?= number_format($cuenta->saldo,'2',',') ?> €
								</td>
								<td>
									<!-- Botón eliminar -->
									<a href="<?=URL?>cuenta/delete/<?= $cuenta->id ?>" title="Eliminar">
										<i class="bi bi-trash-fill"></i>
									</a>

									<!-- Botón editar -->
									<a href="<?=URL?>cuenta/edit/<?= $cuenta->id ?>" title="Editar">
										<i class="bi bi-pencil-square"></i>
									</a>
									<!-- Botón mostrar -->
									<a href="<?=URL?>cuenta/show/<?= $cuenta->id ?>" title="Mostrar">
										<i class="bi bi-tv"></i>
									</a>
									<!-- Botón sin funcionalidad -->
									<a href="#" title="Sin funcionalidad">
									<i class="bi bi-clipboard-data"></i>
									</a>
								</td>

							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="card-footer">
				<small class="text-muted">Número de Cuentas: <?= $this->cuentas->rowCount() ?></small>
			</div>
		</div>


	</div>
	<br><br><br>
	<!-- /.container -->

	<?php require_once("template/partials/footer.php") ?>
	<?php require_once("template/partials/javascript.php") ?>

</body>

</html>