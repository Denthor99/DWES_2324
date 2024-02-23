<?php

// Incluimos la clase FPDF
require('fpdf/fpdf.php');

class pdfCuentas extends FPDF
{

    // Creamos el método constructor
    function __construct()
    {

        // Método constructor de la clase padre (FPDF)
        parent::__construct();

        // Añadimos una nueva página
        $this->AddPage();


        // Ahora llamaremos a un método personalizado por nosotros (Titulo).
        // Deberemos invocarlo en el constructor para tenerlo disponible
        $this->Titulo();
    }

    // Método Header (Encabezado)
    function Header()
    {
        // Definimos la tipografía que tendrá el Encabezado
        $this->SetFont('Arial', 'B', 13);

        // Definimos las celdas con la siguiente información:
        // - Gesbank 1.0 -> alineado a la izquierda
        // - Nuestro nombre -> alineado en el centro
        // - 2DAW 23/24
        $this->Cell(1, 10, iconv('UTF-8', 'ISO-8859-1', 'Gesbank 1.0'), 0, 0, 'L');
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Daniel A. Rodríguez Santos'), 'B', 0, 'C');
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', '2ºDAW 23/24'), 0, 1, 'R');

        // Añadimos un borde inferior
        $this->Cell(0, 6, '', 'T', 1, 'C');

        // Realizamos un salto de página
        $this->Ln(5);
    }

    // Método Footer (Pie de Página)
    function Footer()
    {

        // Método especifico para el número de páginas
        // Añade un alias para el número total de páginas
        $this->AliasNbPages();

        // Indicamos la posición, que será -15 desde abajo del pie
        $this->SetY(-15);

        // Indicamos la tipografía a usar en el footer
        $this->SetFont('Arial', 'B', 13);

        // Añadimos un borde superior
        $this->Cell(0, 0, '', 'T', 1, 'C');

        // Añadimos el contador de páginas, que estará centrado
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 'T', 0, 'C');


    }

    // Método Titulo
    function Titulo()
    {
        // Añadimos una tipografia
        $this->SetFont('Times', 'B', 12);

        // Listado de Clientes
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', "Listado de Cuentas"), 0, 1, 'C');

        // Fecha actual
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Fecha actual: ' . date("d/m/Y H:i")), 0, 1, 'C');

        // Añadimos un leve salto de línea
        $this->Ln(5);

    }

    // Método HeaderListado
    function HeaderListado()
    {
        // Establecemos  la tipografía y el tamaño de fuente
        $this->SetFont('Courier', 'B', '12');

        // Añadimos un color de fondo (relleno)
        $this->SetFillColor(243, 249, 187);

        // Creamos las celdas con los títulos de cada columna
        $this->Cell(10, 8, iconv('UTF-8', 'ISO-8859-1', 'Id'), 'B', 0, 'R', true);
        $this->Cell(40, 8, iconv('UTF-8', 'ISO-8859-1', 'Nº Cuenta'), 'B', 0, 'C', true);
        $this->Cell(60, 8, iconv('UTF-8', 'ISO-8859-1', 'Cliente'), 'B', 0, 'C', true);
        $this->Cell(30, 8, iconv('UTF-8', 'ISO-8859-1', 'Fecha Alta'), 'B', 0, 'C', true);
        $this->Cell(30, 8, iconv('UTF-8', 'ISO-8859-1', 'Nº Movs.'), 'B', 0, 'C', true);
        $this->Cell(25, 8, iconv('UTF-8', 'ISO-8859-1', 'Saldo'), 'B', 1, 'C', true);

        // Salto de linea
        $this->Ln(0.5);
    }

    // Método Contenido
    function Contenido($cuentas)
    {
        // Cargamos el encabezado de la tabla
        $this->HeaderListado();

        // Antes de recorrer los clientes, deberemos añadir una tipografía
        $this->SetFont('Arial', '', '10');

        // Añadimos color  de relleno para alternar filas
        $this->SetFillColor(226, 237, 215);

        // Recorremos los datos, que se irán mostrando en filas
        foreach ($cuentas as $cuenta) {
            // Antes  de mostrar cada dato, deberemos controlar los saltos de página. Con GetY controlamos
            // la posición del puntero. Cuando la posición Y alcanza el margen de 8 mm llegamos a final de página
            // PageBreakTrigger crea una nueva página cuando el puntero Y alcanza su margen
            if ($this->GetY() + 8 > $this->PageBreakTrigger) {
                // Añadimos una nueva página  al documento PDF
                $this->AddPage();

                // Añadimos nuevamente la cabecera
                $this->HeaderListado();

                // Volvemos a añadir la tipografía a usar
                $this->SetFont('Arial', '', '10');

                // Añadimos el relleno en las filas
                $this->SetFillColor(226, 237, 215);

            }

            // Añadimos los valores a las celdas
            $this->Cell(10, 9, iconv('UTF-8', 'ISO-8859-1', $cuenta->id), 'B', 0, 'R', true);
            $this->Cell(40, 9, iconv('UTF-8', 'ISO-8859-1', $cuenta->num_cuenta), 'B', 0, 'C', true);
            $this->Cell(60, 9, iconv('UTF-8', 'ISO-8859-1', $cuenta->cliente), 'B', 0, 'C', true);
            $this->Cell(30, 9, iconv('UTF-8', 'ISO-8859-1', $cuenta->fecha_alta), 'B', 0, 'C', true);
            $this->Cell(30, 9, iconv('UTF-8', 'ISO-8859-1', $cuenta->num_movtos), 'B', 0, 'C', true);
            $this->Cell(25, 9, iconv('UTF-8', 'ISO-8859-1', $cuenta->saldo), 'B', 1, 'C', true);

        }
    }
}