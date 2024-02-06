<?php
/**
 * Ejemplo 04
 * 
 * Creación de otra página
 */

 // Importamos la libería FPDF
 require('fpdf/fpdf.php');

 // Intanciamos la clase
 $pdf = new FPDF('P','mm','A4');

 // Añadimos una página
 $pdf->AddPage();

 // Escogemos la fuente
 $pdf->SetFont('Arial','B',16);

 // Añadimos una celda de contenido a la página
 $pdf->Cell(40,10,iconv('UTF-8','ISO-8859-1','Mi primera página pdf con FPDF!'));

// Ahora añadiremos otra página
$pdf->AddPage('L');

// Y creamos otra nueva celda
$pdf->Cell(40,10,iconv('UTF-8','ISO-8859-1','Mi segunda página pdf con FPDF!'));


 // Exportamos el resultado
 $pdf->Output();