<?php
	include("../session.php");
	include("../config.php");
	$id = $_GET['id'];
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
  <a href="ventas.php"><i class="fa fa-user"> Almacen</i></a> 
  <a class="active" href="registration.php"><i class="fa fa-registered"> Registrar</i></a>
  
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<h2>Actualizar</h2>
<hr/>

<form action="update.php" method="POST">
  <div class="container">
  <?php
	$result = mysqli_query($mysqli,"SELECT * FROM almacen WHERE id_almacen ='$id'");
	while($row = mysqli_fetch_array($result))
	{
    echo"<input type='number' name='id' value='{$row['id_almacen']}' required>";
    echo"<input type='text' placeholder='Producto' name='producto' value='{$row['producto']}' required>";
    echo"<input type='text' placeholder='Marca' name='marca' value='{$row['marca']}' required>";
    echo"<input type='text' placeholder='Descripcion' name='descripcion' value='{$row['descripcion']}' required>";
  	echo"<label><b>Fecha de venta</b>";
    echo"<input type='date' name='fechacompra' value='{$row['fechacompra']}'required>";
    echo"</label>";
    echo"<input type='number' placeholder='Precio' name='precio' value='{$row['precio']}' required>";
    echo"<input type='number' placeholder='Cantidad' name='cantidad' value='{$row['cantidad']}' required>";
    echo"<div class='clearfix'>";
    echo"<button type='submit' class='signupbtn'>Actualizar</button>";
	echo"</div>";
	}?>
  </div>
</form>