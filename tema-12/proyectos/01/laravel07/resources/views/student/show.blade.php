@extends('layouts.layout')

@section('titulo', 'Laravel GesAlumnos - Alumnos')
@section('subtitulo', 'Gestión de Alumnos')
@section('contenido')
    @include('partials.alerts')
    <div class="card">
        <div class="card-header">
            Datos del alumno nº {{$alumno->id}}
        </div>
        <div class="card-body">
            <!-- Formulario  -->
            <form>
                @csrf
                <!-- name  -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" value="{{ $alumno->name}}" disabled>
                </div>

                <!-- lastname -->
                <div class="mb-3">
                    <label for="lastname" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" value="{{ $alumno->lastname }}" disabled>
                </div>

                {{-- birth_date --}}
                <div class="mb-3">
                    <label for="birth_date" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" value="{{ $alumno->birth_date }}" disabled>
                </div>

                <!-- phone  -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefono</label>
                    <input type="tel" class="form-control" value="{{ $alumno->phone }}" disabled>
                </div>
                <!-- city  -->
                <div class="mb-3">
                    <label for="city" class="form-label">Población</label>
                    <input type="text" class="form-control" value="{{ $alumno->city }}" disabled>
                </div>
                <!-- Dni  -->
                <div class="mb-3">
                    <label for="dni" class="form-label">Dni</label>
                    <input type="text" class="form-control" value="{{ $alumno->dni }}" disabled>
                </div>
                <!-- Email  -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" value="{{ $alumno->email }}" disabled>
                </div>

                {{-- Curso --}}
                <div class="mb-3">
                    <label for="course_id" class="form-label">Curso</label>
                    <input type="text" class="form-control" value="{{$alumno->course->course}}" disabled>
                </div>


                <div class="card-footer text-muted">
                    <!-- Botones de acción --------------------------------------------------->
                    <a class="btn btn-primary" href="{{ route('student.index') }}" role="button">Volver</a>
                </div>
                {{-- Fin Formulario --}}

            </form>
        </div>
    </div>
    <br><br><br>
@endsection
