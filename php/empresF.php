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
			return true;
		}else{
			return false;
			die("<br>Error al ingresar: $dml Error: " . $conexion->connect_error);
		}

	}

	
	function eliminarEmpresa($conexion, $rut){

		$dml = "DELETE FROM empresa WHERE Rut =".$rut;
		if ($conexion->query($dml) === TRUE){
			return true;
		}else{
			return false;
			die("Error al eliminar: $dml. Error: " . $conexion->connect_error);
		}		
	}
	function eliminarPDE($conexion, $rut)
	{   
		$dml = "DELETE FROM producto WHERE Rut =".$rut;
		if ($conexion->query($dml) === TRUE){
			return true;
		}else{
			return false;
			die("Error al eliminar: $dml. Error: " . $conexion->connect_error);
		}
	}

	function modificarEmpresa($conexion, $empresa){
	
		$dml = "UPDATE empresa set Rut = ". $empresa["rut"];
		$dml .= ", Nomempresa = '" . $empresa ["nomempresa"];
		$dml .= "', Email = '" . $empresa ["email"];
		$dml .= "', Direccion = '" . $empresa ["direccion"];
		$dml .= "', Telefono = " . $empresa ["telefono"];
		$dml .= ", Contrasena = UPPER(SHA1(UNHEX(SHA1('" . $empresa ["contraseña"];
		$dml .= "'))))   WHERE Rut = " . $empresa ["rut"];


		if ($conexion->query($dml) === TRUE){
			//Es exactamente igual a TRUE
			return true;
		}else{
			return false;
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
	function obtenerusuarioRut($conexion, $Rut){
		$sql = "SELECT * FROM empresa WHERE Rut='".$Rut. "'";
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
	//* funcion para verificar gmail
function VerificarEmail($conexion, $email){
    //* SQL: SELECT * FROM tabla
    $sql = "SELECT * FROM empresa WHERE Email='".$email . "'";
	
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
	function cambiarCarpetaEmpresa($carpetaName, $carpetaNameN){
		if (file_exists($carpetaName)){
			if (rename($carpetaName, $carpetaNameN)) {
				return true;
			}else{
				return false;
			}
			
		}else{
		mkdir($carpetaName, 0777);
		if (file_exists($carpetaName)){
			echo "<br>se creo $carpetaName<br>";
		}else {
			echo "fallo";
		}
	}
	}
	function eliminarCarpetaEmpresa($carpetaE){
		if (file_exists($carpetaE)){
			$carpeta = @scandir($carpetaE);

			if (count($carpeta) > 2){
				$path=$carpetaE;
				if (PHP_OS === 'Windows' or PHP_OS === 'WINNT' or PHP_OS === 'WIN32')
				{
    				exec("rd /s /q {$path}");
				}else if(PHP_OS=== 'Unix' or PHP_OS === 'Linux'){
    				exec("rm -rf {$path}");
				}
				if (file_exists($carpetaE)){
					return true;
				}else{
					return false;
				}

			  }else{
				if (rmdir ($carpetaE)){
					return true;
				}else{
					return false;
				}
				
			  }
		}else{
			return true;
	}
	}
?>