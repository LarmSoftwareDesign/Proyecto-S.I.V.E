<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- css de boostrap-->
    <link rel="stylesheet" href="../bootstrap-5.1.0-dist/css/bootstrap.min.css">
	<!--otros css-->
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/vender.css">
    <link rel="stylesheet" href="../css/footer.css">
    <title>guardado</title>
</head>
<body>
	<?php
	include("productF.php");
	include("empresF.php");
	$conexion = abrirConexion();
	if (isset($_POST['idproducto'] ) ) {
		$producto['idproducto']=intval($_POST['idproducto']);
		$producto['nombreproducto']=$_POST['nombre_producto'];
		$producto['condicion']=$_POST['condicion'];
		$producto['descripcion']=$_POST['descripcion'];
		$producto['categoria']=$_POST['categoria'];
		$producto['nacionalidad']=$_POST['nacionalidad'];
		$producto['precio']=floatval($_POST['precio']);
		$producto['cantidad']=intval($_POST['cantidad']);
		$producto['terminos']=$_POST['terminos'];
		if ($producto ['terminos']){
			ingresarProducto($conexion, $producto);	
		}else {
			header('Location:../vender.html');
		}

	}

	?>
	<header>
      <script src="js/header.js"></script>
    </header>
	<section class="caja-producto">
		<div class="MC container">
			<?php
			$fila =obtenerempresaR($conexion);
			session_start();
    		$EMAIL=$_SESSION['emailE'];
     		$NCE = obtenerempresa($conexion, $EMAIL );
     		$nomE= $NCE["Nompresa"];
			$carpetaE='Archivos/'.$nomE;
			$carpetaP='/'.$fila['Nombre_Producto'];
			
			?>

		</div>
	</section>
	
    



	<!--footer-->
    <footer>
        <script src="../js/footer.js"></script>
    </footer>
    <!-- scripts de boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src=../bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
</body>
</html>