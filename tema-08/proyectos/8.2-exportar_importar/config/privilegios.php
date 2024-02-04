<?php
    /**
     * # Perfiles
     * 1 - Administrador
     * 2 - Editor
     * 3 - Registrado
     * 
     * # Definimos los privilegios como variables globales
     * Index: administrador, editor, registrado
     * nuevo: administrador, editor
     * Editar: administrador, editor
     * Eliminar: administrador
     * Mostrar: administrador, editor, registrado
     * Buscar: administrador, editor, registrado
     * Ordenar: administrador, editor, registrado 
     * 
     */

    $GLOBALS['alumno']['main'] = [1,2,3];
    $GLOBALS['alumno']['new'] = [1,2];
    $GLOBALS['alumno']['edit'] = [1,2];
    $GLOBALS['alumno']['delete'] = [1];
    $GLOBALS['alumno']['show'] = [1,2,3];
    $GLOBALS['alumno']['filter'] = [1,2,3];
    $GLOBALS['alumno']['order'] = [1,2,3];


