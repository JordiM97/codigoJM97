<?php
	session_start();

	$nombre = $apellidos = $mensajes = $telefono = null;

	if(!isset($_SESSION['data']))
	{
		$_SESSION['data'] = [];
	}

	if($_POST) {
		if($_POST['nombre'] and $_POST['apellidos'] and $_POST['telefono'])
		{
			$nombre = $_POST['nombre'];
			$apellidos = $_POST['apellidos'];
			$telefono = $_POST['telefono'];
			$mensajes = "¡Hola $nombre $apellidos!<br>Tus datos se han recibido correctamente.<br>Recibirás un mensaje en el número: $telefono";
		}
		else 
		{
			$mensajes = "Nombre, apellidos y teléfono obligatiorios";
		}
	}
	if($nombre and $apellidos and $mensajes and $telefono != null) 
	{
		$_SESSION['data'][] = [
		'nombre' => $nombre,
		'apellidos' => $apellidos,
		'telefono' => $telefono,
		];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/lstyles.css">
	<title>AG_202</title>
</head>
<body>
<div class="main-container">
	<div class="formulaio-div">
		<form class="formularios" action="#" method="post">
			<h1 class="form_title">Datos personales</h1>
			<input class="form_input" type="text" name="nombre" placeholder="Ingresa tu nombre">
			<input class="form_input" type="text" name="apellidos" placeholder="Ingresa tus apellidos">
			<input class="form_input" type="text" name="telefono" placeholder="Ingresa tu número de teléfono">
			<span class="informacion"><?=$mensajes?></span>
			<input class="form_submit" type="submit" value="Submit">
		</form>
	</div>
	<div class="table-div">	
		<table class="tabla">
			<tr>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Teléfono</th>
			</tr>
			<?php foreach($_SESSION['data'] as $item): ?>
				<tr>
					<td><?= $item['nombre'] ?></td>
					<td><?= $item['apellidos'] ?></td>
					<td><?= $item['telefono'] ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>
</html>