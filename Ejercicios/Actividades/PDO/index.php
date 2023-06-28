<?php

$nombre = 'Pedro';
$telefono = 654943853;

$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=basededatos", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully <br>";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


// Mostrar todos los elementos de la tabla usuario
$stmt = $conn->prepare("SELECT * FROM usuario");
$stmt->execute();

$rows = $stmt -> fetchALL(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
    foreach ($row as $column => $value) {
        echo $column . ": " . $value . "<br>";
    }
    echo "<br>";
}

//$result = $stmt->fetch(PDO::FETCH_ASSOC);

/*
// Crear un campo nuevo en la tabla usuario
$sql = "INSERT INTO usuario (nombre, telefono) VALUES (?,?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$nombre, $telefono]);
*/


echo '<pre>';
print_r($rows);
echo '</pre>';


?>