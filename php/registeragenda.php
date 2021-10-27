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
		
		if(isset($_POST['ciM'])){
			$usuario["email"] = $_POST["emailM"];
			$usuario["nombre"] = $_POST["nombreM"];
			$usuario["apellido"] = $_POST["apellidoM"];
            //todo pasar de string a int
			$usuario["ci"] = intval($_POST["ciM"]);
			$usuario["fnac"] = $_POST["fnacM"];
			$usuario["direccion"] = $_POST["direccionM"];
			$usuario["contraseña"] = $_POST["contM"];
			$usuario["verificarC"] = $_POST["verM"];
            
			
            //? si la contraseña y la verificacion dela contraseña son iguales  
            if (strcmp ($usuario["contraseña"] , $usuario["verificarC"] ) == 0) {

				$email =$usuario["email"];
				$verificacion=VerificarEmail($conexion,$email);
				if ($verificacion == false) {
				
				modificarUsuario($conexion, $usuario);
				// a perfil
				header('Location:..\perfil.php');
				}else{
					$usuariov =obtenerusuarioE($conexion, $email);
					if ($usuariov['Ci'] == $usuario["ci"] ) {
						echo "se modificara";
						modificarUsuario($conexion, $usuario);
						//a perfil
						header('Location:..\perfil.php');
					}else{
						
						echo "<script>alert('el email ya existe en otra cuenta');</script>";
						header('Location: ..\modify.php');
					}
					
					
					
				}
                
                
            }elseif (strcmp($usuario["contraseña"] , $usuario["verificarC"] ) != 0) { 
				//! de lo contrario volvera al modify
				header('Location: ..\modify.php');
			}

		}elseif (isset($_POST["email"])){
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
				$_SESSION['email'] = $usuario['email'];
				// a perfil
				header('Location:..\perfil.php');
                
            }elseif (strcmp($usuario["contraseña"] , $usuario["verificarC"] ) != 0) { 
				//! de lo contrario volvera al registro
				header('Location: ..\register.html');
			}
            


		}
		cerrarConexion($conexion);
	?>

</body>
</html>