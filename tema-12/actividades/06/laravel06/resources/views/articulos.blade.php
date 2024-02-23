@extends('layout')

@section('title', 'Listado de artículos - InfoMatic')
@section('titulo', 'InfoMatic - Tu tienda Online')
@section('subtitulo', 'Listado de artículos')
@section('footer','© 2024 Daniel Alfonso Rodríguez Santos - DWES - 2º DAW - Curso 23/24')

@section('contenido')
<!-- Menú -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">InfoMatic</a>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/articulos">Articulos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Cabecera de la tabla -->
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Descripción</th>
            <th scope="col">Categoría</th>
            <th scope="col">Unidades</th>
            <th scope="col">Precio Coste</th>
            <th scope="col">Precio Venta</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articulos as $articulo)
        <tr>
            <th scope="row">{{ $articulo['id'] }}</th>
            <td>{{ $articulo['descripcion'] }}</td>
            <td class="text-center">{{ $articulo['categoria'] }}</td>
            <td class="text-end">{{ $articulo['unidades'] }}</td>
            <td class="text-end">{{ $articulo['precio_coste'] }}€</td>
            <td class="text-end">{{ $articulo['precio_venta'] }}€</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="6">Número de articulos disponibles: {{ count($articulos) }}</th>
        </tr>
    </tfoot>
</table>
@endsection