<?php
/*
 Clase ArrayArticulos

 Tabla de Artículos
 Array donde cada elemento es un objeto de la clase "Articulo"
*/

class ArrayArticulos
{
    private $tabla;


    function __construct(
        $tabla = []
    ) {
        $this->tabla = $tabla;
    }

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

    // Creamos el me

    // Creamos un método que nos devuelve todas las categorías 
    static public function getCategorias()
    {
        $categorias = [
            'Portátiles',
            'PCs Sobremesa',
            'Componentes',
            'Pantallas',
            'Impresoras',
            'Tablets',
            'Móviles',
            'Fotografía',
            'Imagen',
            'Accesorios'

        ];
        // Ordenamos el array, manteniendo la asociación de indices
        asort($categorias);
        return $categorias;
    }

    // Creamos un método que nos devolverá todas las marcas
    static public function getMarcas()
    {
        $marcas = [
            'Apple',
            'Xiaomi',
            'Casio',
            'Nokia',
            'Logitech',
            'IBM',
            'BQ',
            'Hacendado'

        ];
        // Ordenamos el array, manteniendo la asociación de indices
        asort($marcas);
        return $marcas;
    }

    // Creamos un metodo, que simulará un acceso a la base de datos, devolviendonos un array de objetos. No estatico debido a modificacion atributo clase
    public function getDatos()
    {
        // Articulo 1
        $articulo1 = new Articulo(1, 'Laptop Acer Aspire 15', 'A315-42', 0, [1, 2, 3], 10, 799.99);
        $this->tabla[] = $articulo1;

        // Articulo 2
        $articulo2 = new Articulo(2, 'Monitor HP 27 pulgadas', 'HP27X', 3, [1, 2, 0], 15, 299.99);
        $this->tabla[] = $articulo2;

        // Articulo 3
        $articulo3 = new Articulo(3, 'Teclado inalámbrico Logitech', 'K780', 5, [1, 4], 20, 49.99);
        $this->tabla[] = $articulo3;

        // Articulo 4
        $articulo4 = new Articulo(4, 'Impresora Epson EcoTank', 'ET-2750', 4, [1], 5, 349.99);
        $this->tabla[] = $articulo4;

        // Articulo 5
        $articulo5 = new Articulo(5, 'Disco Duro Externo Seagate 2TB', 'STEA2000400', 2, [2, 3], 12, 79.99);
        $this->tabla[] = $articulo5;

        // Articulo 6
        $articulo6 = new Articulo(6, 'Router Wi-Fi TP-Link Archer C7', 'AC1750', 5, [4], 8, 89.99);
        $this->tabla[] = $articulo6;

        // Articulo 7
        $articulo7 = new Articulo(7, 'Tarjeta gráfica NVIDIA GeForce RTX 3080', 'RTX 3080', 2, [2, 3], 3, 899.99);
        $this->tabla[] = $articulo7;

    }

    // Declarada estatica debido a que no modifica ningún atributo de la clases
    static public function mostrarCategorias($categorias,$categoriasArticulo=[]){
        $arrayCategorias = [];
        foreach($categoriasArticulo as $indice){
            $arrayCategorias[]=$categorias[$indice];
        }
        asort($arrayCategorias);
        return $arrayCategorias;
    }

    public function create(Articulo $data){
        $this->tabla[]=$data;
    }

    public function delete($indice){
        unset($this->tabla[$indice]);
        array_values($this->tabla);
    }
}
?>