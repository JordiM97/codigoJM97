<?php

	$nombre = $apellidos = $mensajes = $telefono = $contraseña = null;

	if($_POST)
	{
		if($_POST['nombre'] and $_POST['apellidos'] and $_POST['telefono'] and $_POST['contraseña'])
		{
			$nombre = $_POST['nombre'];
			$apellidos = $_POST['apellidos'];
			$telefono = $_POST['telefono'];
			$contraseña = $_POST['contraseña'];
			echo multiplicación($telefono);
			$telefono = multiplicación($telefono);
			$mensajes = "¡Hola $nombre $apellidos!<br>Tus datos se han recibido correctamente.<br>Recibirás un mensaje en el número: $telefono";
		}
		else
		{
			$mensajes = "Nombre, apellidos, teléfono y contraseña obligatorios.";
		}
	}

	function multiplicación($num)
	{
		return $num * $num;
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/lstyles.css">
	<title>Formulario - AG201</title>
	<style type="text/css">
		input::-webkit-outer-spin-button, input::-webkit-inner-spin-button
    	{
        	display: none;
      	}
      	input[type=number]
      	{
    		-moz-appearance:textfield;
		}
	</style>
</head>
<body>
<div class="main-container">
	<form class="formularios" action="#" method="post">
		<h1 class="form_title">Datos personales</h1>
		<input class="form_input" type="text" name="nombre" placeholder="Ingresa tu nombre">
		<input class="form_input" type="text" name="apellidos" placeholder="Ingresa tus apellidos">
		<input class="form_input" type="number" name="telefono" placeholder="Ingresa tu número de teléfono">
		<input class="form_input" type="password" name="contraseña" placeholder="Ingresa tu contraseña">
		<span class="informacion"><?=$mensajes?></span>
		<input class="form_submit" type="submit" value="Submit">
	</form>
</div>
</body>
</html>
