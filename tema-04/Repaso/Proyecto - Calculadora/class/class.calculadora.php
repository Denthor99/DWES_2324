<?php
    /*
        Clase calculadora
    */
    class Calculadora{
        private $valor1;
        private $valor2;
        private $operacion;
        private $resultado;

        // Método constructor
        public function __construct(
            $valor1 = 0,
            $valor2 = 0,
            $operacion = null,
            $resultado = 0){
                $this->valor1=$valor1;
                $this->valor2=$valor2;
                $this->operacion=$operacion;
                $this->resultado=$resultado;
        }

        // Getters y Setters
        
        /**
         * Get the value of valor1
         */ 
        public function getValor1()
        {
                return $this->valor1;
        }

        /**
         * Set the value of valor1
         *
         * @return  self
         */ 
        public function setValor1($valor1)
        {
                $this->valor1 = $valor1;

                return $this;
        }

        /**
         * Get the value of valor2
         */ 
        public function getValor2()
        {
                return $this->valor2;
        }

        /**
         * Set the value of valor2
         *
         * @return  self
         */ 
        public function setValor2($valor2)
        {
                $this->valor2 = $valor2;

                return $this;
        }

        /**
         * Get the value of operacion
         */ 
        public function getOperacion()
        {
                return $this->operacion;
        }

        /**
         * Set the value of operacion
         *
         * @return  self
         */ 
        public function setOperacion($operacion)
        {
                $this->operacion = $operacion;

                return $this;
        }

        /**
         * Get the value of resultado
         */ 
        public function getResultado()
        {
                return $this->resultado;
        }

        /**
         * Set the value of resultado
         *
         * @return  self
         */ 
        public function setResultado($resultado)
        {
                $this->resultado = $resultado;

                return $this;
        }

        // Métodos calculadora

        // funcion sumar
        public function sumar(){
            $this->resultado = $this->valor1 + $this->valor2;
        }

        // funcion restar
        public function restar(){
            $this->resultado = $this->valor1 - $this->valor2;
        }

        // funcion multiplicar
        public function multiplicar(){
            $this->resultado = $this->valor1 * $this->valor2;
        }

        // funcion dividir
        public function dividir(){
            $this->resultado = $this->valor1 / $this->valor2;
        }

        // funcion potencia
        public function potencia(){
            $this->resultado = pow($this->valor1,$this->valor2);
        }
    }
?>