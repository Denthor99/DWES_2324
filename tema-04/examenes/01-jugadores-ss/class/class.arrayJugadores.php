<?php

/*
        Tabla de Usuarios.

        Es un array donde cada elemento es un objeto de la clase
        Usuario.
    */

class tablaJugadores
{

    private $tabla;

    // Método constructor (valor por defecto)
    public function __construct(
        $tabla = []
    ){
        $this->tabla = $tabla;
    }

    // Getter y Setter de los atributos 

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

    # Create()

    public function create(Jugador $jugador){
        $this->tabla[] = $jugador;
    }

    # Delete()

    public function delete($indice){
        unset($this->tabla[$indice]);
        array_values($this->tabla);
    }

    # Read()

    public function read($indice){
        return $this->tabla[$indice];
    }
    # Update()

    public function update($indice, Jugador $jugador){
        $this->tabla[$indice] = $jugador;
    }

    # getPaises()
    static public function getPaises(){
        $paises = array("Afganistán", "Albania", "Alemania", "Andorra", "Angola", "Antigua y Barbuda", "Arabia Saudita", "Argelia", "Argentina", "Armenia", "Australia", "Austria", "Azerbaiyán", "Bahamas", "Bangladés", "Barbados", "Baréin", "Bélgica", "Belice", "Benín", "Bielorrusia", "Birmania", "Bolivia", "Bosnia y Herzegovina", "Botsuana", "Brasil", "Brunéi", "Bulgaria", "Burkina Faso", "Burundi", "Bután", "Cabo Verde", "Camboya", "Camerún", "Canadá", "Catar", "Chad", "Chile", "China", "Chipre", "Ciudad del Vaticano", "Colombia", "Comoras", "Corea del Norte", "Corea del Sur", "Costa de Marfil", "Costa Rica", "Croacia", "Cuba", "Dinamarca", "Dominica", "Ecuador", "Egipto", "El Salvador", "Emiratos Árabes Unidos", "Eritrea", "Eslovaquia", "Eslovenia", "España", "Estados Unidos", "Estonia", "Etiopía", "Filipinas", "Finlandia", "Fiyi", "Francia", "Gabón", "Gambia", "Georgia", "Ghana", "Granada", "Grecia", "Guatemala", "Guyana", "Guinea", "Guinea ecuatorial", "Guinea-Bisáu", "Haití", "Honduras", "Hungría", "India", "Indonesia", "Irak", "Irán", "Irlanda", "Islandia", "Islas Marshall", "Islas Salomón", "Israel", "Italia", "Jamaica", "Japón", "Jordania", "Kazajistán", "Kenia", "Kirguistán", "Kiribati", "Kuwait", "Laos", "Lesoto", "Letonia", "Líbano", "Liberia", "Libia", "Liechtenstein", "Lituania", "Luxemburgo", "Madagascar", "Malasia", "Malaui", "Maldivas", "Malí", "Malta", "Marruecos", "Mauricio", "Mauritania", "México", "Micronesia", "Moldavia", "Mónaco", "Mongolia", "Montenegro", "Mozambique", "Namibia", "Nauru", "Nepal", "Nicaragua", "Níger", "Nigeria", "Noruega", "Nueva Zelanda", "Omán", "Países Bajos", "Pakistán", "Palaos", "Palestina", "Panamá", "Papúa Nueva Guinea", "Paraguay", "Perú", "Polonia", "Portugal", "Reino Unido", "República Centroafricana", "República Checa", "República de Macedonia", "República del Congo", "República Democrática del Congo", "República Dominicana", "República Sudafricana", "Ruanda", "Rumanía", "Rusia", "Samoa", "San Cristóbal y Nieves", "San Marino", "San Vicente y las Granadinas", "Santa Lucía", "Santo Tomé y Príncipe", "Senegal", "Serbia", "Seychelles", "Sierra Leona", "Singapur", "Siria", "Somalia", "Sri Lanka", "Suazilandia", "Sudán", "Sudán del Sur", "Suecia", "Suiza", "Surinam", "Tailandia", "Tanzania", "Tayikistán", "Timor Oriental", "Togo", "Tonga", "Trinidad y Tobago", "Túnez", "Turkmenistán", "Turquía", "Tuvalu", "Ucrania", "Uganda", "Uruguay", "Uzbekistán", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Yibuti", "Zambia", "Zimbabue");
        asort($paises);
        return $paises;
    }
        
    # getPosiciones()
    static public function getPosiciones(){
        $posiciones = [
            'Portero',
            'Central',
            'Lateral',
            'Mediocentro',
            'Centrocampista',
            'Extremo',
            'Delantero'
        ];
        asort($posiciones);
        return $posiciones;
    }

    # getEquipos()
    static public function getEquipos(){
        $equipos = [
            'Real Madrid',
            'Barcelona',
            'Betis',
            'Sevilla',
            'Valencia',
            'Rayo Vallecano',
            'Ath Bilbao',
            'Levante',
            'Real Sociedad',
            'Osasuna'
        ];
        asort($equipos);
        return $equipos;
    }

    # getDatos()
    public function getDatos(){
        // Jugador 1
        $jugador1 = new Jugador(1,"Marco Asensio",10,12,0,[1,4],9500000);
        $this->tabla[]=$jugador1;

        // Jugador 2
        $jugador2 = new Jugador(2,"Ansu Fati",11,28,1,[5,2],12000000);
        $this->tabla[]=$jugador2;

        // Jugador 3
        $jugador3 = new Jugador(3,"Sergio Canales",10,58,2,[3,4],3500000);
        $this->tabla[]=$jugador3;
    }

    # getEncabezado()
    static public function getEncabezado(){
        $encabezado = [
            'Id',
            'Nombre',
            'Num',
            'Pais',
            'Equipo',
            'Posiciones',
            'Contrato',
            'Acciones'
        ];
        return $encabezado;
    }
    


    # Devuelve el array con los nombres de las posiciones de un jugador
    // IndicePosiciones = posiciones del objeto
    // posiciones = posiciones totales
    static public function listaPosiciones($indicesPosiciones, $posiciones)
    {
        $arrayPosiciones = [];
        foreach($indicesPosiciones as $indice){
            $arrayPosiciones[]=$posiciones[$indice];
        }
       asort($arrayPosiciones);
       return $arrayPosiciones;
    }

    
}
