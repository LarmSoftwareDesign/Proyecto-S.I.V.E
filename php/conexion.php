<?php
session_start();
	if (isset($_SESSION['emailE'])){
		$UsuarioDelServidor = "alando";
		$ContraseñaDelServidor ="53572256";
	}elseif(isset($_SESSION['email'])){
		$UsuarioDelServidor = "jsanchez";
		$ContraseñaDelServidor ="62617843";
	}else{
		$UsuarioDelServidor = "Lcorbo";
		$ContraseñaDelServidor ="56275346";
	}
	
	// ? Definimos constantes para almacenar los datos de la conexión
	define('SERVIDOR', "localhost");
	define('USUARIO', $UsuarioDelServidor);
	define('CONTRA', $ContraseñaDelServidor);
	define('BD', "larmsoftwaredesign");

	function abrirConexion(){
		// Crear una nueva conexión
		$conexion = new mysqli(SERVIDOR, USUARIO, CONTRA, BD);

		// Verificar el estado de la conexión
		if ($conexion->connect_error){
			die("Error en la conexión con la BD: " . $conexion->connect_error);
		}
		// echo "Conexión realizada con éxito!";
		return $conexion;
	}
	//! cerrar conexion
	function cerrarConexion($conexion){
		$conexion->close();
	}

	



?>