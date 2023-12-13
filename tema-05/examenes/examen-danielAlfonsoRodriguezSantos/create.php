<?php

   /*
        create.php

        Controlador que permite añadir un nuevo libro a la tabla libros de geslibros

   */
  // Cargamos las constantes necesarias
  include 'config/config.php';

  // Cargamos las clases necesarias
  include 'class/class.conexion.php';
  include 'class/class.libro.php';
  include 'class/class.libros.php';

  // Cargamos el modelo correspondiente
  include 'models/model.create.php';

  // Rediccionaremos a la vista principal
  header('Location: index.php');
?>