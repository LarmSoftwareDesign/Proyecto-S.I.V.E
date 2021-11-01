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
		session_start();
		if(isset($_POST['rutM'])){
			$empresa["rut"] = intval($_POST["rutM"]);
			$empresa["nomempresa"] = $_POST["nomempresaM"];
			$empresa["email"] = $_POST["emailM"];
			$empresa["contraseña"] = $_POST["contM"];
			$empresa["verificar"] = $_POST["verM"];
			$empresa["telefono"] = intval($_POST["telefonoM"]);
			$empresa["direccion"] = $_POST["direccionM"];
            
			
            //? si la contraseña y la verificacion dela contraseña son iguales  
            if (strcmp ($empresa["contraseña"] , $empresa["verificar"] ) == 0) {

				$email =$empresa["email"];
				$verificacion=VerificarEmail($conexion,$email);
				if ($verificacion == false) {
					$_SESSION['emailE'] = $empresa['email'];
					$empresav =obtenerempresaE($conexion, $email);
					$exito =modificarEmpresa($conexion, $empresa);
					if ($exito){
						// a perfil
						$carpetaName ='Archivos/'.$empresav['Nomempresa'].'/';
						$carpetaNameN = 'Archivos/'.$empresa['nomempresa'].'/';
						$exitoC=cambiarCarpetaEmpresa($carpetaName, $carpetaNameN);
						if($exito){
							header("Location:../perfil1E.php");
						}else{
							header('Location: ..\modify E.php');
						}
					}else{
						header('Location: ..\modify E.php');
					}
				
				
				}else{
					$empresav =obtenerempresaE($conexion, $email);
					if ($empresav['Rut'] == $empresa["rut"] ) {
						
						$exito =modificarEmpresa($conexion, $empresa);
						if ($exito){
							// a perfil
							$carpetaName ='Archivos/'.$empresav['Nomempresa'].'/';
							$carpetaNameN = 'Archivos/'.$empresa['nomempresa'].'/';
							$exitoC=cambiarCarpetaEmpresa($carpetaName, $carpetaNameN);
							if($exito){
								header("Location:../perfil1E.php");
							}else{
								header('Location: ..\modify E.php');
							}
						}else{
							header('Location: ..\modify E.php');
						}
					}else{
						echo "<script>alert('el email ya existe en otra cuenta');</script>";
						header('Location: ..\modify E.php');
					}
					
					
					
				}
                
                
            }elseif (strcmp ($empresa["contraseña"] , $empresa["verificar"] ) != 0){
				//! de lo contrario volvera al modify
				header('Location: ..\modify E.php');
			}
		
		}elseif (isset($_POST["rut"])){
			
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
					$exito =ingresarEmpresa($conexion, $empresa);

					if ($exito){
						session_start();//iniciando 
					$_SESSION['emailE'] = $empresa['email'];
					header("Location:../perfil1E.php");
					}else{
						header('Location: ..\register E.html');
					}
					
					
				}elseif (strcmp ($empresa["contraseña"] , $empresa["verificar"] ) != 0) {
					header('Location: ..\register E.html');
				}
			}
			



			
		}
		cerrarConexion($conexion);

	?>

		
	

</body>
</html>