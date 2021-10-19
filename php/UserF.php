<?php

//todo Funciones sobre el usuario


//* funcion de ingreso de usuario

function ingresarUsuario($conexion, $usuario){
		
    $dml = "INSERT INTO usuario (Ci, Nombre, Apellido, Contraseña, Fnac, Email , Direccion, Es)";
    $dml .= " VALUES ( ". $usuario["ci"];
    $dml .= ",'" . $usuario["nombre"];
    $dml .= "','" . $usuario["apellido"];
    $dml .= "',password('" . $usuario["contraseña"];
    $dml .= "'),'" . $usuario["fnac"];
    $dml .= "','" . $usuario["email"];
    $dml .= "','" . $usuario["direccion"];
    $dml .= "','" . $usuario["es"] . "')";
    
    if ($conexion->query($dml) === TRUE){
        echo "Usuario ingresado";
      
    }else{
        die("Error al ingresar: $dml. Error: " . $conexion->connect_error);
    }

}

//! funcion para eliminar usuario

function eliminarUsuario($conexion, $ci){
    $dml = "DELETE FROM usuario WHERE ci = " . $ci;
    
    if ($conexion->query($dml) === TRUE){
        echo "Usuario eliminado";
    }else{
        die("Error al eliminar: $dml. Error: " . $conexion->connect_error);
    }		
}


//* modificar un perfil de un usuario
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

//? funcion para verificar un usuario
function VerificarUsuarios($conexion, $email, $contra){
    //* SQL: SELECT * FROM tabla
    $sql = "SELECT * FROM usuarios WHERE Email='".$email . "'";
	$sql .= " AND Contraseña = PASSWORD ('". $contra . "') ";
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
//todo funcion obtener los datos de un usuario
function obtenerusuario($conexion, $EMAIL ){
    $sql = "SELECT * FROM usuario WHERE Email='".$EMAIL . "'";
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
