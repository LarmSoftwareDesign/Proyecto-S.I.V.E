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
<body>
	<?php
	


	include("php/conexion.php");
	include("php/productF.php");
	include("php/empresF.php");
	session_start();//iniciando
	$conexion = abrirConexion();
    $EMAIL=$_SESSION['emailE'];
	$conexion = abrirConexion();
	

	//! variables de carpetas
	

    
    // $direction='Archivos/'.$nomE.'/'.strval($idP)."-".$nomP.'/';

	// * ingreso de datos de un producto 
	if (isset($_POST['idproducto'] ) ) {
		$producto['idproducto']=intval($_POST['idproducto']);
		$producto['nombre_producto']=$_POST['nombre_producto'];
		$producto['condicion']=$_POST['condicion'];
		$producto['descripcion']=$_POST['descripcion'];
		$producto['categoria']=$_POST['categoria'];
		$producto['nacionalidad']=$_POST['nacionalidad'];
		$producto['precio']=floatval($_POST['precio']);
		$producto['cantidad']=intval($_POST['cantidad']);
		$producto['terminos']=$_POST['terminos'];
		ingresarProducto($conexion, $producto);
	}else{
		header('Location:vender.html');
	}
	
	$LS=obtenerProductoR($conexion);
	$nomP=$LS['Nombre_Producto'];
	echo "$nomP <br>";
	echo $producto['nombre_producto'];
	if (strcmp($nomP , $producto['nombre_producto'])==0){
		
		$NCE = obtenerempresa($conexion, $EMAIL);
		$nomE= $NCE["Nomempresa"];
		$idP =$LS['Idproducto'];
		$carpetaE='Archivos/'.$nomE.'/';
		$carpetaName="Archivos/".$nomE.'/'.strval($idP)."-".$nomP."/";
		
		crearCarpetaEmpresa($carpetaE);
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
		
	}







	cerrarConexion($conexion);

	?>
	
    <!-- scripts de boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src=../bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
</body>
</html>