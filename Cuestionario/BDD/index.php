<?php

include("../services/conexion.php");

$tabla = null;

$sql = "SELECT * FROM cuestionario";
$stmt = $conn -> query($sql);

while ($row = $stmt -> fetch()) 
{
	$respuesta1 = $row['respuesta1'];
	$respuesta2 = $row['respuesta2'];
	$respuesta3 = $row['respuesta3'];
	$respuesta4 = $row['respuesta4'];

	$tabla .= "
		<tr>
			<td>$respuesta1</td>
			<td>$respuesta2</td>
			<td>$respuesta3</td>
			<td>$respuesta4</td>
		</tr>
	";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="./css/styles.css" rel="stylesheet" />
	<title>Información</title>
</head>
<body>
	<div class="tablaDiv">
		<table>
			<tr>
				<th>Pregunta 1</th>
				<th>Pregunta 2</th>
				<th>Pregunta 3</th>
				<th>Pregunta 4</th>
			</tr>
			<?= $tabla; ?>
		</table>
	</div>
</body>
</html>