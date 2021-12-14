<?php
include("../config.php");
include("../session.php");
$codigo = $_POST['id_venta'];
$producto = $_POST['producto'];
$marca = $_POST['marca'];
$descripcion = $_POST['descripcion'];
$fechaventa = $_POST['fechaventa'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];

$sql = "INSERT INTO ventas(id_venta,producto, marca, descripcion, fechaventa, precio, cantidad) 
VALUES('$codigo','$producto', '$marca', '$descripcion', '$fechaventa', '$precio', '$cantidad')";
if(mysqli_query($mysqli, $sql)){
    echo '<script language="javascript">';
	echo 'alert("Venta registrada");';
	echo 'window.location="ventas.php";';
	echo '</script>';
	
} else {
	echo '<script language="javascript">';
	echo 'alert("Venta duplicada!");';
	echo 'window.location="registration.php";';
	echo '</script>';
}
?>