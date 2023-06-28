<?php 

session_start();

include("services/conexion.php");

$ruta = "sections/pregunta1.php";
$error = null;

if(isset($_POST["botonSeguent1"]))
{
	if(isset($_POST["respuesta1"]) and $_POST["respuesta1"] != null)
	{
		$ruta = $_POST['rutaSiguiente'];
		$_SESSION['respuesta1'] = $_POST['respuesta1'];
	}
	else
	{
		$error = "Por favor, elija una opción.";
	}
}
else if(isset($_POST["botonSeguent2"]))
{
	if(isset($_POST["respuesta2"]) and $_POST["respuesta2"] != null)
	{
		$ruta = $_POST['rutaSiguiente'];
		$_SESSION['respuesta2'] = $_POST['respuesta2'];
	}
	else
	{
		$error = "Por favor, rellene el campo.";
		$ruta = "sections/pregunta2.php";
	}
}
else if(isset($_POST["botonSeguent3"]))
{
	if(isset($_POST["respuesta3"]) and $_POST["respuesta3"] != null)
	{
		$ruta = $_POST['rutaSiguiente'];
		$_SESSION['respuesta3'] = $_POST['respuesta3'];
	}
	else
	{
		$error = "Por favor, elija una opción.";
		$ruta = "sections/pregunta3.php";
	}
}

if(isset($_POST["botonAnterior2"]))
{
	$ruta = $_POST['rutaAnterior'];
}
else if(isset($_POST["botonAnterior3"]))
{
	$ruta = $_POST['rutaAnterior'];
}
else if(isset($_POST["botonAnterior4"]))
{
	$ruta = $_POST['rutaAnterior'];
}

if(isset($_POST["final"]))
{
	if(isset($_POST["respuesta4"]) and $_POST["respuesta4"] != null)
	{
		$ruta = $_POST['rutaSiguiente'];
		$_SESSION['respuesta4'] = $_POST['respuesta4'];
		$respuesta1 = $_SESSION['respuesta1'];
		$respuesta2 = $_SESSION['respuesta2'];
		$respuesta3 = $_SESSION['respuesta3'];
		$respuesta4 = $_SESSION['respuesta4'];
		$sql = "INSERT INTO cuestionario (respuesta1, respuesta2, respuesta3, respuesta4) VALUES (?, ?, ?, ?)";
		$stmnt = $conn -> prepare($sql);
		$stmnt -> execute([$respuesta1, $respuesta2, $respuesta3, $respuesta4]);
		session_destroy();
	}
	else
	{
		$error = "Por favor, rellene el campo.";
		$ruta = "sections/pregunta4.php";
	}
}

/*echo '<pre>';
print_r($_POST);
print_r($_SESSION);
echo '</pre>';*/

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Alatsi&display=swap" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet" />
	<link href="./assets/css/main.css" rel="stylesheet" />
	<title>Enquesta de Satisfacció</title>
</head>
<body>
	<div class="v3_91">
		<div class="v3_92"></div>
		<div class="v3_122">
			<div class="v3_123"></div>
			<span class="v3_124">Barcelona, 2023</span>
		</div>
		<div class="v3_93"></div>
		<span class="v3_94">ENQUESTA DE SATISFACCIÓ</span>

		<?php include($ruta);?>
		<span class="mensajeError"><?= $error?></span>
	</div>
</body>
</html>