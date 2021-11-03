<?php
include("conexion.php");
include("UserF.php");
$conexion = abrirConexion();
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
    while ($fila = $resultado->fetch_assoc()) {
        echo "<div class = 'row'>";
        echo "<h2>Compra ".$fila['Numcompra']."<h1>";
        echo "<h4>".$fila['Estado']."<h4>";
        echo "</div>";
    }

}elseif($verdadero == false){
    echo "<h1>Usted no tiene Compras</h1>";
}else{
    echo $verdadero;
}

cerrarConexion($conexion);
?>