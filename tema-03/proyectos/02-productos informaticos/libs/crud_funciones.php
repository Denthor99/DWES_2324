<?php

// Buscar en tabla
function buscar($tabla = [],$columna,$valor){
    $columnaValores = array_column($tabla, $columna);
    return array_search($valor, $columnaValores,false);
}


// Generar tabla de categorías
function generar_tabla_categorías()
{
    $categorias = [
        'Portátiles',
        'PCs Sobremesa',
        'Componentes',
        'Pantallas',
        'Impresoras',
        'Tablets',
        'Móviles',
        'Fotografía',
        'Imagen',
        'Accesorios'

    ];
    // Ordenamos el array, manteniendo la asociación de indices
    asort($categorias);
    return $categorias;
}

// Generar tabla de artículos
function generar_tabla()
{
    $tabla = [
        [
            'id' => 1,
            'descripcion' => 'Laptop Acer Aspire 15',
            'modelo' => 'A315-42',
            'categoria' => 0,
            'unidades' => 10,
            'precio' => 799.99
        ],
        [
            'id' => 2,
            'descripcion' => 'Monitor HP 27 pulgadas',
            'modelo' => 'HP27X',
            'categoria' => 3,
            'unidades' => 15,
            'precio' => 299.99
        ],
        [
            'id' => 3,
            'descripcion' => 'Teclado inalámbrico Logitech',
            'modelo' => 'K780',
            'categoria' => 9,
            'unidades' => 20,
            'precio' => 49.99
        ],
        [
            'id' => 4,
            'descripcion' => 'Impresora Epson EcoTank',
            'modelo' => 'ET-2750',
            'categoria' => 4,
            'unidades' => 5,
            'precio' => 349.99
        ],
        [
            'id' => 5,
            'descripcion' => 'Disco Duro Externo Seagate 2TB',
            'modelo' => 'STEA2000400',
            'categoria' => 2,
            'unidades' => 12,
            'precio' => 79.99
        ],
        [
            'id' => 6,
            'descripcion' => 'Router Wi-Fi TP-Link Archer C7',
            'modelo' => 'AC1750',
            'categoria' => 9,
            'unidades' => 8,
            'precio' => 89.99
        ],
        [
            'id' => 7,
            'descripcion' => 'Tarjeta gráfica NVIDIA GeForce RTX 3080',
            'modelo' => 'RTX 3080',
            'categoria' => 2,
            'unidades' => 3,
            'precio' => 899.99
        ]
    ];
    return $tabla;
}


// Funcion nuevo
function nuevo($tabla =[],$elemento){
    // añadismo el nuevo elemento en la tabla
    $tabla[] = $elemento;
    
    return $tabla;
} 

// Funcion ultimoId
function ultimoId($tabla = []){
    $array_id = array_column($tabla,'id');
    asort($array_id);
    return end($array_id)+1;
}


// Funcion actualizar
function actualizar($tabla = [],$indice,$elemento){
    $tabla[$indice] = $elemento;
    return $tabla;
}

// Funcion eliminar
function eliminar($tabla = [], $id) {
    // Buscar el índice a eliminar
    $indiceEliminar = buscar($tabla, 'id', $id);

    if ($indiceEliminar !== false) {
        // Eliminamos el artículo seleccionado
        unset($tabla[$indiceEliminar]);

        // Reconstruimos el array para quitar huecos
        $tabla = array_values($tabla);
    }

    return $tabla;
}

// Funcion ordenar
function ordenar($tabla=[], $criterio) {
    // Comprueba si el criterio existe
    if (!in_array($criterio, array_keys($tabla[0]))) {
        echo "ERROR: Criterio de ordenación no existe";
        exit();
    } 

    // Carga en un array todos los valores del criterio de ordenación
    $aux = array_column($tabla, $criterio);

    // Usa array_multisort para ordenar el array
    array_multisort($aux, SORT_ASC, $tabla);

    // Devuelve el array ordenado
    return $tabla;
}

// Funcion filtrar
function filtrar($tabla = [],$expresion){
     // Crearemos un array vacío donde cargaremos las filas que cumpla la expresion de busqueda
     $aux = [];
     foreach ($tabla as $elemento){
         if(array_search($expresion,$elemento)){
             $aux[] = $elemento;
         }
     }
 
     // Validaremos la busqueda
     if(!empty($aux)){
         $tabla = $aux;
     }
     return $aux;
}

?>