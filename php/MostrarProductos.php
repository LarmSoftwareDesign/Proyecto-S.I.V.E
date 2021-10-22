<?php
include("conexion.php");
$conexion = abrirConexion();

if (isset ($_GET ['categorias'])){
    $categorias =$_GET ['categorias'];
}else{
    $categorias=null;
}
$num=1;

$sql="SELECT * FROM producto WHERE Categorias='". $categorias."'";
$resultado = $conexion->query($sql);




echo "<div class=\"container\">";    
if($resultado){
    while($fila = $resultado->fetch_assoc()) {
        if ($num == 1){
            echo "<div class=\"Mar row justify-content-between\">";
        }
        $id = 0;
        if ($num <= 4){
            echo "<div class=\"card\" style=\"width: 220px;\"> ";
            echo "<img src=\"img/producto.png\" class=\"card-img-top\">";
            echo "<div class=\"card-body\">";
            echo "<h5 class=\"LSM card-title\"><a href = \"#\" >".$fila['Nombre_Producto']."</a></h5>";
            echo "<p class=\"card-text\">".$fila['Precio']."</p>";
            echo "</div>";
            echo "<div class=\"card-footer\"><a href=\"productoC.php?id=$id\">leer mas...</a></div>";
            echo "</div>";
            $num++;
            $id++;
        }else{
            echo "</div>";
            $num=1;
        }
    }
}

echo "</div>";
cerrarConexion($conexion);
?>