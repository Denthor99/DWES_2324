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

function buscar_en_tabla($tabla = [], $columna,$valor){
    
    $columna_valores = array_column($tabla, $columna);
    return array_search($valor, $columna_valores,false);
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