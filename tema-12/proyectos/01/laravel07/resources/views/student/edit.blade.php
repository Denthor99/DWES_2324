@extends('layouts.layout')

@section('titulo', 'Laravel GesAlumnos - Alumnos')
@section('subtitulo', 'Editar Alumno')
@section('contenido')
    @include('partials.alerts')
    <div class="card">
        <div class="card-header">
            Formulario Nuevo Alumno
        </div>
        <div class="card-body">
            <!-- Formulario  -->
            <form action="{{ route('student.update',$alumno->id) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- name  -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name',$alumno->name)}}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- lastname -->
                <div class="mb-3">
                    <label for="lastname" class="form-label">Apellidos</label>
                    <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                        value="{{ old('lastname',$alumno->lastname) }}" required autocomplete="lastname" autofocus>
                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- birth_date --}}
                <div class="mb-3">
                    <label for="birth_date" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                        value="{{ old('birth_date',$alumno->birth_date) }}" required autocomplete="birth_date" autofocus>
                    @error('birth_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- phone  -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefono</label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone"
                        value="{{ old('phone',$alumno->phone) }}" required autocomplete="phone" autofocus>
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- city  -->
                <div class="mb-3">
                    <label for="city" class="form-label">Población</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                        value="{{ old('city',$alumno->city) }}" required autocomplete="city" autofocus>
                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- Dni  -->
                <div class="mb-3">
                    <label for="dni" class="form-label">Dni</label>
                    <input type="text" class="form-control @error('dni') is-invalid @enderror" name="dni"
                        value="{{ old('dni',$alumno->dni) }}" required autocomplete="dni" autofocus>
                    @error('dni')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- Email  -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email',$alumno->email) }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Curso --}}
                <div class="mb-3">
                    <label for="course_id" class="form-label">Curso</label>
                    <select class="form-select @error('course_id') is-invalid @enderror" aria-label="Default select example"
                        name="course_id" id="course_id">
                        <option selected disabled>Seleccione el curso del alumno</option>
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->id }}" @if (old('course_id',$alumno->course_id) == $curso->id) selected @endif>
                                {{ $curso->course }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="card-footer text-muted">
                    <!-- Botones de acción --------------------------------------------------->
                    <a class="btn btn-secondary" href="{{ route('student.index') }}" role="button">Cancelar</a>
                    <button type="reset" class="btn btn-danger">Borrar</button>
                    <button type="submit" class="btn btn-primary">Añadir</button>
                </div>
                {{-- Fin Formulario --}}

            </form>
        </div>
    </div>
    <br><br><br>
@endsection
