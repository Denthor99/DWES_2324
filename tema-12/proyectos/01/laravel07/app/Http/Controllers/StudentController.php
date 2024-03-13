<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Validation\Rule;

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
                'course_id' => ['required', 'integer', 'max:20', 'exists:courses,id']
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
        $student->course_id = $request->course_id;

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
        //// Cargamos los datos del alumno
        $alumno = Student::find($id);
        //$cursos = Course::all()->sortBy('id');

        return view('student.show', ['alumno' => $alumno]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Cargamos los datos del alumno
        $alumno = Student::find($id);
        $cursos = Course::all()->sortBy('id');

        return view('student.edit', ['alumno' => $alumno, 'cursos' => $cursos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        # Validación de formulario
        $validateData = $request->validate(
            [
                'name' => ['required', 'string', 'max:32'],
                'lastname' => ['required', 'string', 'max:60'],
                'birth_date' => ['required', 'date'],
                'phone' => ['required', 'max:13'],
                'city' => ['required', 'string', 'max:40'],
                'dni' => ['required', 'string', 'max:9', Rule::unique('students')->ignore($id)],
                'email' => ['required', 'string', 'max:40', Rule::unique('students')->ignore($id)],
                'course_id' => ['required', 'integer', 'max:20', 'exists:courses,id']
            ]
        );

        # Cargamos los datos del alumno
        $alumno = Student::find($id);

        # Actualizamos con los datos del formulario
        $alumno->name = $request->name;
        $alumno->lastname = $request->lastname;
        $alumno->birth_date = $request->birth_date;
        $alumno->phone = $request->phone;
        $alumno->city = $request->city;
        $alumno->dni = $request->dni;
        $alumno->email = $request->email;
        $alumno->course_id = $request->course_id;

        # Actualizamos la base de datos
        $alumno->save();

        # Realizamos la redireccion
        return redirect()->route('student.index')->with('success', 'Datos del alumno actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar el alumno por su ID
        $alumno = Student::find($id);

        // Verificar si el alumno existe
        if ($alumno) {
            // Eliminar el alumno
            $alumno->delete();

            // Redirigir con un mensaje de éxito
            return redirect()->route('student.index')->with('success', 'Alumno eliminado correctamente');
        } else {
            // Redirigir con un mensaje de error si el alumno no se encuentra
            return redirect()->route('student.index')->with('error', 'No se encontró el alumno');
        }
    }

    public function order(Request $request, string $columna)
    {
        // Verificar si el campo es 'course_id' para ordenar por el nombre del curso
        if ($columna === 'course_id') {
            // Subconsulta para obtener el nombre del curso basado en el course_id
            $subQuery = Course::select('course')
                ->whereColumn('courses.id', 'students.course_id');

            // Ordenar por el resultado de la subconsulta
            $alumnos = Student::orderByRaw("({$subQuery->toSql()})")
                ->get();
        } else {
            // Para otros campos, simplemente ordenar como antes
            $alumnos = Student::orderBy($columna)
                ->get();
        }

        // Cargamos de nuevo el home, pasandole  los alumnos ya ordenados por el campo
        return view('student.home', ['alumnos' => $alumnos]);
    }

//     public function filter(Request $request)
// {
//     $request->validate([
//         'expresion' => 'required|string|max:255',
//     ]);

//     $expresion = $request->input('expresion');

//     $alumnos = Student::where('id', 'like', '%' . $expresion . '%')
//                        ->orWhere('name', 'like', '%' . $expresion . '%')
//                        ->orWhere('lastname', 'like', '%' . $expresion . '%')
//                        ->orWhere('birth_date', 'like', '%' . $expresion . '%')
//                        ->orWhere('phone', 'like', '%' . $expresion . '%')
//                        ->orWhere('city', 'like', '%' . $expresion . '%')
//                        ->orWhere('dni', 'like', '%' . $expresion . '%')
//                        ->orWhere('email', 'like', '%' . $expresion . '%')
//                        ->get();

//     if ($alumnos->isEmpty()) {
//         return redirect()->route('student.index')->with('error', 'No se encontraron estudiantes con la expresión de búsqueda proporcionada');
//     }

//     return view('student.index', ['alumnos' => $alumnos]);
// }





}