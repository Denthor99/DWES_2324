<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Muestra los alumnos
        $alumnos = Student::all()->sortBy('id');
        return view('student.home', ['alumnos' => $alumnos]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Carga formulario nuevo alumno
        $cursos = Course::all()->sortBy('id');
        return view('student.create', ['cursos' => $cursos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Recibe los datos del formulario
        // Valida los datos
        // Almacena en la tabla student de la base de datos

        # Validación de formulario
        $validateData = $request->validate(
            [
                'name' => ['required', 'string', 'max:32'],
                'lastname' => ['required', 'string', 'max:60'],
                'birth_date' => ['required', 'date'],
                'phone' => ['required', 'max:13'],
                'city' => ['required', 'string', 'max:40'],
                'dni' => ['required', 'string', 'max:9', 'unique:students'],
                'email' => ['required', 'string', 'max:40', 'unique:students'],
                'curso_id' => ['required', 'integer', 'max:20', 'exists:courses,id']
            ]
        );

        // Crear una nueva instancia del modelo Student
        $student = new Student;

        // Asignar los valores del formulario al modelo
        $student->name = $request->name;
        $student->lastname = $request->lastname;
        $student->birth_date = $request->birth_date;
        $student->phone = $request->phone;
        $student->city = $request->city;
        $student->dni = $request->dni;
        $student->email = $request->email;
        $student->curso_id = $request->curso_id;

        // Guardar el modelo en la base de datos
        $student->save();

        # Realizamos la redirección
        return redirect()->route('student.index')->with('success', 'Alumno creado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
