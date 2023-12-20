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
		<!-- Cabecera -->
		<?php require_once("views/alumno/partials/header.html") ?>

		<!-- Mensaje -->
		<?php require_once("template/partials/notify.php") ?>


		<!-- Estilo card de bootstrap -->
		<div class="card">
			<div class="card-header">
				<?=$this->title?>
			</div>
			<div class="card-header">
				<!-- Menú -->
				<?php require_once("views/alumno/partials/menu.php") ?>
			</div>
			<div class="card-body">
				
				<!-- Añadimos una tabla con los artículos -->
				<table class="table">
					<!-- Mostremos el nombre de las columnas, para nuestra comodidad y personalizción introduciremos lo datos manualmente -->
					<thead>
						<tr>
							<th scope="col">Id</th>
							<th scope="col">Nombre</th>
							<th scope="col">Email</th>
							<th scope="col">Telefono</th>
							<th scope="col">Poblacion</th>
							<th scope="col">DNI</th>
							<th scope="col" class="text-end">Edad</th>
							<th scope="col">Curso</th>
							<th scope="col">Acciones</th>
						</tr>
					</thead>
					<!-- Mostraremos el contenido de cada artículo -->
					<tbody>
						<?php foreach ($this->alumnos as $alumno): ?>
							<tr>
								<th>
									<?= $alumno->id ?>
								</th>
								<td>
									<?= $alumno->nombre ?>
								</td>
								<td>
									<?= $alumno->email ?>
								</td>
								<td>
									<?= $alumno->telefono ?>
								</td>
								<td>
									<?= $alumno->poblacion ?>
								</td>
								<td>
									<?= $alumno->dni ?>
								</td>
								<td class="text-end">
									<?= $alumno->edad ?>
								</td>
								<td>
									<?= $alumno->curso ?>
								</td>
								<td>
									<!-- Botón eliminar -->
									<a href="<?=URL?>alumno/delete/<?= $alumno->id ?>" title="Eliminar">
										<i class="bi bi-trash-fill"></i>
									</a>

									<!-- Botón editar -->
									<a href="<?=URL?>alumno/edit/<?= $alumno->id ?>" title="Editar">
										<i class="bi bi-pencil-square"></i>
									</a>
									<!-- Botón mostrar -->
									<a href="<?=URL?>alumno/show/<?= $alumno->id ?>" title="Mostrar">
										<i class="bi bi-tv"></i>
									</a>
								</td>

							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="card-footer">
				<small class="text-muted">Número de  Alumnos: <?= $this->alumnos->rowCount() ?></small>
			</div>
		</div>


	</div>
	<br><br><br>
	<!-- /.container -->

	<?php require_once("template/partials/footer.php") ?>
	<?php require_once("template/partials/javascript.php") ?>

</body>

</html>