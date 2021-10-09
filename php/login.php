<?php
include("conexion.php");
include("UserF.php");
$conexion = abrirConexion();

//? si se insertan los valores en las variables emaol y cont 
if (isset($_POST['email'] ) && isset($_POST['cont'] )) {
	

	//* se guardaran las en nuevas variables 
	$email = $_POST['email'];
	$contra = $_POST['cont'];

	//* se creara un array llamando ala funcion de verificar usuarios 
	$fila = VerificarUsuarios($conexion, $email, $contra);
	session_start();//* iniciando el sesion para una para tener una variable global 
	$_SESSION['email'] = $email; //* esta sera igual al valor de email 


	//? si el no tiene el 
	if ($fila == false) { 
		//* si la consulta fallo o no hay nadie con el correo de la variable email sera igual a false 
		//! se mostrara error
		echo "Error";
	}else{
		//* se ira la pagina perfil 
		header('Location: ../perfil.php');
	}
	
	cerrarConexion($conexion);
}
?>