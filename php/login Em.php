<?php
include("conexion.php");
include("empresF.php");
if (isset($_POST['email'] ) && isset($_POST['cont'] )) {
	# code...
	$conexion = abrirConexion();
	$email = $_POST['email'];
	$contra = $_POST['cont'];
	$fila = Verificarempresa($conexion, $email, $contra);
	
	if ($fila == true) {
		header('Location: ../perfil1E.php');
		session_start();//iniciando 
		$_SESSION['emailE'] = $email;
	}else{
		echo $fila;
		
		
	}
	
	cerrarConexion($conexion);
}
?>