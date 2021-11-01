<?php
include("Conexion.php");

//Funciones sobre el usuario

	function ingresarUsuario($conexion, $usuario){
		
		$dml = "INSERT INTO usuario (ci,nombre,apellido,contraseña,fnac,email,direccion,idpago)";
		$dml .= " VALUES (" . $usuario["ci"];
		$dml .= ",'" . $usuario["nombre"];
		$dml .= "','" . $usuario["apellido"];
		$dml .= "','" . $usuario["contraseña"];
		$dml .= "','" . $usuario["fnac"];
		$dml .= "','" . $usuario["email"];
		$dml .= "','" . $usuario["direccion"];
		$dml .= "'," . $usuario["idpago"] . ")";
		
		if ($conexion->query($dml) === TRUE){
			echo "Usuario ingresado";
		}else{
			die("Error al ingresar: $dml. Error: " . $conexion->connect_error);
		}

	}

	function eliminarUsuario($conexion, $ci){
		$dml = "DELETE FROM usuario WHERE ci = " . $ci;
		
		if ($conexion->query($dml) === TRUE){
			echo "Usuario eliminado";
		}else{
			die("Error al eliminar: $dml. Error: " . $conexion->connect_error);
		}		
	}

	function modificarUsuario($conexion, $usuario){
	
		$dml = "UPDATE usuario set ci = ". $usuario["ci"];
		$dml .= ", nombre = '" . $usuario ["nombre"];
		$dml .= "', apellido = '" . $usuario ["apellido"];
		$dml .= "', contraseña = '" . $usuario ["contraseña"];
		$dml .= "', fnac = '" . $usuario ["fnac"];
		$dml .= "', email = '" . $usuario ["email"];
		$dml .= "', direccion '= " . $usuario ["direccion"];
		$dml .= "'   WHERE ci = " . $usuario ["ci"];


		if ($conexion->query($dml) === TRUE){
			echo "Usuario modificado";
		}else{
			die("Error al modificar: $dml. Error: " . $conexion->connect_error);
		}		
	}

?>