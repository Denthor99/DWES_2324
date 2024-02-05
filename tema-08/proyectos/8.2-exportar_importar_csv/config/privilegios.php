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

    // Permisos clientes
    $GLOBALS['clientes']['main'] = [1,2,3];
    $GLOBALS['clientes']['new'] = [1,2];
    $GLOBALS['clientes']['edit'] = [1,2];
    $GLOBALS['clientes']['delete'] = [1];
    $GLOBALS['clientes']['show'] = [1,2,3];
    $GLOBALS['clientes']['filter'] = [1,2,3];
    $GLOBALS['clientes']['order'] = [1,2,3];

    // Permisos cuentas
    $GLOBALS['cuentas']['main'] = [1,2,3];
    $GLOBALS['cuentas']['new'] = [1,2];
    $GLOBALS['cuentas']['edit'] = [1,2];
    $GLOBALS['cuentas']['delete'] = [1];
    $GLOBALS['cuentas']['show'] = [1,2,3];
    $GLOBALS['cuentas']['filter'] = [1,2,3];
    $GLOBALS['cuentas']['order'] = [1,2,3];
?>