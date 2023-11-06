<?php
/*
    Funcion: buscar_en_tabla()
    Descripción: busca un valor en una determinada columna de una tabla
    parametros: 
        -tabla
        -nombre de la columna - busqueda
        -valor - lo que se busca
    salida:
        -indice del array donde se encuentra el valor
        -false -  en caso de no lo encuentre
*/

function buscar_en_tabla($tabla = [], $columna, $valor)
{

    $columna_valores = array_column($tabla, $columna);
    return array_search($valor, $columna_valores, false);
}


/*
    Funcion: generar_tabla()
    Descripción: genera la tabla de datos con la que vamos a trabajar
    parametros: 
    salida:
        - tabla de datos
*/
function generar_tabla()
{
    $tabla = [
        [
            'id' => 1,
            'titulo' => 'Paco Pepe y el viaje de su vida',
            'autor' => 'Vikram Vaswani',
            'genero' => 'Aventura',
            'precio' => 12.99
        ],
        [
            'id' => 2,
            'titulo' => 'Juanito Valderrama y su caballo Guadarrama',
            'autor' => 'Manuel Loera',
            'genero' => 'Comedia',
            'precio' => 29.99
        ],
        [
            'id' => 3,
            'titulo' => 'PHP 2: Ahora es personal',
            'autor' => 'Paco Candela',
            'genero' => 'Programación',
            'precio' => 39.99
        ],
        [
            'id' => 4,
            'titulo' => 'El Viajero Ubriqueño',
            'autor' => 'Turronero',
            'genero' => 'Superación',
            'precio' => 249.99
        ],
        [
            'id' => 5,
            'titulo' => 'JavaScript 2.0',
            'autor' => 'Alan Gallego',
            'genero' => 'Programación',
            'precio' => 22.99
        ],
        [
            'id' => 6,
            'titulo' => 'Victor, ¿si, o no?',
            'autor' => 'JuanMaria',
            'genero' => 'Suspense',
            'precio' => 19.99
        ],
        [
            'id' => 7,
            'titulo' => 'PHP y MariaDB',
            'autor' => 'Juan Carlos Moreno',
            'genero' => 'Programación',
            'precio' => 5.99
        ]
    ];
    return $tabla;
}


/*
    Funcion: eliminar()
    Descripción: elimina un elemento de la tabla
    parámetros: 
        - tabla
        - id del elemento que deseo eliminaar
    salida:
        - tabla actualizada
*/

// function eliminar($tabla = [], $id){
// // Buscar elemento que le corresponde id
// //Metemos en un array los valores de una columna concreta
//     $lista_id = array_column($tabla, 'id'); 

// // Buscamos el id del libro que queremos buscar. False nos indica que no es una busqueda estricta
//     $elemento = array_search($id, $lista_id,false);

// // Eliminamos el elemento de la tabla
//     unset($tabla[$elemento]);

// // Devolvemos el array
//     return $tabla;
// }

?>