<?php
include("conexion.php");
include("UserF.php");
include("productF.php");
session_start();
$conexion = abrirConexion();
$EMAIL=$_SESSION['email'];
$usuario=obtenerusuarioE($conexion, $EMAIL);

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
echo "<div class=\"\" >";
echo "<div class= 'row'><h2 class= 'text-center'>Resumen del pedido:</h2><br>";
echo "<h4 class= 'text-center'>Resumen del pedido:</h4></div>";
$total=0;
echo "<div style ='padding:1em;'>";
while ($fila1 = $resultado->fetch_assoc()){
    $precio = $fila1['Precio'] * $fila1 ['Cantidad'];
    if ( $fila1 ['Cantidad'] == 1){
    echo '<h6>'.$fila1['Nombre_Producto']." ".'U$S'.$precio.'</h6>';
    
    }else{
        echo '<h6>'.$fila1['Nombre_Producto'].' '.$fila1['Precio']." x ".$fila1['Cantidad']." =".$precio.'</h6>';
        
    }
    $total+=$precio;
}
echo "<h3><b>Subtotal:  ".$total.' U$S'."</b></h3>";
echo "</div>";


echo "</div>";
cerrarConexion($conexion);

?>