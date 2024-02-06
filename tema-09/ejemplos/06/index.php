<?php
/**
 * Ejemplo 06
 * 
 * Manejo de las celdas (cell)
 */

 // Importamos la libería FPDF
 require('fpdf/fpdf.php');

 // Declaramos una serie de variables
 $id = 1;
 $apellidos = 'Ramón Parrales';
 $nombre = 'Jose';

 // Intanciamos la clase (parametros por defecto)
 // Es decir, sería lo mismo que  $pdf->new FPDF();
 $pdf = new FPDF('P','mm','A4');

 // Escogemos la fuente
 $pdf->SetFont('Courier','B',16);

 // Escogemos el color de fondo del encabezado de la tabla. Valor entre 0 y 255
 $pdf->SetFillColor(255,168,108);

 // Añadimos una página
 $pdf->AddPage();

 // Creamos el documento
 $pdf->Cell(60,10, iconv('UTF-8','ISO-8859-1','id:'),1,0,'C',true);
 $pdf->Cell(0,10, iconv('UTF-8','ISO-8859-1',$id),1,1);
 $pdf->Cell(60,10, iconv('UTF-8','ISO-8859-1','Nombre:'),1,0,'C',true);
 $pdf->Cell(0,10, iconv('UTF-8','ISO-8859-1',$nombre),1,1);
 $pdf->Cell(60,10, iconv('UTF-8','ISO-8859-1','apellidos:'),1,0,'C',true);
 $pdf->Cell(0,10, iconv('UTF-8','ISO-8859-1',$apellidos),1,1);

 // Exportamos el resultado al navegador
 $pdf->Output('I','Tabla.pdf',true);