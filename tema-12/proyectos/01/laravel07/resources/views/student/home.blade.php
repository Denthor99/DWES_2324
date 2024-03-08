{{-- Creamos una vista a partir del layout 
     Vista principal Alumnos
--}}
@extends('layouts.layout')
@section('titulo','Home Alumnos')
@section('subtitulo','Panel Control Alumnos')

@section('contenido')
    {{-- Menú alumnos --}}
    @include('student.partials.menu')

    {{-- Lista de alumnos --}}
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Apellidos</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Ciudad</th>
                <th>Email</th>
                <th>Curso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($alumnos as $alumno)
                <tr>
                    {{-- Registro alumnos --}}
                    <td scope="row">{{$alumno->id}}</td>
                    <td scope="row">{{$alumno->last_name}}</td>
                    <td scope="row">{{$alumno->first_name}}</td>
                    <td scope="row">{{$alumno->phone}}</td>
                    <td scope="row">{{$alumno->city}}</td>
                    <td scope="row">{{$alumno->email}}</td>
                    <td scope="row">{{$alumno->curso_id}}</td>
                    {{-- Botones de acción --}}
                    <td>
                        <!-- botón  eliminar -->
						<a href="#" title="Eliminar" class="btn btn-danger">
                                <i class="bi bi-trash"></i>
						</a>

						<!-- botón  editar -->
						<a href="#" title="Editar" class="btn btn-primary">
							<i class="bi bi-pencil"></i>
						</a>

						<!-- botón  mostrar -->
						<a href="#" title="Mostrar" class="btn btn-warning">
							<i class="bi bi-card-text"></i>
						</a>
                    </td>
                </tr>
            @empty
                <p>No hay alumnos registrados</p>
            @endforelse
        </tbody>
    </table>
    <br><br>
@endsection