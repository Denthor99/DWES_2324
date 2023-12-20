<?php
    // Todos los controladores se crean a partir del controlador
    class Alumno Extends Controller {

        function __construct() {
            
            parent ::__construct();
            
            
        }
        // Render se ejecuta por defecto, es decir, se ejecuta cuando en la URL no hay un segundo parametro
        function render() {
            //
            $this->view->title = "Home - Panel de control Alumnos";

            // Creo la propiedad alumnos dentro de la vista del modelo asignado al controlador, y ejecuto el modelo get(); 
            $this->view->alumnos = $this->model->get();
            
            // Cargara la vista alumno
            $this->view->render('alumno/main/index');
        }

        /**
         * Método new
         * Creamos un nuevo alumno
         */
        function new(){
            // Etiqueta titulo
            $this->view->title = "Añadir - Gestión Alumnos";

            // Obtenemos los cursos para la lista dinamica
            $this->view->cursos = $this->model->getCursos();

            // Cargamos la vista con el formulario
            $this->view->render('alumno/new/index');
        }

        /**
         * Método create
         * Introducimos un nuevo alumno a la base de datos
         */
        function create($param = []){
            // Cargamos los datos del formulario
            $alumno = new classAlumno(null,
            $_POST['nombre'],
            $_POST['apellidos'],
            $_POST['mail'],
            $_POST['telefono'],
            $_POST['direccion'],
            $_POST['poblacion'],
            $_POST['provincia'],
            $_POST['nacionalidad'],
            $_POST['dni'],
            $_POST['fechaNac'],
            $_POST['id_curso'],
        );

            // Añadimos el registro a la tabla
            $this->model->create($alumno);

            // Redireccionamos
            header('Location:'.URL.'alumno');

        }

        /**
         * Método edit
         * Editar un registro de la base de datos
         */
        public function edit($param = []){
            // Obtengo el id del alumno que voy a editar
            // Ejemplo url: alumno/edit/4, siendo "alumno" el controlador, "edit" el método empleado y "4" el parametro
            $id = $param[0];

            // Asigno id a una propiedad de la vista
            $this->view->id = $id;

            // Título de la página
            $this->view->title = "Editar - Panel de control Alumnos";

            // Obtengo un objeto de la clase alumno
            $this->view->alumno = $this->model->read($id);

            // Obtenemos los cursos para la lista dinamica
            $this->view->cursos = $this->model->getCursos();

            // Cargamos la vista con el formulario
            $this->view->render('alumno/edit/index');
        }

        /**
         * Método update
         * Actualizar un registro de la base de datos
         */
        public function update($param=[]){
            // Id del alumno
            $id = $param[0];

            // Asignamos el id a una propiedad de la vista
            $this->view->id = $id;

            // Cargamos los datos del formulario
            $alumno = new classAlumno(null,
            $_POST['nombre'],
            $_POST['apellidos'],
            $_POST['mail'],
            $_POST['telefono'],
            $_POST['direccion'],
            $_POST['poblacion'],
            $_POST['provincia'],
            $_POST['nacionalidad'],
            $_POST['dni'],
            $_POST['fechaNac'],
            $_POST['id_curso'],
        );

            // Actualizamos el registro de la base de datos
            $this->model->update($id,$alumno);

           // Redireccionamos
           header('Location:'.URL.'alumno');
        }
        /**
         * Método order
         */
        function order($param=[]){
            // Obtenemos el criterio de ordenacion
            $criterio = $param[0];

            // Añadimos un titulo
            $this->view->title = "Ordenar - Panel de control Alumnos";

            // Creo la propiedad alumnos dentro de la vista del modelo asignado al controlador, y ejecuto el modelo order; 
            $this->view->alumnos = $this->model->order($criterio);
            
            // Cargara la vista alumno
            $this->view->render('alumno/main/index');
        }

        /**
         * Método filter
         */
        function filter($param=[]){
            // Obtenemos la expresion a buscar
            $expresion = $_GET['expresion'];

            // Añadimos un titulo
            $this->view->title = "Buscar - Panel de control Alumnos";

            // Creo la propiedad alumnos dentro de la vista del modelo asignado al controlador, y ejecuto el modelo filter; 
            $this->view->alumnos = $this->model->filter($expresion);
            
            // Cargara la vista alumno
            $this->view->render('alumno/main/index');
        }
        /**
         * Método show
         * Muestra los detalles de un registro
         */
        function show($param = []){

        }
    }

?>