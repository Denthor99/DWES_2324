<?php
/**
 * Ejemplo 07
 * 
 * Mostrar una imagen en pdf
 */

 // Importamos la libería FPDF
 require('fpdf/fpdf.php');

 // Creamos un objeto de la clase FPDF
 $pdf = new FPDF();

 // Establecemos la fuente
 $pdf->SetFont('Times','',10);
 $pdf->AddPage();

 // añadimos la imagen
 $pdf->Image('logo/ia.jpg',3,3,20);

 $pdf->Output();