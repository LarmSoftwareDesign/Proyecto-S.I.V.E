<?php 
include("conexion.php");
$conexion = abrirConexion();
$sql = "SELECT * FROM compra where IdProducto=".$id." AND Ci =".$usuario['Ci']." AND Estado ='Procesando pago';";
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
    echo "<div class ='MS col'> ";    
    while ($fila = $resultado->fetch_assoc()) {
        
    }
    echo "</div>";
}


cerrarConexion($conexion);



?>