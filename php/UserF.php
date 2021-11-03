<?php

//todo Funciones sobre el usuario


//* funcion de ingreso de usuario

function ingresarUsuario($conexion, $usuario){
		
    $dml = "INSERT INTO usuario (Ci, Nombre, Apellido, Contrasena, Fnac, Email , Direccion, Es)";
    $dml .= " VALUES ( ". $usuario["ci"];
    $dml .= ",'" . $usuario["nombre"];
    $dml .= "','" . $usuario["apellido"];
    $dml .= "',UPPER(SHA1(UNHEX(SHA1('" . $usuario["contraseña"];
    $dml .= "')))),'" . $usuario["fnac"];
    $dml .= "','" . $usuario["email"];
    $dml .= "','" . $usuario["direccion"];
    $dml .= "','" . $usuario["es"] . "')";
    
    if ($conexion->query($dml) === TRUE){
        return true;
      
    }else{
        return false;
        die("Error al ingresar: $dml. Error: " . $conexion->connect_error);
        
    }

}

//* funcion para eliminar usuario

function eliminarUsuario($conexion, $ci){
    $dml = "DELETE FROM usuario WHERE Ci = ". $ci;
    
    if ($conexion->query($dml) === TRUE){
        return true;
    }else{
        return false;
        die("Error al eliminar: $dml. Error: " . $conexion->connect_error);
    }		
}

//* funcion para eliminar 
function eliminarComprasUsuario($conexion, $ci){
    $dml = "DELETE from compra WHERE Ci=". $ci;
    
    if ($conexion->query($dml) === TRUE){
        return true;
    }else{
        return false;
        die("Error al eliminar: $dml. Error: " . $conexion->connect_error);
    }		
}

function eliminarEncargos($conexion, $numC){
    $dml = "DELETE FROM compra WHERE Numcompra = ". $numC;
    
    if ($conexion->query($dml) === TRUE){
        return true;
    }else{
        return false;
        die("Error al eliminar: $dml. Error: " . $conexion->connect_error);
    }		
}


//* modificar un perfil de un usuario
function modificarUsuario($conexion, $usuario){

    $dml = "UPDATE usuario set Nombre = '" . $usuario ["nombre"];
    $dml .= "', Apellido = '" . $usuario ["apellido"];
    $dml .= "', Contrasena = UPPER(SHA1(UNHEX(SHA1('" . $usuario ["contraseña"];
    $dml .= "')))), Fnac = '" . $usuario ["fnac"];
    $dml .= "', Email = '" . $usuario ["email"];
    $dml .= "', Direccion = '" . $usuario ["direccion"];
    $dml .= "'   WHERE Ci = " . $usuario ["ci"];


    if ($conexion->query($dml) === TRUE){
        return true;

    }else{
        return false;
        die("Error al modificar: $dml. Error: " . $conexion->connect_error);
    }		
}

//* funcion para verificar un usuario
function VerificarUsuarios($conexion, $email, $contra){
    //* SQL: SELECT * FROM tabla
    $sql = "SELECT * FROM usuario WHERE Email='".$email . "'";
	$sql .= " AND Contrasena = UPPER(SHA1(UNHEX(SHA1(\"". $contra ."\"))))";
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
//* funcion obtener los datos de un usuario
function obtenerusuarioE($conexion, $EMAIL ){
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

function obtenerPickup($conexion ){
    $sql = "SELECT p.IdPickup IdPickup, NomPickup, Direccion, Horario_abre, Horario_cierra FROM pickup p join horario_pickup h on p.IdPickup = h.IdPickup";
    $resultado = $conexion->query($sql);

    if ( $resultado){ 
        if($resultado->num_rows > 0){
    
            return $resultado;

        }else{
            return false;
        }
        
    }else{
        $ls ="Error in ".$resultado."<br>".$conexion->error;
       return $ls;
        
    }
}


//* calcular la edad
function obtener_edad($fecha_nacimiento)
{
    $nacimiento = new DateTime($fecha_nacimiento);
    $ahora = new DateTime(date("Y-m-d"));
    $diferencia = $ahora->diff($nacimiento);
    return $diferencia->format("%y");
}
//* obtenerusuarioCi por la cedula 
function obtenerusuarioCi($conexion, $CiO ){
    $sql = "SELECT * FROM usuario WHERE Ci='".$CiO . "'";
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
    $sql = "SELECT * FROM usuario WHERE Email='".$email . "'";
	
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
?>
