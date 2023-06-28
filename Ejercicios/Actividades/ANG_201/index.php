<?php

	$noches = $destino = $mensaje = $mensajeError = $coche = $costeDestino = $costeTotal = null;
	$CosteNoche = 60;
	$CosteCoche = 40;
	$CosteMadrid = 150;
	$CosteParis = 250;
	$CosteLosAngeles = 450;
	$CosteRoma = 200;

	if($_POST)
	{
		$noches = $_POST['noches'];
		$destino = $_POST['destino'];
		$coche = $_POST['coche'];
		if ($_POST['noches'] and $_POST['destino'] and $_POST['coche'])
		{
			$costeDestino = calculoDestino($destino, $costeDestino, $CosteMadrid, $CosteParis, $CosteLosAngeles, $CosteRoma);
			$costeTotal = sumaCoste($noches, $costeDestino, $coche, $CosteNoche, $CosteCoche);
			$mensaje = "Tu viaje costara $costeTotal";
		}
		else
		{
			$mensajeError = "Rellene todos los campos, por favor.";
		}
	}

	function sumaCoste($noches, $destino, $coche, $CosteNo, $CosteCo)
	{
		if ($coche < 3)
		{
			$costeTotal = ($CosteNo * $noches) + ($CosteCo * $coche) + $destino;
			return $costeTotal;
		}
		else if ($coche >= 3 and $coche < 7)
		{
			$costeTotal = (($CosteNo * $noches) + ($CosteCo * $coche) - 20) + $destino;
			return $costeTotal;
		}
		else if ($coche >= 7)
		{
			$costeTotal = (($CosteNo * $noches) + ($CosteCo * $coche) - 50) + $destino;
			return $costeTotal;
		}

	}

	function calculoDestino($destino, $costeDestino, $CosteM, $CosteP, $CosteLA, $CosteR)
	{
		if ($destino === 'Madrid')
		{
			$costeDestino = $CosteM;
		}
		else if ($destino === 'Paris')
		{
			$costeDestino = $CosteP;
		}
		else if ($destino === 'LosAngeles')
		{
			$costeDestino = $CosteLA;
		}
		else if ($destino === 'Roma')
		{
			$costeDestino = $CosteR;
		}
		return $costeDestino;
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/lstyles.css">
	<title>Formulario - ANG201</title>
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
		<h1 class="form_title">Mis Vacaciones</h1>
		<label for="noches" class="label">Número de noches:</label>
		<input class="form_input" type="number" name="noches" placeholder="Ingresa el número de noches" value="<?=$noches?>">

		<label for="destino" class="label">Destino:</label>
		<select class="selector" name="destino" value="<?=$destino?>">
  			<option value="Roma">Roma</option>
  			<option value="Madrid">Madrid</option>
  			<option value="Paris">Paris</option>
  			<option value="LosAngeles">Los Angeles</option>
		</select>

		<label for="coche" class="label">Días alquiler coche:</label>
		<input class="form_input" type="number" name="coche" placeholder="Días alquiler de coche" value="<?=$coche?>">
		<br>

		

		<input class="form_submit" type="submit" value="Submit">
		<p class="informacionErronea"><?=$mensajeError?></p>

		<label for="costeTotal" class="label">Coste total:</label>
		<output class="form_output" name="costeTotal"><span class="costeTotal"><?=$costeTotal . "€"?></span></output>

	</form>
</div>
<datalist id="destinos">
	<option value="Roma">
	<option value="Madrid">
	<option value="Paris">
	<option value="Los Angeles">
</datalist>
</body>
</html>
