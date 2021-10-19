<?php

	//! Funciones sobre la empresa

	function ingresarEmpresa($conexion, $empresa){
		
		$dml = "INSERT INTO empresa (Rut, Nomempresa, Email, Direccion, Telefono, Contrasena)";
		$dml .= " VALUES (" . $empresa["rut"];
		$dml .= ",'" . $empresa["nomempresa"];
		$dml .= "','" . $empresa["email"];
		$dml .= "','" . $empresa["direccion"];
		$dml .= "'," . $empresa["telefono"];
		$dml .= ", PASSWORD('" . $empresa["contraseña"] . "'))";
		
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
	
		$dml = "UPDATE empresa set rut = ". $empresa["rut"];
		$dml .= ", nomempresa = '" . $empresa ["nomempresa"];
		$dml .= "', email = '" . $empresa ["email"];
		$dml .= "', direccion = '" . $empresa ["direccion"];
		$dml .= "', telefono = " . $empresa ["telefono"];
		$dml .= ", contraseña = " . $empresa ["contraseña"];
		$dml .= "   WHERE rut = " . $empresa ["rut"];


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
		$sql .= " AND contra = PASSWORD('". $contra . "')";
		$resultado = $conexion->query($sql);
	
		if ( $resultado){ 
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
	function obtenerempresa($conexion, $EMAIL ){
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
?>