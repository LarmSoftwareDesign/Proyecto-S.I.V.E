<?php

	//! Funciones sobre la empresa

	function ingresarEmpresa($conexion, $empresa){
		
		$dml = "INSERT INTO empresa (Rut, Nomempresa, Email, Direccion, Telefono, Contrasena)";
		$dml .= " VALUES (" . $empresa["rut"];
		$dml .= ",'" . $empresa["nomempresa"];
		$dml .= "','" . $empresa["email"];
		$dml .= "','" . $empresa["direccion"];
		$dml .= "'," . $empresa["telefono"];
		$dml .= ", UPPER(SHA1(UNHEX(SHA1('" . $empresa["contraseña"] . "')))))";
		
		if ($conexion->query($dml) === TRUE){
			echo "Empresa ingresada";
		}else{
			die("<br>Error al ingresar: $dml Error: " . $conexion->connect_error);
		}

	}

	function eliminarEmpresa($conexion, $rut){

		$dml = "DELETE FROM empresa WHERE rut = " . $rut;
		
		if ($conexion->query($dml) === TRUE){
			echo "Empresa eliminada";
		}else{
			die("Error al eliminar: $dml. Error: " . $conexion->connect_error);
		}		
	}

	function modificarEmpresa($conexion, $empresa){
	
		$dml = "UPDATE empresa set Rut = ". $empresa["rut"];
		$dml .= ", Nomempresa = '" . $empresa ["nomempresa"];
		$dml .= "', Email = '" . $empresa ["email"];
		$dml .= "', Direccion = '" . $empresa ["direccion"];
		$dml .= "', Telefono = " . $empresa ["telefono"];
		$dml .= ", Contraseña = " . $empresa ["contraseña"];
		$dml .= "   WHERE Rut = " . $empresa ["rut"];


		if ($conexion->query($dml) === TRUE){
			//Es exactamente igual a TRUE
			echo "Empresa modificada";
		}else{
			die("Error al modificar: $dml. Error: " . $conexion->connect_error);
		}		
	}

	function VerificarEmpresa($conexion, $email, $contra){
		//SQL: SELECT * FROM tabla
		$sql = "SELECT * FROM empresa WHERE Email='".$email . "'";
		$sql .= " AND Contrasena = UPPER(SHA1(UNHEX(SHA1(\"". $contra ."\"))))";
		$resultado = $conexion->query($sql);
	
		if ($resultado){ 
			if($resultado->num_rows > 0){
			
				return true;
			}else{
				return false;
			}
			
		}else{
			$ls ="Error in ".$resultado."<br>".$conexion->error;
		   return $ls;
			
		}
	}
	function obtenerempresaE($conexion, $EMAIL ){
		$sql = "SELECT * FROM empresa WHERE Email='".$EMAIL . "'";
		$resultado = $conexion->query($sql);
	
		if ( $resultado){ 
			if($resultado->num_rows > 0){
				$fila = $resultado->fetch_assoc();
			   
				return $fila;
	
			}else{
				return false;
			}
			
		}else{
			$ls ="Error in ".$resultado."<br>".$conexion->error;
		   return $ls;
			
		}
	}
	function crearCarpetaEmpresa($carpetaE){
		if (file_exists($carpetaE)){
			echo "<br>la carpeta $carpetaE existe<br>";
		}else{
		mkdir($carpetaE, 0777);
		if (file_exists($carpetaE)){
			echo "<br>se creo $carpetaE <br>";
		}else {
			echo "falló";
		}
	}
	}
?>