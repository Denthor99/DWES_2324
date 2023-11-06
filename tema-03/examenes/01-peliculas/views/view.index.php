<!doctype html>
<html lang="es">
  <head>
    <!-- Incluimos layout.head.php -->
    <?php include 'views/layouts/layout.head.php'; ?>
    
    <title>Home - CRUD Tabla Películas</title>
  </head>
  
  <body>
    <div class="container">
      
      <!-- Cabecera -->
      <!-- Incluimos partial.cabecera.php -->
      <?php include 'partials/partial.cabecera.php';?>
  
      <legend>
        Tabla Películas
      </legend>

      <!-- Incluimos Partials menu -->
      <?php include 'partials/partial.menu.php'; ?>

      <!-- Generamos la tabla de libros -->
      <table class="table">
        <!-- Generamos el encabezado de la tabla películas -->
        <thead>
          <tr>
            <?php foreach(array_keys($peliculas[0]) as $elementoTabla) : ?>
              <th>
                <?=ucfirst($elementoTabla) ?>
              </th>
            <?php endforeach; ?>
              <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <!-- Mostramos los detalles de las películas -->
          <?php foreach ($peliculas as $pelicula): ?>
            <!-- Muestro los datos de la película -->
            <tr>
              <td>
                <?=$pelicula['id']?>
              </td>
              <td>
               <?=$pelicula['titulo']?>
              </td>
              <td>
              <?=$paises[$pelicula['pais']]?>
              </td>
              <td>
              <?=$pelicula['director']?>
              </td>
              <td>
              <?=implode(', ', mostrarGeneros($generos,$pelicula['generos']))?>
              </td>
              <td>
              <?=$pelicula['año']?>
              </td>
          
            
              <!-- Muestro los botones de acción -->
              <td>
                <a href="eliminar.php?id=<?=$pelicula['id']?>" Title="Eliminar"><i class="bi bi-trash-fill"></i></a>
                <a href="editar.php?id=<?=$pelicula['id']?>" Title="Modificar"><i class="bi bi-pencil-square"></i></a>
                <a href="mostrar.php?id=<?=$pelicula['id']?>" Title="Mostrar"><i class="bi bi-eye"></i></a>
              </td>
            <!-- Fin botones de acción -->
            
            </tr>
          <?php endforeach; ?>
          <tfoot>
            <tr>
              <td colspan="7"><strong>Número Registros: </strong><?= count($peliculas)?></td>
            </tr>
          </tfoot>
          
        </tbody>
      </table>
      
      <!-- Incluimos Partials footer -->
      <?php include 'partials/partial.footer.php'?>

      <!-- Incluimos partial.footer.php -->
      
    </div>

    <!-- Incluimos Partials javascript bootstrap -->
    <?php include 'layouts/layout.javascript.php'; ?>
    <!-- Incluimos layout.javascript.php -->

  </body>
</html>