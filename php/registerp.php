<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro de productos</title>
</head>
<body>

	<?php 

		include("productF.php");
		$conexion = abrirConexion();
		
		if (isset($_POST["idproducto"])){
			$producto["idproducto"] = intval($_POST["idproducto"]);
			$producto["nombre_producto"] = $_POST["nombre_producto"];
			$producto["precio"] = floatval($_POST["precio"]);
			$producto["condicion"] = $_POST["condicion"];
			$producto["descripcion"] = $_POST["descripcion"];
			$producto["categoria"] = $_POST["categoria"];
			$producto["nacionalidad"] = $_POST["nacionalidad"];
			ingresarProducto($conexion, $producto);
			
			if ($listo ){
				header("Location: ../vender.html");	
				
			}else{
			
			header("Location: ../productos.php");	
			}
			

			
			

		}
		cerrarConexion($conexion);

	?>
	
		
	

</body>
</html>