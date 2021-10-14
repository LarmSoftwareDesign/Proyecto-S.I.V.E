<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro agenda</title>
</head>
<body>

	<?php 
		include("conexion.php");
		include("empresF.php");
		$conexion = abrirConexion();
		
		if (isset($_POST["rut"])){
			
			$empresa["rut"] = intval($_POST["rut"]);
			$empresa["nomempresa"] = $_POST["nomempresa"];
			$empresa["email"] = $_POST["email"];
			$empresa["contraseña"] = $_POST["cont"];
			$empresa["verificar"] = $_POST["ver"];
			$empresa["telefono"] = intval($_POST["telefono"]);
			$empresa["direccion"] = $_POST["direccion"];
			if ($empresa["rut"] == 0){
				header("Location: ../register E.html");
			}else{
				if (strcmp ($empresa["contraseña"] , $empresa["verificar"] ) == 0) {
					ingresarEmpresa($conexion, $empresa);
					header("Location:../perfil1E.html");
				}else if (strcmp ($empresa["contraseña"] , $empresa["verificar"] ) != 0) {
					header('Location: ..\register E.html');
				}
			}
			



			
		}
		cerrarConexion($conexion);

	?>

		
	

</body>
</html>