<?php

include("conexion.php");
include("UserF.php");
include("productF.php");
session_start();
$conexion = abrirConexion();


$email=$_SESSION['email'];
$Udatos=obtenerusuarioE($conexion, $email);
echo "<h1 class = 'text-center'>Datos:</h1>";
echo "<div class = 'col-sm-10'>";

echo "<h3>Nombre: ".$Udatos['Nombre']." ".$Udatos['Apellido']."</h3>";
echo "</div>";
echo "<div class = 'col-sm-2'>";
echo "<h4>Correo:</h4>";
echo "<h5>".$Udatos['Email']."</h5>";
echo "</div>";
echo "<div class = 'col-sm-10'>";
echo "<h4>Direccion:</h4>";
echo "<h5>".$Udatos['Direccion']."<h3>";
echo "</div>";
echo "<br>";
echo "<h2>Lista de Pickups:</h2>";
$resultado=obtenerPickup($conexion);
while ($lisa = $resultado->fetch_assoc()){
    echo "<div class=\"form-check\">";
    echo "<input class=\"form-check-input\" type=\"radio\" name=\"pickup\" value =\"".$lisa['IdPickup']."\">";
    echo "<label class=\"form-check-label\">";
    echo $lisa['NomPickup'].' - '.$lisa['Direccion'];
    echo "</label>";
    echo "</div>";

}
echo "<br>";
echo "<div class=\"Esp d-grid gap-2\">";
echo "<button class =\"btn btn-success btn-lg\" type = 'submit'>comprar</button>";
echo "</div>";
?>