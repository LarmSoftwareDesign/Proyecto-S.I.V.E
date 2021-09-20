<?php
include("conexion.php");
include("UserF.php");
$conexion = abrirConexion();
if (isset($_POST['email'] ) && isset($_POST['cont'] )) {
	# code...	
	$email = $_POST['email'];
	$contra = $_POST['cont'];
	$fila = VerificarUsuarios($conexion, $email, $contra);
	session_start();//iniciando 
		$_SESSION['email'] = $email;
		
	if ($fila == false) {
		echo "error";
	}else{
		
		header('Location: ../perfil.php');
	}
	
	cerrarConexion($conexion);
}
?>