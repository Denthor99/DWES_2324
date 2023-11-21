<?php
    /*
        Clase ArrayArticulos
    */

    class ArrayArticulos{
        private $tabla;

       public function __construct(
            $tabla = []){
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

        // Método estatico, devuelve un array con categorias
        static public function getCategorias(){
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
            asort($categorias);
            return $categorias;
        }

        // Método estatico, devuelve un array de marcas
        static public function getMarcas(){
            $marcas = [
                'BQ',
                'Xiaomi',
                'Apple',
                'Oppo',
                'Huwaei',
                'Canon',
                'Lenovo',
                'HP',
                'LG'
            ];
            asort($marcas);
            return $marcas;
        }

        // Añadimos varios articulos a la tabla

        public function getDatos(){
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

        // Método que muestra las categorias
        static public function mostrarCategorias($categorias,$categoriasArticulo=[]){
            $arrayCategorias = [];
            foreach($categoriasArticulo as $indice){
                $arrayCategorias[]=$categorias[$indice];
            }
            asort($arrayCategorias);
            return $arrayCategorias;
        }

        // Función Delete
        // Elimina un objeto de la tabla según su indice
        public function delete($indice){
            unset($this->tabla[$indice]);
            array_values($this->tabla);
        }

        // Función Read
        // Lee un objeto del array según su indice
        public function read($indice){
            return $this->tabla[$indice];
        }

        // Función create()
        // Insertamos el objeto en el array de objetos
        public function create(Object $data){
            $this->tabla[] = $data;
        }

        // Función update()
        public function update($indice, Object $data){
            $this->tabla[$indice] = $data;
        }

    }
?>