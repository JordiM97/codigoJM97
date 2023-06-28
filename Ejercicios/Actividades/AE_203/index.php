<?php

	$suma = $resta = $valor1 = $valor2 = $valor3 = $valor4 = $valor5 = $valor6 = $valor7 = $valor8 = $valor9 = $valor10 = $valor11 = $valor12 = $valor13 = $valor14 = $numRandom = $numMayor = $numMenor = $resultadoOp = 0;
	$letra = $cadena1 = $cadena2 = $cadenas = null;
	$resultado[0] = $resultado[1] = $resultado[2] = 0;

	if ($_POST)
	{
		switch ($_POST) {
		case isset($_POST['suma']):
			$valor1 = $_POST['numeroSuma1'];
			$valor2 = $_POST['numeroSuma2'];
			$suma = suma($valor1, $valor2);
		break;
		case isset($_POST['resta']):
			$valor3 = $_POST['numeroResta1'];
			$valor4 = $_POST['numeroResta2'];
			$resta = resta($valor3, $valor4);
		break;
		case isset($_POST['comparaMayor']):
			$valor5 = $_POST['compararMayor1'];
			$valor6 = $_POST['compararMayor2'];
			$numMayor = comparaMayor($valor5, $valor6);
		break;
		case isset($_POST['comparaMenor']):
			$valor7 = $_POST['compararMenor1'];
			$valor8 = $_POST['compararMenor2'];
			$numMenor = comparaMenor($valor7, $valor8);
		break;
		case isset($_POST['opera']):
			$valor9 = $_POST['operaNum1'];
			$valor10 = $_POST['operaNum2'];
			$letra = $_POST['operaLetra'];
			$resultadoOp = opera($valor9, $valor10, $letra);
		break;
		case isset($_POST['numRandom']):
			$valor11 = $_POST['randomNum1'];
			$valor12 = $_POST['randomNum2'];
			$numRandom = numAleatorio($valor11, $valor12);
		break;
		case isset($_POST['cadenaIgual']):
			$cadena1 = $_POST['cadenaIgual1'];
			$cadena2 = $_POST['cadenaIgual2'];
			$cadenas = comparaCadena($cadena1, $cadena2);
		break;
		case isset($_POST['sumaRestaMultiplicacion']):
			$valor13 = $_POST['sumaRestaM1'];
			$valor14 = $_POST['sumaRestaM2'];
			$resultado = sumaRestaMultiplicacion($valor13, $valor14, $resultado);
		break;
	}
	}

	function suma($valor1, $valor2)
	{
		return $valor1 + $valor2;
	}

	function resta($valor3, $valor4)
	{
		return $valor3 - $valor4;
	}

	function multiplicacion($a, $b)
	{
		return $a * $b;
	}

	function sumaRestaMultiplicacion($a, $b, $resultado)
	{
		$resultado[0] = suma($a, $b);
		$resultado[1] = resta($a, $b);
		$resultado[2] = multiplicacion($a, $b);
		return $resultado;
	}

	function comparaMayor($valor5, $valor6)
	{
		if ($valor5 > $valor6)
		{
			return $valor5;
		}
		else if ($valor5 < $valor6)
		{
			return $valor6;
		}
		else
		{
			return $valor5;
		}
	}

	function comparaMenor($valor7, $valor8)
	{
		if ($valor7 < $valor8)
		{
			return $valor7;
		}
		else if ($valor7 > $valor8)
		{
			return $valor8;
		}
		else
		{
			return $valor8;
		}
	}

	function opera($valor9, $valor10, $letra)
	{
		if ($letra == "s")
		{
			return $valor9 + $valor10;
		}
		else if ($letra == "r")
		{
			return $valor9 - $valor10;
		}
	}

	function numAleatorio($valor11, $valor12)
	{
		return rand($valor11, $valor12);
	}

	function comparaCadena($cadena1, $cadena2)
	{
		if ($cadena1 === $cadena2)
		{
			return "Son iguales";
		}
		else if ($cadena1 != $cadena2)
		{
			return "No son iguales";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/lstyles.css">
	<title>AE_203</title>
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
	<div class="mainDiv">
		<div>
			<form class="formularios" action="#" method="post">
				<input class="form_input" type="number" name="numeroSuma1" value='<?=$valor1?>'>
				+
				<input class="form_input" type="number" name="numeroSuma2" value='<?=$valor2?>'>	
				=
				<output><?=$suma?></output><br><br>
				<input type="submit" name="suma" value="Sumar">
			</form>
		</div>
		<div>
			<form class="formularios" action="#" method="post">
				<input class="form_input" type="number" name="numeroResta1" value='<?=$valor3?>'>
				-
				<input class="form_input" type="number" name="numeroResta2" value='<?=$valor4?>'>	
				=
				<output><?=$resta?></output><br><br>
				<input type="submit" name="resta" value="Restar">
			</form>
		</div>
		<div>
			<form class="formularios" action="#" method="post">
				<input class="form_input" type="number" name="compararMayor1" value='<?=$valor5?>'>
				< >
				<input class="form_input" type="number" name="compararMayor2" value='<?=$valor6?>'>	
				=
				<output><?=$numMayor?></output><br><br>
				<input type="submit" name="comparaMayor" value="Comparar Mayor">
			</form>
		</div>
		<div>
			<form class="formularios" action="#" method="post">
				<input class="form_input" type="number" name="compararMenor1" value='<?=$valor7?>'>
				> <
				<input class="form_input" type="number" name="compararMenor2" value='<?=$valor8?>'>	
				=
				<output><?=$numMenor?></output><br><br>
				<input type="submit" name="comparaMenor" value="Comparar Menor">
			</form>
		</div>
		<div>
			<form class="formularios" action="#" method="post">
				<input class="form_input" type="number" name="operaNum1" value='<?=$valor9?>'>
				<input class="form_input" type="number" name="operaNum2" value='<?=$valor10?>'>	
				<input class="form_input" type="text" name="operaLetra" value='<?=$letra?>' placeholder="letra">
				=	
				<output><?=$resultadoOp?></output><br><br>
				<input type="submit" name="opera" value="Sumar o Restar">
			</form>
		</div>
		<div>
			<form class="formularios" action="#" method="post">
				<input class="form_input" type="number" name="randomNum1" value='<?=$valor11?>'>
				<input class="form_input" type="number" name="randomNum2" value='<?=$valor12?>'>
				=	
				<output><?=$numRandom?></output><br><br>
				<input type="submit" name="numRandom" value="Randomizar">
			</form>
		</div>
		<div>
			<form class="formularios" action="#" method="post">
				<input class="form_input" type="texto" name="cadenaIgual1" value='<?=$cadena1?>' placeholder="Cadena 1">
				<input class="form_input" type="texto" name="cadenaIgual2" value='<?=$cadena2?>' placeholder="Cadena 2">
				=	
				<output><?=$cadenas?></output><br><br>
				<input type="submit" name="cadenaIgual" value="Comparar">
			</form>
		</div>
		<div>
			<form class="formularios" action="#" method="post">
				<input class="form_input" type="number" name="sumaRestaM1" value='<?=$valor13?>'>
				<input class="form_input" type="number" name="sumaRestaM2" value='<?=$valor14?>'>
				=	
				<output><?=$resultado[0]?></output>
				<output><?=$resultado[1]?></output>
				<output><?=$resultado[2]?></output><br><br>
				<input type="submit" name="sumaRestaMultiplicacion" value="Operar">
			</form>
		</div>	
	</div>
</body>
</html>