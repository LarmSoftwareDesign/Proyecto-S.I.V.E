<?php
	
	// ? Definimos constantes para almacenar los datos de la conexión
	define('SERVIDOR', "192.168.2.195");
	define('USUARIO', "alando");
	define('CONTRA', "257902Yita04");
	define('BD', "larmsoftwaredesign");

	function abrirConexion(){
		// Crear una nueva conexión
		$conexion = new mysqli(SERVIDOR, USUARIO, CONTRA, BD);

		// Verificar el estado de la conexión
		if ($conexion->connect_error){
			die("Error en la conexión con la BD: " . $conexion->connect_error);
		}
		echo "Conexión realizada con éxito!";
		return $conexion;
	}
	//! cerrar conexion
	function cerrarConexion($conexion){
		$conexion->close();
	}

	



?>