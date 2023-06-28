<?php
//Creando un nuevo objeto de la clase coche
$coche1 = new Coche();
$coche1 -> color = "Azul";
$coche1 -> marca = "Toyota";
$coche1 -> modelo = "Corolla";
$coche1 -> velocidad = 0;

//Usamos los métodos de coche y comprobamos los resultados
echo "Velocidad antes de acelerar: " . $coche1 -> velocidad . "<br>";
$coche1 -> acelerar();
echo "Velocidad después de acelerar: " . $coche1 -> velocidad . "<br>";

echo "Velocidad antes de frenar: " . $coche1 -> velocidad . "<br>";
$coche1 -> frenar();
echo "Velocidad después de frenar: " . $coche1 -> velocidad . "<br>";

echo "Velocidad antes de frenar: " . $coche1 -> velocidad . "<br>";
$coche1 -> frenar();
echo "Velocidad después de frenar: " . $coche1 -> velocidad . "<br>";

echo "Color del coche antes de pintarlo: " . $coche1 -> color . "<br>";
$coche1 -> pintar("Rojo");
echo "Color del coche después de pintarlo: " . $coche1 -> color . "<br>";

//Creamos el objeto coche
class Coche 
{
  //Atributos
  public $color;
  public $marca;
  public $modelo;
  public $velocidad = 0;

  //Métodos
  public function acelerar()
  {
    $this -> velocidad += 10;
  }

  public function frenar()
  {
    if ($this -> velocidad > 1)
    {
      $this -> velocidad -=10;
      if ($this -> velocidad < 0)
      {
        $this -> velocidad = 0;
      }
    }
  }

  public function pintar($nuevoColor)
  {
    $this -> color = $nuevoColor;
  }
}
?>