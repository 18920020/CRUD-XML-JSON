<?php
	include("../session.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/mystyle1.css" /> 
</head>
<body>
<div class="icon-bar">
  <a href="../Principal/index.html"><i class="fa fa-home"> Inicio</i></a> 
  <a href="almacen.php"><i class="fa fa-user"> Almacen</i></a> 
  <a class="active" href="registration.php"><i class="fa fa-registered"> Registrar</i></a>
  <a href="print_all.php" target="_blank"><i class="fa fa-print"> Imprimir</i></a>
  
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<h2>Registrar Compra</h2>
<hr/>
<form action="register.php" method="POST">
  <div class="container">
    <input type="number" placeholder="Codigo" name="id_almacen" required>
	  <input type="text" placeholder="Producto" name="producto" required>
    <input type="text" placeholder="Marca" name="marca" required>
    <input type="text" placeholder="Descripción" name="descripcion" required>
  	<label>Fecha de compra</label>
    <input type="date" name="fechacompra" required>
    <input type="number" placeholder="Precio" name="precio" required>
    <input type="number" placeholder="Cantidad" name="cantidad" required>
    <div class="clearfix">
      <button type="submit" class="signupbtn">Registrar</button>
	  <button type="reset" class="cancelbtn">Cancelar</button>
    </div>
  </div>
</form>