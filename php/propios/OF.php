<?php
//Funciones sobre el producto

	function ingresarProducto($conexion, $producto){
		
		$dml = "INSERT INTO producto (idproducto,nombre_producto,precio,condicion,categoria,descripcion,nacionalidad)";
		$dml .= " VALUES (" . $producto["idproducto"];
		$dml .= ",'" . $producto["nombre_producto"];
		$dml .= "'," . $producto["precio"];
		$dml .= ",'" . $producto["condicion"];
		$dml .= "','" . $producto["categoria"];
		$dml .= "','" . $producto["descripcion"];
		$dml .= "','" . $producto["nacionalidad"] . "')";
		
		if ($conexion->query($dml) === TRUE){
			//Es exactamente igual a TRUE
			echo "Producto ingresado";
		}else{
			die("Error al ingresar: $dml. Error: " . $conexion->connect_error);
		}

	}

	function eliminarProducto($conexion, $idproducto){

		$dml = "DELETE FROM producto WHERE idproducto = " . $idproducto;
		
		if ($conexion->query($dml) === TRUE){
			echo "Producto eliminado";
		}else{
			die("Error al eliminar: $dml. Error: " . $conexion->connect_error);
		}		
	}

	function modificarProducto($conexion, $producto){
	
		$dml = "UPDATE producto set idproducto = ". $producto["idproducto"];
		$dml .= ", nombre_producto = '" . $producto ["nombre_producto"];
		$dml .= "', precio = " . $producto ["precio"];
		$dml .= ", condicion '= '" . $producto ["condicion"];
		$dml .= "', categoria '= '" . $producto ["categoria"];
		$dml .= "', descripcion '= '" . $producto ["descripcion"];
		$dml .= "', nacionalidad '= " . $producto ["nacionalidad"];
		$dml .= "'   WHERE idproducto = " . $producto ["idproducto"];


		if ($conexion->query($dml) === TRUE){
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


?>