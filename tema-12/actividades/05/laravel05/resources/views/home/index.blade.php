<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Controller vista</title>
</head>
<body>
    <h1 align="center">HOME - CONTROLLER VISTA</h1>
    <table border="1" align="center">
        <caption>Listado de Clientes</caption>
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{$cliente['id']}}</td>
                    <td>{{$cliente['nombre']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p align="center">
        @forelse($usuarios as $usuario)
            {{$usuario}}
        @empty
            <p>No existen usuarios</p>
        @endforelse
    </p>
    @if ($nivel == 1)
        <h2 align="center">JIJI, novato &#128169;</h2>
    @else
        <h2 align="center">Experto &#128526;</h2>
    @endif
    <footer align="center"><h3>{{$autor}} | {{$curso}} | {{$modulo ?? 'Base de datos'}} | {{date('d-m-y')}}</h3></footer>
</body>
</html>