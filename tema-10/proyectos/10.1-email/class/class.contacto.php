<?php
    /**
     * Clase classContacto
     * Clase encargada de instanciar un contacto (manejo de errores del formulario)
     */
    class classContacto{

        public $name;
        public $mail;
        public $titulo;
        public $cuerpo;


        public function __construct(
            $name = null, 
            $mail = null,
            $titulo = null,
            $cuerpo = null
    ){
            $this->name = $name;
            $this->mail = $mail;
            $this->titulo = $titulo;
            $this->cuerpo = $cuerpo;
    }

  
    }

?>