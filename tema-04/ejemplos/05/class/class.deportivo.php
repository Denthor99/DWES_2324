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

}
?>