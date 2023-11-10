<?php
    /*
        Modelo: modelEliminar.php
        Descripción: eliminar un elemento de la tabla

        Método GET:
            - id del artículo que quiero eliminar
    */

    // cargamos las tablas
    $categorias = ArrayArticulos::getCategorias();
    $marcas = ArrayArticulos::getMarcas();
    $articulos = new ArrayArticulos();
    $articulos->getDatos();

    // Extraemos el id a través del método get
    $id = $_GET['indice'];


    // invocamos a la función eliminar
    $articulos->delete($id);

    // Notificacion
    $notificacion="Artículo eliminado con éxito";
?>