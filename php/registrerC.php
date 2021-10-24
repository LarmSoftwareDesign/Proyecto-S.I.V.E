<?php
include("conexion.php");
include("UserF.php");
$conexion = abrirConexion();
session_start();
$email = $_SESSION['email'];
$id = $_GET['id'];
$cant = $_GET['cantidad'];
$usuario =obtenerusuario($conexion, $email);

// Verificar si el producto se ingreso antes
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
    $dml = "INSERT INTO compra(Numcompra, Estado, Cantidad , Ci, IdProducto ) values (0,'Procesando pago',";
    $dml .= $cant.",";
    $dml .= $usuario['Ci'].",";
    $dml .= $id. ")";
    
    if ($conexion->query($dml) === TRUE){
        if ($cant == 1){
            echo "<p style = \"font-size:18px; color:red;\">Este producto lo encargaste otra vez</p><br>";
            echo "<p style = \"font-size:18px; color:green;\">Producto en encargo ingresado</p>";
        }else{
            echo "<p style = \"font-size:18px; color:red;\">Este producto lo encargaste otra vez</p><br>";
            echo "<p style = \"font-size:18px; color:green;\">Productos en encargo ingresado</p>";
        }
       
      
    }else{
        die("<p style = \"font-size:18px; color:green;\">Error al ingresar: $dml. Error: " . $conexion->connect_error."</p>");
    }
}else{
$dml = "INSERT INTO compra(Numcompra, Estado, Cantidad , Ci, IdProducto ) values (0,'Procesando pago',";
$dml .= $cant.",";
$dml .= $usuario['Ci'].",";
$dml .= $id. ")";

if ($conexion->query($dml) === TRUE){
    if ($cant == 1){
        
         echo "<p style = \"font-size:18px; color:green;\">Producto en encargo ingresado</p>";
    }else{
        echo "<p style = \"font-size:18px; color:green;\">Productos en encargo ingresado</p>";
    }
   
  
}else{
    die("<p style = \"font-size:18px; color:green;\">Error al ingresar: $dml. Error: " . $conexion->connect_error."</p>");
}
}


cerrarConexion($conexion);

?>

