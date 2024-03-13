{{-- Creamos una vista a partir del layout 
     Vista principal Alumnos
--}}
@extends('layouts.layout')
@section('titulo','Home Alumnos')
@section('subtitulo','Panel Control Alumnos')

@section('contenido')
    @include('partials.alerts')
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
                    <td scope="row">{{$alumno->lastname}}</td>
                    <td scope="row">{{$alumno->name}}</td>
                    <td scope="row">{{$alumno->phone}}</td>
                    <td scope="row">{{$alumno->city}}</td>
                    <td scope="row">{{$alumno->email}}</td>
                    <td scope="row">{{$alumno->course->course}}</td>
                    {{-- Botones de acción --}}
                    <td>
                        <div class="d-grid gap-2 d-md-block">
                            <!-- botón  eliminar -->
                            <form action="{{ route('student.destroy', $alumno->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Eliminar" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                            <!-- botón  editar -->
                            <a href="{{route('student.edit',$alumno->id)}}" title="Editar" class="btn btn-primary">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <!-- botón  mostrar -->
                            <a href="{{route('student.show',$alumno->id)}}" title="Mostrar" class="btn btn-warning">
                                <i class="bi bi-card-text"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <p>No hay alumnos registrados</p>
            @endforelse
        </tbody>
    </table>
    <br><br>
@endsection