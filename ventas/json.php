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
<meta charset="utf-8">
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
<br/>
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

$server = "localhost";
$user = "root";
$pass = "";
$bd = "crud_basico";
//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

//generamos la consulta
$sql = "SELECT * FROM ventas";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$ventas = array(); //creamos un array
while($row = mysqli_fetch_array($result)) 
{ 	
    $id_venta=$row['id_venta'];
	$producto=$row['producto'];
	$marca=$row['marca'];
	$descripcion= $row['descripcion'] ;
	$fechaventa=$row['fechaventa'];
	$precio=$row['precio'];

	$ventas[] = array('id_venta'=> $id_venta ,'producto'=> $producto, 'marca'=> $marca, 'descripcion'=> $descripcion,
						'fechaventa'=> $fechaventa,'precio'=> $precio);

}
	
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($ventas);
echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:
/*
$file = 'ventas.json';
file_put_contents($file, $json_string);
*/
	

?>
</body>
</html> 