<?php
include("../config.php");
include("../session.php");
$codigo = $_POST['id_almacen'];
$producto = $_POST['producto'];
$marca = $_POST['marca'];
$descripcion = $_POST['descripcion'];
$fechacompra = $_POST['fechacompra'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];

$sql = "INSERT INTO almacen(id_almacen,producto, marca, descripcion, fechacompra, precio, cantidad) 
VALUES('$codigo','$producto', '$marca', '$descripcion', '$fechacompra', '$precio', '$cantidad')";
if(mysqli_query($mysqli, $sql)){
    echo '<script language="javascript">';
	echo 'alert("Compra registrada");';
	echo 'window.location="almacen.php";';
	echo '</script>';
	
} else {
	echo '<script language="javascript">';
	echo 'alert("Compra duplicada!");';
	echo 'window.location="registration.php";';
	echo '</script>';
}
?>