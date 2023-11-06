<?php
    /*
        Programación Orientada a Objetos
        Ejemplo 1. Creación de una clase con encapsulamiento
    */

    class Vehiculo{
        private $modelo;
        private $nombre;
        private $matricula;
        private $velocidad;

        public function __construct(){ // El constructor inicializa las variables
            $this->modelo = null;
            $this->nombre = null;
            $this->matricula = null;
            $this->velocidad = 0;
        }

        // Setters. Modificar el valor de los atributos de un objeto
        public function setModelo($modelo){ 
            $this->modelo = $modelo; 
        
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function setMatricula($matricula){
            $this->matricula = $matricula;
        }

        public function setVelocidad($velocidad){
            $this->velocidad = $velocidad;
        }

        // Getters. Obtiene el valor asignado a un atributo del objeto
        public function getModelo(){
            return $this->modelo;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getVelocidad(){
            return $this->velocidad;
        }
        public function getMatricula(){
            return $this->matricula;
        }
    }
?>