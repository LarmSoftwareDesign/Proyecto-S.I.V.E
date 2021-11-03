<?php

include("conexion.php");
include("UserF.php");
include("productF.php");
session_start();
$conexion = abrirConexion();


$email=$_SESSION['email'];
$Udatos=obtenerusuarioE($conexion, $email);
echo "<div class = 'col-sm-4'>";
echo "<h4>Correo:</h4>";
echo "<h5>".$Udatos['Email']."</h5>";
echo "</div>";
echo "<div class = 'col-sm-4'>";
echo "<h4>Direccion:</h4>";
echo "<h5>".$Udatos['Direccion']."<h3>";
echo "</div>";

?>