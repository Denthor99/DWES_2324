<?php
    /*
        Modelo: modelIndex
        Descripcion: genera un array con datos de los artículos
    */
    setlocale(LC_MONETARY,"es_ES"); // Indicamos 

    // Cargamos los arrays a partir de los métodos estáticos
    $categorias = ArrayArticulos::getCategorias();
    $marcas = arrayArticulos::getMarcas();

    // Creamos un objeto de la clase ArrayArticulos
    $articulos = new ArrayArticulos(); // Inicializado como array vacio
    $articulos->getDatos(); // Cargamos los datos
?>