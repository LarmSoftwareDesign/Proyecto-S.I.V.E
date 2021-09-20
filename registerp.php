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
		if ($producto ['terminos']){
			header('Location:productos.php');
			ingresarProducto($conexion, $producto);	
		}else {
			header('Location:vender.html');
		}
		cerrarConexion($conexion);

	}

	?>
	
    <!-- scripts de boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src=../bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
</body>
</html>