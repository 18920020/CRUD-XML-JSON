<?php
require('../fpdf/fpdf.php');
include('../config.php');
$id = $_GET['id'];

$pdf = new FPDF();
///var_dump(get_class_methods($pdf));

$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,10,'Fecha: '.date('d-m-Y').'',0,"R");
$pdf->Ln(14);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(130,10,'Venta',1,0);

$query="SELECT * FROM ventas WHERE id_venta='$id'";
$result = mysqli_query($mysqli, $query);
$no=0;

while($row = mysqli_fetch_array($result)){
	$no=$no+1;
	
	
	
	$pdf->Ln(10);
	$pdf->SetFont('Arial','',12);
	
	
	$pdf->Cell(50,8,'Folio',1,0);
	$pdf->Cell(80,8,$row['id_venta'],1,1);
	
	$pdf->Cell(50,8,'Producto',1,0);
	$pdf->Cell(80,8,$row['producto'],1,1);
	
	$pdf->Cell(50,8,'Marca',1,0);
	$pdf->Cell(80,8,$row['marca'],1,1);
	
	$pdf->Cell(50,8,'Descripcion',1,0);
	$pdf->Cell(80,8,$row['descripcion'],1,1);
	
	$pdf->Cell(50,8,'Fecha de venta',1,0);
	$pdf->Cell(80,8,$row['fechaventa'],1,1);

	$pdf->Cell(50,8,'Precio',1,0);
	$pdf->Cell(80,8,$row['precio'],1,1);
	
	$pdf->Cell(50,8,'Cantidad',1,0);
	$pdf->Cell(80,8,$row['cantidad'],1,1);

	
}
$pdf->Output();
?>