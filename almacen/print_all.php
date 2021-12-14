<?php
require('../fpdf/fpdf.php');
include('../config.php');

$pdf = new FPDF();
///var_dump(get_class_methods($pdf));

$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,10,'Date:'.date('d-m-Y').'',0,"R");
$pdf->Ln(15);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Productos en almacen',1,1,"C");
$pdf->SetFont('Arial','B',11);
$pdf->Cell(15,8,'Codigo',1);
$pdf->Cell(40,8,'Producto',1);
$pdf->Cell(20,8,'Marca',1);
$pdf->Cell(70,8,'Descripcion',1);
$pdf->Cell(45,8,'Cantidad',1);

$query="SELECT * FROM almacen";
$result = mysqli_query($mysqli, $query);
$no=0;
while($row = mysqli_fetch_array($result)){
	$no=$no+1;
	$pdf->Ln(8);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(15,8,$row['id_almacen'],1);
	$pdf->Cell(40,8,$row['producto'],1);
	$pdf->Cell(20,8,$row['marca'],1);
	$pdf->Cell(70,8,$row['descripcion'],1);
	$pdf->Cell(45,8,$row['cantidad'],1);
}
$pdf->Output();
?>
