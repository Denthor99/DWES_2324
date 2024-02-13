<!DOCTYPE html>
<!-- saved from url=(0049)https://getbootstrap.com/docs/4.0/examples/album/ -->
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <?php require_once("template/partials/head.php") ?>
    <title>
      <?= $this->title ?>
    </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="./mostrar.php_files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./mostrar.php_files/album.css" rel="stylesheet">
  </head>

<body>

  <!-- Menú Principal -->
  <?php require_once("template/partials/menuAut.php") ?>
  <br><br><br>

  <!-- Page Content -->
  <div class="container">
    <!-- cabecera  -->
    <?php require_once("views/album/partials/header.php") ?>

    <!-- mensajes -->
    <?php require_once("template/partials/notify.php") ?>

    <!-- errores -->
    <?php require_once("template/partials/error.php") ?>


    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Album "<?= $this->album->titulo ?>"</h1>
        </div>
      </section>
       <!-- Detalles album -->
       <section class="py-5">
        <div class="container">
            <div class="col-md-6">
              <!-- Boton despliegue detalles album -->
              <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#despliegue" style="text-align: center;">
                Mostrar los detalles
              </button>
              <!-- Contenido desplegado -->
              <div class="collapse" id="despliegue">
                <div class="card card-body">
                <p><strong>Titulo:</strong> <?= $this->album->titulo ?></p>
                <p><strong>Autor:</strong> <?= $this->album->autor ?></p>
                <p><strong>Descripcion:</strong> <?= $this->album->descripcion ?></p>
                <p><strong>Fecha:</strong> <?= $this->album->fecha ?></p>
                <p><strong>Lugar:</strong> <?= $this->album->lugar ?></p>
                <p><strong>Categoria:</strong> <?= $this->album->categoria ?></p>
                <p><strong>Etiquetas:</strong> <?= $this->album->etiquetas ?></p>
                <p><strong>Nº fotos en la carpeta:</strong> <?= $this->album->num_fotos ?></p>
                <p><strong>Nº de visitas del album:</strong> <?= $this->album->num_visitas ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  <!-- Galeria de imagenes -->
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <?php foreach ($this->imagenesAlbum as $imagen): ?>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" src="<?= URL . 'imagenes/' . $this->nombreAlbum . '/' . $imagen ?>"
                    alt="Imagen del álbum" >
                  <div class="card-body">
                    <p class="card-text"><?=basename($imagen)?></p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Editar</button>
                      </div>
                      <small class="text-muted">Hace un momento</small>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>


    </main>

    <?php require_once("template/partials/footer.php") ?>
    <?php require_once("template/partials/javascript.php") ?>
    <svg xmlns="http://www.w3.org/2000/svg" width="348" height="225" viewBox="0 0 348 225" preserveAspectRatio="none"
      style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;">
      <defs>
        <style type="text/css"></style>
      </defs><text x="0" y="17"
        style="font-weight:bold;font-size:17pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text>
    </svg>
</body>

</html>