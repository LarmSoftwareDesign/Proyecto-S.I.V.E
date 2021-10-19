<?php
include("conexion.php");
include("empresF.php");
if (isset($_POST['email'] ) && isset($_POST['cont'] )) {
	# code...
	$conexion = abrirConexion();
	$email = $_POST['email'];
	$contra = $_POST['cont'];
	$fila = Verificarempresa($conexion, $email, $contra);
	
	if ($fila == false) {
		echo "error";
		
		header('Location: ../login Em.html');
		}else{
		
		header('Location: ../perfil1E.php');
		session_start();//iniciando 
		$_SESSION['emailE'] = $email;
		
	}
	
	cerrarConexion($conexion);
}
?>