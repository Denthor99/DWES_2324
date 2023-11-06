<?php

// Funcion buscar

function buscar($tabla=[],$columna,$valor){
    $columnaValores = array_column( $tabla,$columna);
    return array_search($valor,$columnaValores,false);
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

// Generar tabla con las marcas

function generar_tabla_marcas()
{
    $marcas = [
        'Apple',
        'Xiaomi',
        'Casio',
        'Nokia',
        'Logitech',
        'IBM',
        'BQ',
        'Hacendado'

    ];
    // Ordenamos el array, manteniendo la asociación de indices
    asort($marcas);
    return $marcas;
}


// Generar tabla de artículos
function generar_tabla()
{
    $tabla = [
        [
            'id' => 1,
            'descripcion' => 'Laptop Acer Aspire 15',
            'modelo' => 'A315-42',
            'marca' => 0,
            'categorias' => [1,2,3],
            'unidades' => 10,
            'precio' => 799.99
        ],
        [
            'id' => 2,
            'descripcion' => 'Monitor HP 27 pulgadas',
            'modelo' => 'HP27X',
            'marca' => 3,
            'categorias' => [1,2,0],
            'unidades' => 15,
            'precio' => 299.99
        ],
        [
            'id' => 3,
            'descripcion' => 'Teclado inalámbrico Logitech',
            'modelo' => 'K780',
            'marca' => 5,
            'categorias' => [1,4],
            'unidades' => 20,
            'precio' => 49.99
        ],
        [
            'id' => 4,
            'descripcion' => 'Impresora Epson EcoTank',
            'modelo' => 'ET-2750',
            'marca' => 4,
            'categorias' => [1],
            'unidades' => 5,
            'precio' => 349.99
        ],
        [
            'id' => 5,
            'descripcion' => 'Disco Duro Externo Seagate 2TB',
            'modelo' => 'STEA2000400',
            'marca' => 2,
            'categorias' => [2,3],
            'unidades' => 12,
            'precio' => 79.99
        ],
        [
            'id' => 6,
            'descripcion' => 'Router Wi-Fi TP-Link Archer C7',
            'modelo' => 'AC1750',
            'marca' => 5,
            'categorias' => [4],
            'unidades' => 8,
            'precio' => 89.99
        ],
        [
            'id' => 7,
            'descripcion' => 'Tarjeta gráfica NVIDIA GeForce RTX 3080',
            'modelo' => 'RTX 3080',
            'marca' => 2,
            'categorias'=> [2,3],
            'unidades' => 3,
            'precio' => 899.99
        ]
    ];
    return $tabla;
}

// Funcion mostrarCategorias
function mostrarCategorias($tabla,$categoriasTabla=[]){
    $arrayCategoria = [];
    foreach($categoriasTabla as $indice){
        $arrayCategoria[]=$tabla[$indice];
    }
    asort($arrayCategoria);
    return $arrayCategoria;
}

// Funcion nuevo
// Descripcion: introduce un nuevo elemento
function nuevo($tabla=[],$elemento){
    $tabla[] = $elemento;
    return $tabla; 
}

// Funcion ultimoId
// Descripcion: Nos devolverá el último id. Lo usaremos para generar un id automaticamente
function ultimoId($tabla=[]){
    $ultimo_id = array_column($tabla,'id');
    asort($ultimo_id);
    return end($ultimo_id)+1;
}

// Funcion actualizar
// Descripcion: sobreescribimos el array original
function actualizar($tabla=[],$indice,$elemento){
    $tabla[$indice] = $elemento;
    return $tabla;
}

// Funcion eliminar
// Descripcion: eliminamos un articulo del array de articulos
function eliminar($tabla=[],$idElemento){
    $indiceBuscar = buscar($tabla,'id',$idElemento);
    if($indiceBuscar!== false){
        unset($tabla[$indiceBuscar]);
        $tabla = array_values($tabla);
    } else {
        echo 'ERROR: No existe tal articulo';
        exit();
    }
    return $tabla;
}

function ordenar($tabla=[],$criterio){
// busqueda del criterio
if(!in_array($criterio,Array_keys($tabla[0]))){
    echo "El criterio \"$criterio\" no existe";
    exit();
}

// Creamos una variable auxiliar, donde cargaremos los valores de la columna a ordenar
$aux = array_column($tabla,$criterio);

// Usamos una función de php para ordenar el array de forma multidimensional
array_multisort($aux,SORT_ASC,$tabla);

// Devolvemos la tabla ordenada
return $tabla;
}

// Funcion filtrar
// Descripción: filtramos la información según expresion
function filtrar($tabla=[],$expresion){
    // Creamos un array vacio
    $aux = [];

    // Iteramos la matriz
    foreach ($tabla as $elemento){
        if(in_array($expresion,$elemento)){ // Si la expresión se encuentra en el elemento correspondiente, el elemento se almacena en el array vacío
            $aux[] = $elemento;
        }
    }

    // Validamos.
    if(!empty($aux)){
        $tabla = $aux;
    }
    return $aux;
}

?>