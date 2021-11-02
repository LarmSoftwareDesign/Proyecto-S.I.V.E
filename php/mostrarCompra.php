<?php
include("conexion.php");
include("UserF.php");

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
echo "<h3 class= 'text-center'>Resumen del pedido:</h3></div>";
$total=0;
echo "<br>";
echo "<div style ='padding:1em;'>";
while ($fila1 = $resultado->fetch_assoc()){
    $precio = $fila1['Precio'] * $fila1 ['Cantidad'];
    if ( $fila1 ['Cantidad'] == 1){
    echo '<h5>'.$fila1['Nombre_Producto']." ".'U$S'.$precio.'</h5>';
    
    }else{
        echo '<h5>'.$fila1['Nombre_Producto'].' '.$fila1['Precio']." x ".$fila1['Cantidad']." =".$precio.'</h5>';
        
    }
    $total+=$precio;
}
echo "<h3><b>Subtotal:  ".$total.' U$S'."</b></h3>";
echo "</div>";

echo "<div class=\"d-grid gap-2\">";
echo "<button class=\"btn btn-lg btn-primary\" type=\"submit\">Comprar</button>";
echo "</div>";
echo "</div>";


?>