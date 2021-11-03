<?php
include("conexion.php");
include("UserF.php");
session_start();
$email = $_SESSION['email'];
$fila=obtenerusuarioE($conexion, $email);
$sql= "SELECT * from compra where Ci=".$fila['Ci']." AND Estado ='Orden en camino'";
$resultado = $conexion->query($sql);
if ( $resultado){
    if ($resultado->num_rows > 0){
        $verdadero= true;
    }else {
        $verdadero= false;
    }
}else{
    
    $ls ="Error in ".$resultado."<br>".$conexion->error;
    $verdadero= $ls;
}

if ( $verdadero == true){

}elseif($verdadero == false){

}else{
    
}


?>