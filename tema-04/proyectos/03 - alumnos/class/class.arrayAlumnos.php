<?php
/*
 Clase ArrayArticulos

 Tabla de Artículos
 Array donde cada elemento es un objeto de la clase "Articulo"
*/

class ArrayAlumnos
{
    private $tabla;


    function __construct(
        $tabla = []
    ) {
        $this->tabla = $tabla;
    }

    /**
     * Get the value of tabla
     */
    public function getTabla()
    {
        return $this->tabla;
    }

    /**
     * Set the value of tabla
     *
     * @return  self
     */
    public function setTabla($tabla)
    {
        $this->tabla = $tabla;

        return $this;
    }

    // Creamos el me

    // Creamos un método que nos devuelve todas las asignaturas 
    static public function getAsignaturas()
    {
        $asignaturas = [
            '1DAW Base de Datos',
            '1DAW Entornos de desarollo',
            '1DAW Formación y Orientación Laboral',
            '1DAW Lenguaje de Marcas y Sistemas de Gestión de Información',
            '1DAW Programación',
            '1DAW Sistemas Informáticos',
            '2DAW Desarrollo Web en Entorno Cliente',
            '2DAW Desarrollo Web en Entorno Servidor',
            '2DAW Despligue de Aplicaciones Web',
            '2DAW Diseño de interfaces Web',
            '2DAW Horas de Libre Configuración'

        ];
        // Ordenamos el array, manteniendo la asociación de indices
        asort($asignaturas);
        return $asignaturas;
    }

    // Creamos un método que nos devolverá los cursos
    static public function getCursos()
    {
        $cursos = [
            '1DAW',
            '2DAW',
            '1SMR',
            '2SMR',
            '1AD',
            '2AD'
        ];
        // Ordenamos el array, manteniendo la asociación de indices
        asort($cursos);
        return $cursos;
    }

    // Creamos un metodo, que simulará un acceso a la base de datos, devolviendonos un array de objetos. No estatico debido a modificacion atributo clase
    public function getAlumnos()
    {
        // Alumno 1
        $alumno1= new Alumno(1,'Juan Manuel','Herrera Ramírez','jmherrera@gmail.com','06/03/2002',2,[0,1,5]);
        $this->tabla[]= $alumno1;
        
        // Alumno 2
        $alumno2 = new Alumno( 2, 'Pablo', 'Mateos Palas', 'pmatpal0105@g.educaand.es', '01/05/2004', 3, [3, 7, 8] );
        $this->tabla[]= $alumno2;

        $alumno3 = new Alumno( 3, 'Jorge', 'Coronil Villalba', 'jcorvil600@gmail.com', '17/04/1997', 3, [6, 7, 8] ); 
        $this->tabla[]= $alumno3;

        $alumno4 = new Alumno( 4, 'Diego', 'González Romero', 'diegogonzalezromero@gmail.com', '28/03/2001', 3, [6,7,8] );
        $this->tabla[]= $alumno4;

        $alumno5 = new Alumno( 5, 'Adrián', 'Merino Gamaza', 'aamergam@g.educand.es', '10/12/2002', 2, [6, 7, 8] );
        $this->tabla[]= $alumno5;

        $alumno6= new Alumno(6,'Daniel Alfonso','Rodríguez Santos','darancuga@gmail.com','27/08/1999',2,[0,1,5]); 
        $this->tabla[]= $alumno6;

        $alumno7 = new Alumno(7, 'Ricardo', 'Moreno Cantea', 'rmorcan@g.educaand.es', '13/05/2004', 3, [6, 7, 8]);
        $this->tabla[]= $alumno7;

        $alumno8 = new Alumno( 8, 'Jonathan', 'León Canto', 'jleocan773@g.educaand.es', '19/06/2000', 3, [6,7,8] );
        $this->tabla[]= $alumno8;

        $alumno9 = new Alumno( 9, 'Juan Jesus', 'Muñoz Perez', 'jjmunper@gmail.com', '06/03/2000', 2, [3,2,4] );
        $this->tabla[]= $alumno9;
        
        $alumno10 = new Alumno( 10, 'Julian', 'Garcia Velazquez', 'jgarvel076@g.educaand.es', '01/12/2004', 2, [3, 7, 8] );
        $this->tabla[]= $alumno10;
    }

    // Declarada estatica debido a que no modifica ningún atributo de la clases
    static public function mostrarAsignaturas($asignaturas,$asignaturasAlumno=[]){
        $aux = [];
        foreach($asignaturasAlumno as $indice){
            $aux[]=$asignaturas[$indice];
        }
        asort($aux);
        return $aux;
    }

    public function create(Object $data){
        $this->tabla[]=$data;
    }

    public function read($indice){
        return $this->tabla[$indice];
    }

    public function delete($indice){
        unset($this->tabla[$indice]);
        array_values($this->tabla);
    }

    public function update($indice, Object $data){
        $this->tabla[$indice] = $data;
    }

    public function order($criterio){
        // Verifica si la propiedad proporcionada como criterio de ordenación existe en la clase
        if (!property_exists('Alumno', $criterio)) {
            // Si el criterio de ordenación no es válido, termina la ejecución
            echo "ERROR: Criterio de ordenación no existe";
            exit();
        }

        // Define una función de comparación para usort
        $comparar = function ($a, $b) use ($criterio) {
            // Obtiene los valores del criterio de ordenación para los objetos $a y $b
            $valorA = $a->$criterio;
            $valorB = $b->$criterio;

            // Realiza la comparación de dichos valores
            return $valorA <=> $valorB;
        };

        // Utiliza usort para ordenar el array de objetos según la función de comparación definida
        usort($this->tabla, $comparar);
    }

}
?>