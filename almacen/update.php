<?php
include("../config.php");
include("../session.php");

$id = $_POST['id'];
$producto = $_POST['producto'];
$marca = $_POST['marca'];
$descripcion = $_POST['descripcion'];
$fechacompra = $_POST['fechacompra'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];

$sql = "UPDATE almacen SET id_almacen='$id',producto='$producto', marca='$marca', descripcion='$descripcion', fechacompra='$fechacompra', precio='$precio', cantidad='$cantidad' 
WHERE id_almacen='$id'";
if(mysqli_query($mysqli, $sql)){
    echo '<script language="javascript">';
	echo 'alert("Registro actualizado exitósamente");';
	echo 'window.location="almacen.php";';
	echo '</script>';
	
} else {
	echo '<script language="javascript">';
	echo 'alert("Error en proceso de actualización de registro!");';
	echo 'window.location="almacen.php";';
	echo '</script>';
}
?>