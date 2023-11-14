<?php
    /*
        Clase Articulo
    */

    class Alumno{
        public $id;
        public $nombre;
        public $apellidos;
        public $email;
        public $fecha_nacimiento;
        public $curso;
        public  $asignaturas;
    
        // Creamos el método constructor (no necesario)
        public function __construct($id=null,
        $nombre=null,
        $apellidos=null,
        $email=null,
        $fecha_nacimiento=null,
        $curso=null,
        $asignaturas=[]){
                $this->id = $id;
                $this->nombre = $nombre;
                $this->apellidos = $apellidos;
                $this->email = $email;
                $this->fecha_nacimiento = $fecha_nacimiento;
                $this->curso = $curso;
                $this->asignaturas = $asignaturas;
        }
        public function getEdad(){
                
                // Establecer la configuración regional para que los nombres de los meses estén en español
                setlocale(LC_TIME, 'es_ES');

                $fechaNacimiento = DateTime::createFromFormat('d/m/Y',$this->fecha_nacimiento);
                $fecha_actual = new DateTime();
                $edadAlumno=$fecha_actual->diff($fechaNacimiento)->y;
                return $edadAlumno;
        }


}    

?>