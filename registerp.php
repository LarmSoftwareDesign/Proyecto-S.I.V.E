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
	$LS =obtenerProductoR($conexion);
	$NCE = obtenerempresa($conexion, $EMAIL);

	//! variables de carpetas
	$nomE= $NCE["Nomempresa"];
	$nomP=$LS['Nombre_Producto'];
	$idP=$LS['IdProducto'];
	$carpetaE='Archivos/'.$nomE.'/';

    $carpetaName='Archivos/'.$nomE.'/'.strval($idp)."-".$nomP."/";
    $direction='Archivos/'.$nomE.'/'.$LS['IdProducto']."-".$LS['Nombre_producto'].'/';
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
			
			ingresarProducto($conexion, $producto);
			//?  verificando si existe la carpeta de la empresa 
			if (file_exists($carpetaE)) {
				//* crear carpeta del producto
				echo $carpetaE ? 'true' : 'false';
				if (file_exists($carpetaName)){
				  
				  foreach ( $_FILES['imagenes']['tmp_name'] as $imagen => $tmp_name ) {
					$el_archivo = $_FILES['imagenes']['name'][$imagen];
					$ruta_archivo = $carpetaName.basename($el_archivo);
					echo "<ul class fila>";
					if (move_uploaded_file($_FILES['imagenes']['tmp_name'][$imagen], $ruta_archivo)){
					  echo "El archivo es válido y se cargó correctamente.<br><br>";
					  echo "<img src=\"$imagen\" width=\"150\"><br>";
					  echo "<li>";
					  echo "<a href=\"#\" onclick=\"cambio(".$num.")\" class=\"position\">";
					  echo "<img src =\"$imagen\" class=\"item\" id=\"G".$num."\"></a>";
					  echo "</li>";
					  }else{
					  echo "Error al intentar subir el archivo";
					 }
				  echo "</ul>";
				  $num=1;
				  $name=$carpetaName."*.*";
				  echo $name;
				  foreach (glob($name)as $imagen){

					
					$num++;
				   }
				  }
				}else{
				  crearCarpetaproducto($carpetaName);

				}
			} else {
				echo "El fichero $carpetaE no existe";
				
				crearCarpetaproducto($carpetaE); 
				if (file_exists($carpetaName)){
				  
					foreach ( $_FILES['imagenes']['tmp_name'] as $imagen => $tmp_name ) {
					  $el_archivo = $_FILES['imagenes']['name'][$imagen];
					  $ruta_archivo = $carpetaName.basename($el_archivo);
					  echo "<ul class fila>";
					  if (move_uploaded_file($_FILES['imagenes']['tmp_name'][$imagen], $ruta_archivo)){
						echo "El archivo es válido y se cargó correctamente.<br><br>";
						echo "<img src=\"$imagen\" width=\"150\"><br>";
						echo "<li>";
						echo "<a href=\"#\" onclick=\"cambio(".$num.")\" class=\"position\">";
						echo "<img src =\"$imagen\" class=\"item\" id=\"G".$num."\"></a>";
						echo "</li>";
						}else{
						echo "Error al intentar subir el archivo";
					   }
					echo "</ul>";
					$num=1;
					$name=$carpetaName."*.*";
					echo $name;
					foreach (glob($name)as $imagen){
  
					  
					  $num++;
					 }
					} }else{
					crearCarpetaproducto($carpetaName);}
				} 
			}
				




				
		}else {
			header('Location:vender.html');
		}
		cerrarConexion($conexion);

	

	?>
	
    <!-- scripts de boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src=../bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
</body>
</html>