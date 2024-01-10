<?php

    class Alumno Extends Controller {

        function __construct() {

            parent ::__construct();
            
            
        }

        function render() {

            # Creo la propiedad title de la vista
            $this->view->title = "Home - Panel Control Alumnos";
            
            # Creo la propiedad alumnos dentro de la vista
            # Del modelo asignado al controlador ejecuto el método get();
            $this->view->alumnos = $this->model->get();

            $this->view->render('alumno/main/index');
        }

        function new() {

            # etiqueta title de la vista
            $this->view->title = "Añadir - Gestión Alumnos";

            #  obtener los cursos  para generar dinámicamente lista cursos
            $this->view->cursos = $this->model->getCursos();

            # cargo la vista con el formulario nuevo alumno
            $this->view->render('alumno/new/index');
        }

        function create ($param = []) {
            // Iniciamos sesión
            session_start();

            # 1. Seguridad. Saneamos los datos del formulario
            // el uso del método filter_var nos permite la filtración de caracteres especiales, para evitar posibles injecciones de código
            // Si usamos la expresion abreviada ??='', indicamos que si existe, filtra el contenido de la variable, si no le asigna una cadena vacía
            $nombre = filter_var($_POST['nombre'] ??='', FILTER_SANITIZE_SPECIAL_CHARS);
            $apellidos = filter_var($_POST['apellidos'] ??='', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'] ??='', FILTER_SANITIZE_EMAIL);
            $telefono = filter_var($_POST['telefono'] ??='', FILTER_SANITIZE_SPECIAL_CHARS);
            $poblacion = filter_var($_POST['poblacion'] ??='', FILTER_SANITIZE_SPECIAL_CHARS);
            $dni = filter_var($_POST['dni'] ??='', FILTER_SANITIZE_SPECIAL_CHARS);
            $fechaNac = filter_var($_POST['fechaNac'] ??='', FILTER_SANITIZE_SPECIAL_CHARS);   
            $id_curso = filter_var($_POST['id_curso'] ??='', FILTER_SANITIZE_NUMBER_INT);   

            # 2. Creamos el alumno con los datos saneados
            $alumno = new classAlumno(
                null,
                $nombre,
                $apellidos,
                $email,
                $telefono,
                null,
                $poblacion,
                null,
                null, 
                $dni,      
                $fechaNac,
                $id_curso
            );

            # 3. Validación
            $errores = [];

            // Nombre: Obligatorio
            if(empty($nombre)){
                $errores['nombre'] = 'El campo nombre es obligatorio';
            }

            // Apellidos: Obligatorio
            if(empty($apellidos)){
                $errores['apellidos'] = 'El campo apellidos es obligatorio';
            }

            // Fecha de nacimiento: Obligatorio
            $fecha = explode('/',$fechaNac);
            if(empty($fechaNac)){
                $errores['fechaNac'] = 'El campo fecha de nacimiento es obligatorio';
            } else if(checkdate($fecha)){
                $errores['fechaNac'] = 'formato no valido';

            }

            // Email: Obligatorio, formato valido, y valor único (clave secundaria)
            if(empty($email)){
                $errores['email'] = 'El campo email es obligatorio';
            } else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){ //Usamos filter_var tanto para el saneamiento como la validación de variables
                $errores['email'] = 'Formato incorrecto, recuerda que se trata de un email';
            } else if($this->model->validateUniqueEmail($email)){
                $errores['email'] = 'El email ya está registrado';
            }

            // Dni: Obligatorio, formato valido, y valor único (clave secundaria)
            // Creamos un array
            $options =[
                'options'=>[
                    'regexp' => '/^(\d{8})([a-zA-Z]{1})$/'
                ]
            ];

            if(empty($dni)){
                $errores['dni'] = 'El campo dni es obligatorio';
            } else if(!filter_var($email,FILTER_VALIDATE_REGEXP,$options)){ //Usamos filter_var tanto para el saneamiento como la validación de variables
                $errores['dni'] = 'Formato incorrecto(8 números + 1 letra)';
            } else if($this->model->validateUniqueDni($dni)){
                $errores['dni'] = 'El DNI ya está registrado';
            }

            // id_curso: campo obligatorio, valor entero y debe existir
            if(empty($id_curso)){
                $errores['id_curso'] = 'El campo curso es obligatorio';
            } else if(!filte_var($id_curso,FILTER_VALIDATE_INT)){
                $errores['id_curso'] = 'Curso no valido';
            } else if($this->model->validateCurso($id_curso)){
                $errores['dni'] = 'El curso no existe';
            }

            # 4. Comprobar validación
            if(!empty($errores)){
                // Errores de validación
                $_SESSION['alumno'] = serialize($alumno);

            } else {
                # Añadir registro a la tabla
                $this->model->create($alumno);

                // Mensaje
                $_SESSION['mensaje'] = "Alumno creaado correctamente";

                # Redirigimos al main de alumnos
                header('location:'.URL.'alumno');
            }
 
        }

        function edit($param = []) {

            # obtengo el id del alumno que voy a editar
            // alumno/edit/4

            $id = $param[0];

            # asigno id a una propiedad de la vista
            $this->view->id = $id;

            # title
            $this->view->title = "Editar - Panel de control Alumnos";

            # obtener objeto de la clase alumno
            $this->view->alumno = $this->model->read($id);

            # obtener los cursos
            $this->view->cursos = $this->model->getCursos();

            # cargo la vista
            $this->view->render('alumno/edit/index');



        }

        public function update($param = []) {

            # Cargo id del alumno
            $id = $param[0];

            # Con los detalles formulario creo objeto alumno
            $alumno = new classAlumno (

                null,
                $_POST['nombre'],
                $_POST['apellidos'],
                $_POST['email'],
                $_POST['telefono'],
                null,
                $_POST['poblacion'],
                null,
                null, 
                $_POST['dni'],      
                $_POST['fechaNac'],
                $_POST['id_curso']

            );

            # Actualizo base  de datos
            $this->model->update($alumno, $id);

            # Cargo el controlador principal de alumno
            header('location:'. URL.'alumno');

        }

        public function order($param = []) {

            # Obtengo criterio de ordenación
            $criterio = $param[0];

            # Creo la propiedad title de la vista
            $this->view->title = "Ordenar - Panel Control Alumnos";
            
            # Creo la propiedad alumnos dentro de la vista
            # Del modelo asignado al controlador ejecuto el método get();
            $this->view->alumnos = $this->model->order($criterio);

            # Cargo la vista principal de alumno
            $this->view->render('alumno/main/index');
        }

        public function filter($param = []) {

            # Obtengo expresión de búsqueda
            $expresion = $_GET['expresion'];

            # Creo la propiedad title de la vista
            $this->view->title = "Buscar - Panel Control Alumnos";
            
            # Filtro a partir de la  expresión
            $this->view->alumnos = $this->model->filter($expresion);

            # Cargo la vista principal de alumno
            $this->view->render('alumno/main/index');
        }
    }

?>