<?php
	session_start(); // Iniciamos la sesión, la cual guardará la información hasta que la cerremos.

	$nombre = $apellidos = $mensajes = $errores = $telefono = $email = $edad = null; 

	if(!isset($_SESSION['data'])) // Comprobamos si ya tenemos este array creado
	{
		$_SESSION['data'] = []; // Creamos un array con la sesión en el cual guardaremos información
	}

	// Comprobamos si el usuario ha entrado toda la información que se le pide y guarda la información en la variables anteriormente creadas. En el caso de no ingresar toda la información necesaria, indicará la información restante por pantalla.
	if($_POST) {
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$edad = $_POST['edad'];
		if($_POST['nombre'] and $_POST['apellidos'] and $_POST['telefono'] and $_POST['email'] and $_POST['edad'])
		{
			$mensajes = "¡Hola $nombre $apellidos!<br>Tus datos se han recibido correctamente.<br>Recibirás un mensaje en el número: $telefono";
		}
		else
		{
			$errores = comprobarErrores($_POST['nombre'], $_POST['apellidos'], $_POST['telefono'], $_POST['email'], $_POST['edad']);
		}
	}

	// Si tenemos información en estás variables, se almacenaran las mismas en una posicion del array
	if($nombre and $apellidos and $mensajes and $telefono and $email and $edad != null) 
	{
		$_SESSION['data'][] = [
		'nombre' => $nombre,
		'apellidos' => $apellidos,
		'telefono' => $telefono,
		'email' => $email,
		'edad' => $edad
		];
	}

	// Comprobamos los campos que no ha entrado el usuario y se da la información
	function comprobarErrores($eNombre, $eApellidos, $eTelefono, $eEmail, $eEdad)
	{
		$errores = null;
		if (empty($eNombre))
		{
			$errores .= "- Nombre obligatorio<br>";
		}
		if (empty($eApellidos))
		{
			$errores .= "- Apellidos obligatorios<br>";
		}
		if (empty($eTelefono))
		{
			$errores .= "- Telefono obligatorio<br>";
		}
		if (empty($eEmail))
		{
			$errores .= "- Email obligatorio<br>";
		}
		if (empty($eEdad))
		{
			$errores .= "- Edad obligatoria<br>";
		}
		return $errores;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/lstyles.css">
	<title>AE_202</title>
</head>
<body>
<div class="main-container">
	<div class="formulaio-div">
		<form class="formularios" action="#" method="post">
			<h1 class="form_title">Datos personales</h1>
			<input class="form_input" type="text" name="nombre" placeholder="Ingresa tu nombre" value="<?=$nombre?>">
			<input class="form_input" type="text" name="apellidos" placeholder="Ingresa tus apellidos" value="<?=$apellidos?>">
			<input class="form_input" type="number" name="telefono" placeholder="Ingresa tu número de teléfono" value="<?=$telefono?>">
			<input class="form_input" type="email" name="email" placeholder="Ingresa tu correo electrónico" value="<?=$email?>">
			<input class="form_input" type="number" name="edad" placeholder="Ingresa tu edad" value="<?=$edad?>">
			<span class="informacion"><?=$mensajes?></span>
			<span class="informacionError"><?=$errores?></span>
			<input class="form_submit" type="submit" value="Submit">
		</form>
	</div>
	<div class="table-div">	
		<table class="tabla">
			<tr>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Teléfono</th>
				<th>Email</th>
				<th>Edad</th>
			</tr>
			<!-- Se comprueba cada posicion del array y nos pone cada campo en una tabla -->
			<?php foreach($_SESSION['data'] as $item): ?>
				<tr>
					<td><?= $item['nombre'] ?></td>
					<td><?= $item['apellidos'] ?></td>
					<td><?= $item['telefono'] ?></td>
					<td><?= $item['email'] ?></td>
					<td><?= $item['edad'] ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>
</html>