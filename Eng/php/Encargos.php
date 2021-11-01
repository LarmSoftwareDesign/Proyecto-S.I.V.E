<?php 
include("conexion.php");
include("UserF.php");
session_start();


$conexion = abrirConexion();


if (isset($_GET["Numcompra"])) {
    //wlminando 
    $Numcompra =$_GET["Numcompra"];
   
		//delete
		$dml="DELETE FROM compra WHERE Numcompra=". $Numcompra;
		if ($conexion->query($dml) === true) {
			//t	
		}else{
			die("Error al ingresar:$dml. Error:" .$conexion->connect_error);
		}
	}
$email=$_SESSION['email'];
$usuario=obtenerusuarioE($conexion, $email);
$sql = "SELECT Nombre_Producto, c.IdProducto,Numcompra, Precio, Descripcion, Condicion, Nacionalidad, c.Cantidad Cantidad from compra c join producto p on c.IdProducto = p.IdProducto AND Ci =".$usuario['Ci']." AND Estado ='Procesando pago';";
$resultado = $conexion->query($sql);
if ( $resultado){ 
    if($resultado->num_rows > 0){
    
        $verificar = true;
    }else{
       $verificar = false;
    }
    
}else{
    $ls ="Error in ".$resultado."<br>".$conexion->error;
   echo $ls;
    
}

if ($verificar){
    
    echo "<div class=\"MS col-sm-7\" >";
    echo "<div class=\"row\">";
    echo "<h2>Productos en el carrito</h2>";
    echo "<hr>";
    echo "</div>";
    while ($fila = $resultado->fetch_assoc()) {
        
        echo "<div class=\"row\">";
        echo "<div class=\"row justify-content-between\">";
        echo "<div class=\"col-sm-2\">";
        echo "<img src=\"img/producto.png\" width=\"128\" height=\"128\">";
        echo "</div>";
        echo " <div class=\"col-sm-4\">";
        echo " <a href=\"#\"><h4>".$fila['Nombre_Producto']."</h4></a>";

        echo "<h5>".$fila['Condicion']."</h5>";
        echo "<h6>".$fila['Nacionalidad']."</h6>";
        echo "<p class = \"text-break\">".$fila['Descripcion']."</p>";
        echo "</div>";
        echo "<div class=\"col-2\">";
        echo '<h4 class="text-center"><b >U$S '.$fila['Precio'].' </b></h4>';
        echo "</div>";
        echo "</div>";
        echo "<div class=\"row\">";
        echo "<div class=\"col-sm-6\">";
        echo "<input class=\"form-control\" type=\"number\" min=\"1\" name=\"\" id=\"\" value=\"".$fila['Cantidad']."\">";
        echo "</div>";
        echo "<div class=\"col-sm-6\">";
        echo "<a class=\"btn btn-outline-danger\" onclick='location.href=\"Encargos.php?Numcompra=".$fila['Numcompra']."'>";
        echo "<svg src=\/bootstrap-5.1.0-dist/SVG/trash.svg\" width=\"32\" height=\"32\" fill=\"currentColor\" class=\"bi bi-trash\" viewBox=\"0 0 16 16\" >";
        echo "<path d=\"M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z\"></path>";
        echo "<path fill-rule=\"evenodd\" d=\"M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z\"></path>";
        echo "</svg></a>";                       
        echo "</div>";
        echo "</div>";
        echo "</div>";
        
    }
    echo "</div>";
    $sql = "SELECT Nombre_Producto, c.IdProducto,Numcompra, Precio, Descripcion, Condicion, Nacionalidad, c.Cantidad Cantidad from compra c join producto p on c.IdProducto = p.IdProducto AND Ci =".$usuario['Ci']." AND Estado ='Procesando pago';";
    $resultado = $conexion->query($sql);
    if ( $resultado){ 
        if($resultado->num_rows > 0){
    
            $verificar = true;
        }else{
            $verificar = false;
        }
    
    }else{
        $ls ="Error in ".$resultado."<br>".$conexion->error;
        echo $ls;
    
    }

    echo "<div class=\"MS col-sm-4\" >";
    echo "<div class= 'row'><h2 class= 'text-center'>Resumen del pedido:</h2><br>";
    echo "<h4 class= 'text-center'>Resumen del pedido:</h4></div>";
    $total=0;
    while ($fila1 = $resultado->fetch_assoc()){
        $precio = $fila1['Precio'] * $fila1 ['Cantidad'];
        if ( $fila1 ['Cantidad'] == 1){
        echo '<p>'.$fila1['Nombre_Producto']."\t".'U$S'.$precio.'</p>';
        
        }else{
            echo '<p>'.$fila1['Nombre_Producto']."x".$fila1['Cantidad']."\t".'U$S'.$precio.'</p>';
            
        }
        $total+=$precio;
    }
    echo "<h3><b>Subtotal:  ".$total."</b></h3>";
    echo "</div>";
}


cerrarConexion($conexion);



?>