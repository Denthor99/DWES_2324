<?php
class Deportivo extends Vehiculo
{
    private $cilindrada;
    private $km;

    // Definimos constructor
    public function __construct(
        $modelo = null,
        $nombre = null,
        $matricula = null,
        $velocidad = null,
        $cilindrada = null,
        $km = null
    ) {
        parent::__construct($modelo, $nombre, $matricula, $velocidad);
        $this->cilindrada = $cilindrada;
        $this->km = $km;


    }

    public function velocidadMaxima(){
        $this->velocidad = 500;
    }

    /**
     * Get the value of cilindrada
     */ 
    public function getCilindrada()
    {
        return $this->cilindrada;
    }

    /**
     * Set the value of cilindrada
     *
     * @return  self
     */ 
    public function setCilindrada($cilindrada)
    {
        $this->cilindrada = $cilindrada;

        return $this;
    }

    /**
     * Get the value of km
     */ 
    public function getKm()
    {
        return $this->km;
    }

    /**
     * Set the value of km
     *
     * @return  self
     */ 
    public function setKm($km)
    {
        $this->km = $km;

        return $this;
    }
}
?>