<?php
/**
 * Ejemplo 01
 * 
 * Creación de nuestro primer archivo PDF con PHP
 */

 // Importamos la libería FPDF
 require('fpdf/fpdf.php');

 // Intanciamos la clase
 $pdf = new FPDF();

 // Añadimos una página
 $pdf->AddPage();

 // Escogemos la fuente
 $pdf->SetFont('Arial','B',16);

 // Añadimos una celda de contenido a la página
 //$pdf->Cell(40,10,'Mi primera pagina pdf con FPDF!');

 // Si queremos añadir a una celda un texto que contenga acentos, caracteres especiales, etc, no nos 
 // queda otra que convertir dicho contenido a UTF-8
 $pdf->Cell(40,10,mb_convert_encoding('Mi primera página pdf con FPDF!','ISO-8859-1','UTF-8'));


 // Exportamos el resultado
 $pdf->Output();