<?php
	//* Funciones sobre el producto
	
	function ingresarProducto($conexion, $producto){
		//todo: en esta variable $dml estaran los comando con los cuales manipularemos la base de datos
		
		//* comando de insertar valores en la base de datos 
		$dml = "INSERT INTO producto (IdProducto, Nombre_Producto, Precio, Condicion, Categorias, Descripcion, Nacionalidad, Cantidad, Rut)";
		$dml .= " VALUES (" . $producto["idproducto"];
		$dml .= ", '" . $producto["nombre_producto"];
		$dml .= "', " . $producto["precio"];
		$dml .= ", '" . $producto["condicion"];
		$dml .= "', '" . $producto["categoria"];
		$dml .= "', '" . $producto["descripcion"];
		$dml .= "', '" . $producto["nacionalidad"];
		$dml .= "',".$producto['cantidad'];
		$dml .= ", ".$producto['rut']. ")";
		

		//? si al llamar la funcion query 
		if ($conexion->query($dml) === TRUE){
			//Es exactamente igual a TRUE
			echo "Producto ingresado";
		}else{
			die("Error al ingresar: $dml. Error: " . $conexion->connect_error);
		}

	}

	function eliminarProducto($conexion, $idproducto){

		$dml = "DELETE FROM producto WHERE IdProducto = " . $idproducto;
		
		if ($conexion->query($dml) === TRUE){
			echo "Producto eliminado";
		}else{
			die("Error al eliminar: $dml. Error: " . $conexion->connect_error);
		}		
	}

	function modificarProducto($conexion, $producto){
	
		$dml = "UPDATE producto set IdProducto = ". $producto["idproducto"];
		$dml .= ", nombre_producto = '" . $producto ["nombre_producto"];
		$dml .= "', precio = " . $producto ["precio"];
		$dml .= ", condicion '= '" . $producto ["condicion"];
		$dml .= "', categoria '= '" . $producto ["categoria"];
		$dml .= "', descripcion '= '" . $producto ["descripcion"];
		$dml .= "', nacionalidad '= " . $producto ["nacionalidad"];
		$dml .= "'   WHERE idproducto = " . $producto ["idproducto"];
		$resultado=$conexion->query($dml);

		if ( $resultado === TRUE){
			//Es exactamente igual a TRUE
			
			echo "Producto modificado";
			
		}else{
			die("Error al modificar: $dml. Error: " . $conexion->connect_error);
		}		
	}

	function mostrarProducto($conexion){
		$sql = "SELECT * FROM producto";
		$resultado = $conexion->query($sql);

		if ($resultado->num_rows > 0){ 
			while ($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>" . $fila["idproducto"] . "</td>";
				echo "<td>" . $fila["nombre_producto"] . "</td>";
				echo "<td>" . $fila["precio"] . "</td>";
				echo "<td>" . $fila["condicion"] . "</td>";
				echo "<td>" . $fila["categoria"] . "</td>";
				echo "<td>" . $fila["descripcion"] . "</td>";
				echo "<td>" . $fila["nacionalidad"] . "</td>";

				echo "</tr>";
			}
		}else{
			echo "<tr><td>Sin Productos ingresados</td></tr>";
		}
	}
	function obtenerProducto($conexion, $ID ){
		$sql = "SELECT * FROM producto WHERE IdProducto='".$ID . "'";
		$resultado = $conexion->query($sql);
	
		if ( $resultado){ 
			if($resultado->num_rows > 0){
				$fila = $resultado->fetch_assoc();
			   
				return $fila;
	
			}else{
				return false;
			}
			
		}else{
			$ls ="Error in ".$resultado."<br>".$conexion->error;
		   return $ls;
			
		}
	}
	function obtenerProductoR($conexion){
		$sql = "SELECT LAST_INSERT_ID() num , Idproducto, Nombre_Producto from producto  order by Idproducto  desc limit 1";
		$resultado = $conexion->query($sql);
	
		if ($resultado){ 
			if($resultado->num_rows > 0){
				$LS = $resultado->fetch_assoc();
				return $LS;
	
			}else{
				return false;
			}
			
		}else{
			$ls ="Error in ".$resultado."<br>".$conexion->error;
		   return $ls;
			
		}
	}
	function obtenerproductoE($conexion, $idp){
		$sql="SELECT Nomempresa, IdProducto, Nombre_Producto FROM producto p join empresa e on p.Rut = e.Rut where IdProducto=".$idp;
		
		$resultado = $conexion->query($sql);
	
		if ($resultado){ 
			if($resultado->num_rows > 0){
				$LS = $resultado->fetch_assoc();
				return $LS;
	
			}else{
				return false;
			}
			
		}else{
			$ls ="Error in ".$resultado."<br>".$conexion->error;
		   return $ls;
			
		}

	}
	function obtenerproductoRut($conexion, $Rut, $idp){
		$sql="SELECT Nomempresa, IdProducto, Nombre_Producto FROM producto p join empresa e on p.Rut = e.Rut where IdProducto=".$idp;
		
		$resultado = $conexion->query($sql);
	
		if ($resultado){ 
			if($resultado->num_rows > 0){
				$LS = $resultado->fetch_assoc();
				return $LS;
	
			}else{
				return false;
			}
			
		}else{
			$ls ="Error in ".$resultado."<br>".$conexion->error;
		   return $ls;
			
		}

	}

	function crearCarpetaproducto($carpetaName){
		if (file_exists($carpetaName)){
			echo "<br>la carpeta $carpetaName existe<br>";
		}else{
		mkdir($carpetaName, 0777);
		if (file_exists($carpetaName)){
			echo "<br>se creo $carpetaName<br>";
		}else {
			echo "fallo";
		}
	}
	}
	function obtenerCategorias($conexion)
	{
		$sql="SELECT  Categorias FROM producto group by Categorias";
		$resultado = $conexion->query($sql);
	
		if ($resultado){ 
			if($resultado->num_rows > 0){
				
				return $resultado;
	
			}else{
				return false;
			}
			
		}else{
			$ls ="Error in ".$resultado."<br>".$conexion->error;
		   return $ls;
			
		}
	}
	function obtenerCondicion($conexion)
	{
		$sql="SELECT Condicion FROM producto group by Condicion";
		$resultado = $conexion->query($sql);
	
		if ($resultado){ 
			if($resultado->num_rows > 0){
				
				return $resultado;
	
			}else{
				return false;
			}
			
		}else{
			$ls ="Error in ".$resultado."<br>".$conexion->error;
		   return $ls;
			
		}
	}
	
?>