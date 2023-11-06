<?php
    /*
        Clase Vehiculo. 
    */
    class Vehiculo{
        private $modelo;
        private $nombre;
        private $matricula;
        private $velocidad;

		// El modelo de constructor que usaremos a lo largo del año, donde los parametros son opcionales. Definido en vertical para evitar desplazamiento horizontal
        public function __construct(
		$modelo = null, 
		$nombre = null, 
		$matricula = null, 
		$velocidad = null) {
			$this->modelo = $modelo;
			$this->nombre = $nombre;
			$this->matricula = $matricula;
			$this->velocidad = $velocidad;
		}

        // Setters. Modificar el valor de los atributos de un objeto
        
    
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

	public function __destruct() {
		echo "Objetos Destruidos exitosamente";
	}
}
?>