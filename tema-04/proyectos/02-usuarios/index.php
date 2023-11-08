<?php
    // Controlador index.php
    // Muestra los detalles de los artículos
    
    // Cargamos las clases. A tener en cuenta el orden, ya que es importante
    include 'class/class.articulo.php';
    include 'class/class.arrayArticulos.php';

    // Cargamos el modelo
    include 'models/modelIndex.php';

    // Cargamos la vista principal
    include 'views/viewIndex.php';
?>