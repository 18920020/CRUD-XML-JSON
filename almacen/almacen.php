<?php
	include("../session.php");
	
	if(isset($_POST['search']))
	{
		$valueToSearh = $_POST['valueToSearh']; 
		$query = "SELECT * FROM almacen WHERE id_alamacen LIKE '%".$valueToSearh."%' OR marca LIKE '%".$valueToSearh."%'";
		$result = filterRecord($query);
	}
	else
	{
		$query = "SELECT *FROM almacen";
		$result = filterRecord($query);
	}
	
	function filterRecord($query)
	{
		include("../config.php");
		$filter_result = mysqli_query($mysqli, $query);
		return $filter_result;
	}
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
  <a class="active" href="almacen.php"><i class="fa fa-user"> Almacen</i></a> 
  <a href="registration.php"><i class="fa fa-registered"> Registrar</i></a>
  <a href="print_all.php" target="_blank"><i class="fa fa-print"> Imprimir</i></a>
   
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<h2>Almacen</h2>
<hr/>

<div class="container">

<form action="" method="POST">
<input type="search" name="valueToSearh" placeholder="Búsqueda">
<button type="submit" class="signupbtn" name="search" >Buscar</button>
</form>
<br />
<?php


echo "<table border='1'>
<tr>
<th>Codigo</th>
<th>Producto</th>
<th>Marca</th>
<th>Descripcion</th>
<th>Fecha de compra</th>
<th>Precio unitario</th>
<th>Cantidad</th>
<th>Actualizar</th>
<th>Eliminar</th>
<th>Imprimir</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id_almacen'] . "</td>";
echo "<td>" . $row['producto'] . "</td>";
echo "<td>" . $row['marca'] . "</td>";
echo "<td>" . $row['descripcion'] . "</td>";
echo "<td>" . $row['fechacompra'] . "</td>";
echo "<td>" . $row['precio'] . "</td>";
echo "<td>" . $row['cantidad'] . "</td>";
echo "<td><a href='edit.php?id=".$row['id_almacen']."'><img src='../images/icons8-Edit-32.png' alt='Edit'></a></td>";
echo "<td><a href='delete.php?id=".$row['id_almacen']."'><img src='../images/icons8-Trash-32.png' alt='Delete'></a></td>";
echo "<td><a href='print.php?id=".$row['id_almacen']."'><img src='../images/icons8-Print-32.png' alt='Print'></a></td>";
echo "</tr>";
}
echo "</table>";

?>

</body>
</html> 