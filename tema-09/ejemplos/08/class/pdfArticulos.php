<?php
    /**
     * Clase PdfArticulos 
     * Heredamos de la clase FPDF
     * Declaramos una serie de funciones, que sobreescribiran los de su clase madre (FPDF)
     */
    class PdfArticulos extends FPDF{
        // Función Header()
        public function Header(){
            // Se añade un logotipo
            $this->Image('logo/ia.jpg',10,3,13);
            $this->SetFont('Arial','B',10);

            // Subraya la cabecera
            $this->Cell(0,16,'VirtualPriority','B',1,'R');

            // Salto de línea de 5 mm. Así dividimos la cabecera del cuerpo
            $this->ln(5);
        }

        // Función Footer()
        public function Footer(){
            // Indicamos la posición del footer
            $this->SetY(-10);
            $this->SetFont('Arial','B',10);
            $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}','T',0,'C');
        }

        public function Titulo(){
            $this->SetFont('Courier','B',16);
            $this->setFillColor(218,245,238);
            $this->Cell(0,10,iconv('UTF-8','ISO-8859-1','Listado Articulos'),0,0,'C',true);
            $this->ln(20);
        }

        public function CabeceraTabla(){
            $this->SetFont('Courier','B',12);
            $this->setFillColor(237,238,188);
            $this->Cell(10,7,iconv('UTF-8','ISO-8859-1','Id'),'B',0,'R',true);
            $this->Cell(80,7,iconv('UTF-8','ISO-8859-1','Descripción'),'B',0,'L',true);
            $this->Cell(30,7,iconv('UTF-8','ISO-8859-1','Modelo'),'B',0,'L',true);
            $this->Cell(20,7,iconv('UTF-8','ISO-8859-1','Cat.'),'B',0,'L',true);
            $this->Cell(20,7,iconv('UTF-8','ISO-8859-1','Unids.'),'B',0,'L',true);
            $this->Cell(30,7,iconv('UTF-8','ISO-8859-1','Precio'),'B',1,'R',true);


        }
    }
