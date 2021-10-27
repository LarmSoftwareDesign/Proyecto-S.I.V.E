<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- css de boostrap-->
    <link rel="stylesheet" href="bootstrap-5.1.0-dist/css/bootstrap.min.css">
	<!--otros css-->
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/vender.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>guardado</title>
</head>
<body class =regi>
	<?php
	include("php/conexion.php");
	include("php/productF.php");
	include("php/empresF.php");
	session_start();//iniciando
	$conexion = abrirConexion();
    $EMAIL=$_SESSION['emailE'];
	
	

	//! variables de carpetas
	

    
    // $direction='Archivos/'.$nomE.'/'.strval($idP)."-".$nomP.'/';

	// * ingreso de datos de un producto 
	if (isset($_POST['idproductoM']) && $_POST['rut']){
		
		$producto['idproducto']=intval($_POST['idproductoM']);
		$producto['nombre_producto']=$_POST['nombre_productoM'];
		

		//! condicion
		if (isset($_POST['condicionM'])){
			$producto['condicion']=$_POST['condicionM'];
			
		}else{
			$producto['condicion']=$_POST['cond'];
		}

		//? descripcion
		if (isset($_POST['descripcionM'])){
			$producto['descripcion']=$_POST['descripcionM'];
		
		}else{
			$producto['descripcion']=$_POST['desc'];
		}

		//? categorias
		if (isset($_POST['categoriaM'])){
			$producto['categoria']=$_POST['categoriaM'];
		}else{$producto['categoria']=$_POST['cat'];
			
		}
		
		

		//todo nacionalidad
		if (isset($_POST['nacionalidadM'])){
			$producto['nacionalidad']=$_POST['nacionalidadM'];
		}else{
			$producto['nacionalidad']=$_POST['naci'];
			
		}
		
		$producto['precio']=(float) $_POST['precioM'];
		$producto['cantidad']=intval($_POST['cantidadM']);
		$producto['rut']=$_POST['rut'];
		modificarProducto($conexion, $producto);
		$idp = $producto['idproducto'];
		$carpetaOld=obtenerproductoE($conexion,$idp);
		$carpetaName='Archivos/'.$carpetaOld['Nomempresa'].'/'.$carpetaOld['IdProducto'].'-'.$carpetaOld['Nombre_Producto'].'/';
		$carpetaNameN='Archivos/'.$carpetaOld['Nomempresa'].'/'.$carpetaOld['IdProducto'].'-'.$producto['nombre_producto'].'/';
		cambiarCarpetaproducto($carpetaName, $carpetaNameN);
		if (file_exists($carpetaNameN)){
			if (isset($_POST['archivoM[]'])){
				$num=1;
			foreach ( $_FILES['archivoM']['tmp_name'] as $imagen => $tmp_name ) {
				$el_archivo = $_FILES['archivoM']['name'][$imagen];
				$ruta_archivo = $carpetaNameN.basename($el_archivo);
				if (move_uploaded_file($_FILES['archivoM']['tmp_name'][$imagen], $ruta_archivo)){
					echo "El archivo es válido y se cargó correctamente.<br><br>";
					
				}else{
				echo "Error al intentar subir el archivo";
				}
				$t = $carpetaNameN.'/*.*';
				$u=1;
            	foreach (glob($t) as $imagen){
				$ruta_archivo = $imagen;
				$nomA ='Archivo'.$u;
				$extension = pathinfo($ruta_archivo, PATHINFO_EXTENSION);
				$nuevaR=$carpetaName.$nomA.'.'.$extension;
				if(rename ($ruta_archivo, $nuevaR)){
					echo "<br>cambiado<br>";
				}else{
					echo "<br>Error al cambiar el nombre<br>";
				}
                $u++;
			
			} 
			}
			
            }
			$_SESSION['idp']=$idP;
			header('Location:productoC.php');
			
		}
		

	} elseif (isset($_POST['idproducto'])){
		$NCE = obtenerempresaE($conexion, $EMAIL);
		$producto['idproducto']=intval($_POST['idproducto']);
		$producto['nombre_producto']=$_POST['nombre_producto'];
		$producto['condicion']=$_POST['condicion'];
		$producto['descripcion']=$_POST['descripcion'];
		$producto['categoria']=$_POST['categoria'];
		$producto['nacionalidad']=$_POST['nacionalidad'];
		$producto['precio']=(float) $_POST['precio'];
		$producto['cantidad']=intval($_POST['cantidad']);
		$producto['terminos']=$_POST['terminos'];
		$producto['rut']=$NCE['Rut'];
		ingresarProducto($conexion, $producto);
		$LS=obtenerProductoR($conexion);
		$nomP=$LS['Nombre_Producto'];
		echo "$nomP <br>";
		echo $producto['nombre_producto'];
		if (strcmp($nomP , $producto['nombre_producto'])==0){
		
		
		$nomE= $NCE["Nomempresa"];
		$idP =$LS['Idproducto'];
		$carpetaE='Archivos/'.$nomE.'/';
		$carpetaName="Archivos/".$nomE.'/'.strval($idP)."-".$nomP."/";
		//* carpeta empresa
		crearCarpetaEmpresa($carpetaE);
		//* carpeta producto
		crearCarpetaproducto($carpetaName);
		$num=1;
		foreach ( $_FILES['archivo']['tmp_name'] as $imagen => $tmp_name ) {
		$el_archivo = $_FILES['archivo']['name'][$imagen];
		$ruta_archivo = $carpetaName.basename($el_archivo);
		$nomA='archivo'.$num;
		
		if (move_uploaded_file($_FILES['archivo']['tmp_name'][$imagen], $ruta_archivo)){
			echo "El archivo es válido y se cargó correctamente.<br><br>";
			$extension = pathinfo($ruta_archivo, PATHINFO_EXTENSION);
			$nuevaR=$carpetaName.$nomA.'.'.$extension;
			rename ($ruta_archivo, $nuevaR);
			$num++;
		}else{
			echo "Error al intentar subir el archivo";
			}
			
		} 
		// $t=$carpetaName."/*.*";
		// foreach (glob($t) as $imagen){
		// 	echo "<img src='$imagen' width='150'><br>";
		// }
		$_SESSION['idp']=$idP;
		header('Location:productoC.php');
		}else{
		header('Location:vender.html');
		}
	}else{
		
	}
	
	







	cerrarConexion($conexion);

	?>
	
    <!-- scripts de boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="../bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
</body>
</html>