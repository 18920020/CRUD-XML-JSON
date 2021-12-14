<?php
	include("../session.php");
	
	if(isset($_POST['search']))
	{
		$valueToSearh = $_POST['valueToSearh']; 
		$query = "SELECT * FROM ventas WHERE id_venta LIKE '%".$valueToSearh."%' OR marca LIKE '%".$valueToSearh."%'";
		$result = filterRecord($query);
	}
	else
	{
		$query = "SELECT *FROM ventas";
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
  <a class="active" href="xml.php"><i class="fa fa-user"> Ventas</i></a> 
   
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<h2>Ventas</h2>
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
<th>Fecha de venta</th>
<th>Precio</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id_venta'] . "</td>";
echo "<td>" . $row['producto'] . "</td>";
echo "<td>" . $row['marca'] . "</td>";
echo "<td>" . $row['descripcion'] . "</td>";
echo "<td>" . $row['fechaventa'] . "</td>";
echo "<td>" . $row['precio'] . "</td>";
echo "</tr>";
}
echo "</table>";
	
	$query = "SELECT * FROM ventas";
	$result = filterRecord($query);
	$cadena= mysql_XML($result);
	echo $cadena;

function mysql_XML($resultado)
{
	// creamos el documento XML		
	//header ("Content-type: text/xml");
	$contenido = '&lt; informacion &gt;';
	
	while ($row = mysqli_fetch_array($resultado)) {
		
		$contenido.="&lt;codigo&gt;".$row['id_venta']."&lt;/codigo&gt;";
		$contenido.="&lt;producto&gt;".$row['producto']."&lt;/producto&gt;";
		$contenido.="&lt;marca&gt;".$row['marca']."&lt;/marca&gt;";
		$contenido.="&lt;descripcion&gt;".$row['descripcion'] ."&lt;/descripcion&gt;";
		$contenido.="&lt;fechaventa&gt;".$row['fechaventa']."&lt;/fechaventa&gt;";
		$contenido.="&lt;/estudiante&gt;";		
	}

	$contenido.='&lt; /informacion &gt;';
	//var_dump($contenido);
	echo $contenido;	
	return $contenido;
}
?>
</body>
</html> 