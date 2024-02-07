<?php
/**
 * Ejemplo 08
 * 
 * Mostramos una cabecera, footer y cuerpo
 */

 // Importamos la libería FPDF
 require('fpdf/fpdf.php');
 require('class/pdfArticulos.php');
 require('datos/articulos.php');

 // Creamos un objeto de la clase pdfArticulos
 $pdf = new PdfArticulos();

 // Enumere el total de las páginas
 $pdf->AliasNbPages();

 // Establecemos la fuente
 $pdf->SetFont('Courier','',10);
 $pdf->AddPage();

 // Muestro el título del documento
 $pdf->Titulo();

 // Mostramos la cabecera
 $pdf->CabeceraTabla();

 // Muestra los detalles de articulos
 foreach($articulos as $articulo){
    $pdf->Cell(10,7,iconv('UTF-8','ISO-8859-1',$articulo['id']),'B',0,'R',true);
    $pdf->Cell(80,7,iconv('UTF-8','ISO-8859-1',$articulo['descripcion']),'B',0,'L',true);
    $pdf->Cell(30,7,iconv('UTF-8','ISO-8859-1',$articulo['modelo']),'B',0,'L',true);
    $pdf->Cell(20,7,iconv('UTF-8','ISO-8859-1',$articulo['categoria']),'B',0,'L',true);
    $pdf->Cell(20,7,iconv('UTF-8','ISO-8859-1',$articulo['unidades']),'B',0,'L',true);
    $pdf->Cell(30,7,iconv('UTF-8','ISO-8859-1',$articulo['precio']),'B',1,'R',true);
 }
 $pdf->Output();