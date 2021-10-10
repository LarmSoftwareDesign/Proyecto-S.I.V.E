<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro agenda</title>
</head>
<body>
	<?php 
		include("conexion.php");
		include("UserF.php");
		$conexion = abrirConexion();
		//? si se existe el valor de la cedula fue insertada
		if (isset($_POST["ci"])){
			$usuario["email"] = $_POST["email"];
			$usuario["nombre"] = $_POST["nombre"];
			$usuario["apellido"] = $_POST["apellido"];
            //todo pasar de string a int
			$usuario["ci"] = intval($_POST["ci"]);

			$usuario["fnac"] = $_POST["fnac"];
			$usuario["direccion"] = $_POST["direccion"];
			$usuario["contraseña"] = $_POST["cont"];
			$usuario["verificarC"] = $_POST["ver"];
            $usuario["es"] = 'Cliente';
			
            //? si la contraseña y la verificacion dela contraseña son iguales  
            if (strcmp ($usuario["contraseña"] , $usuario["verificarC"] ) == 0) {

				//* se llamara la funcion ingresarUsuario para crear un usuario en la base de datos
                ingresarUsuario($conexion, $usuario);
				// a perfil
				header('Location:..\login.html');
                
            }elseif (strcmp($usuario["contraseña"] , $usuario["verificarC"] ) != 0) { 
				//! de lo contrario volvera al registro
				header('Location: ..\register.html');
			}
            


		}
		cerrarConexion($conexion);
	?>

</body>
</html>