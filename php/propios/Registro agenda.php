<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Agenda</title>
</head>
<body>
	<?php
		include("Conexion.php");
		$conexion = abrirConexion();
		
		if (isset($_POST["ci"])){
			$usuario["email"] = $_POST["email"];
			$usuario["nombre"] = $_POST["nombre"];
			$usuario["apellido"] = $_POST["apellido"];
			$usuario["ci"] = $_POST["ci"];
			$usuario["fnac"] = $_POST["fnac"];
			$usuario["direccion"] = $_POST["direccion"];
			$usuario["contraseña"] = $_POST["contraseña"];
			$usuario["verificar"] = $_POST["verificar"];
			
			ingresarUsuario($conexion, $usuario);
		}
		cerrarConexion($conexion);
	?>
</body>
</html>