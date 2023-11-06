<?php
    /*
        Clase Vehiculo. 
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

      
        
    
	/**
	 * @return mixed
	 */
	public function getNombre() {
		return $this->nombre;
	}
	
	/**
	 * @param mixed $nombre 
	 * @return self
	 */
	public function setNombre($nombre): self {
		$this->nombre = $nombre;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMatricula() {
		return $this->matricula;
	}
	
	/**
	 * @param mixed $matricula 
	 * @return self
	 */
	public function setMatricula($matricula): self {
		$this->matricula = $matricula;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getVelocidad() {
		return $this->velocidad;
	}
	
	/**
	 * @param mixed $velocidad 
	 * @return self
	 */
	public function setVelocidad($velocidad): self {
		$this->velocidad = $velocidad;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getModelo() {
		return $this->modelo;
	}
	
	/**
	 * @param mixed $modelo 
	 * @return self
	 */
	public function setModelo($modelo): self {
		$this->modelo = $modelo;
		return $this;
	}

	// Crearemos un metodo para aumentar la velocidad 10KM/H
	public function aumentarVelocidad() {
		return $this->velocidad += 10;
	}
}
?>