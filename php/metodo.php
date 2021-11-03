<?php

include("conexion.php");
include("UserF.php");

session_start();
$conexion = abrirConexion();
$email = $_SESSION['email'];
$usuario =obtenerusuarioE($conexion, $email);
// Verificar si el producto se ingreso antes

$sql = "SELECT * FROM compra where Ci =".$usuario['Ci']." AND Estado ='Procesando pago';";
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
if ( $verificar){
    while ($fila = $resultado->fetch_assoc()) {
        $dml = "UPDATE compra set Estado ='Pago recibido' WHERE Numcompra=".$fila['Numcompra'];
        if ($conexion->query($dml) === TRUE){
            echo "compra hecha";
        }else{
            echo "$dml.";
        }
    }
}else{

}
$sql = "SELECT * FROM compra where Ci =".$usuario['Ci']." AND Estado ='Pago recibido'";
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
while ($pedido =  $resultado->fetch_assoc()){

    $dml = "INSERT INTO encarga values (".$pedido['Numcompra'].", ".$pedido['IdProducto'].",".$pedido['Ci'].")";
    if ($conexion->query($dml) === TRUE){
        echo "encargo hecho";
    }else{
        echo "$dml". $conexion->connect_error;
    }
    
}

while($encargo = $resultado->fetch_assoc()){
    $dml = "UPDATE compra set Estado ='Orden en camino' where Numcompra=".$pedido['Numcompra'];
    if ($conexion->query($dml) === TRUE){
        echo "orden hecho";
    }else{
        echo "$dml.";
    }

}


cerrarConexion($conexion);
header('location: ../perfil.php');
?>