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
		
		if (isset($_POST["ci"])){
			$usuario["email"] = $_POST["email"];
			$usuario["nombre"] = $_POST["nombre"];
			$usuario["apellido"] = $_POST["apellido"];
            //! pasar de string a int
			$usuario["ci"] = intval($_POST["ci"]);
			$usuario["fnac"] = $_POST["fnac"];
			$usuario["direccion"] = $_POST["direccion"];
			$usuario["contraseña"] = $_POST["cont"];
			$usuario["verificarC"] = $_POST["ver"];
            $usuario["es"] = 'Cliente';
			
            //! verificar contraseña
            if (strcmp ($usuario["contraseña"] , $usuario["verificarC"] ) == 0) {
                ingresarUsuario($conexion, $usuario);
				//? a perfil
				header('Location:..\login.html');
                
            }elseif (strcmp($usuario["contraseña"] , $usuario["verificarC"] ) != 0) {
				header('Location: ..\register.html');
			}
            


		}
		cerrarConexion($conexion);
	?>

</body>
</html>