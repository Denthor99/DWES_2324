<?php
    /**
     * Clase cliente
     * Clase cuya unica función será instanciar a un cliente nuevo, que se añadirá a la base de datos
     */

     class classCliente{
        public $id;
        public $apellidos;
        public $nombre;
        public $telefono;
        public $ciudad;
        public $dni;
        public $email;

        // Crearemos un método constructor
        public function __construct($id=null,
        $apellidos=null,
        $nombre=null,
        $telefono=null,
        $ciudad=null,
        $dni=null,
        $email=null
        ){
            $this->id=$id;
            $this->apellidos = $apellidos;
            $this->nombre = $nombre;
            $this->telefono = $telefono;
            $this->ciudad = $ciudad;
            $this->dni = $dni;
            $this->email = $email;

        }
     }
?>