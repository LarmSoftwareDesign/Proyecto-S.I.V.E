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

    }else {
        return false;
    }
}else{
    return false;
    $ls ="Error in ".$resultado."<br>".$conexion->error;
    return $ls;
}

?>