<?php
include("conexion.php");
$conexion = abrirConexion();
$seleccion = $_GET['seleccion'];


$num=1;
$sql="SELECT * FROM producto WHERE Categorias='". $seleccion."'";
$resultado = $conexion->query($sql);

echo "<div class=\"container\">";    
if($resultado){
    while($fila = $resultado->fetch_assoc()) {
        if ($num == 1){
            echo "<div class=\"Mar row justify-content-between\">";
        }
        if ($num <= 4){
            echo "<div class=\"card\" style=\"width: 220px;\"> ";
            echo "<img src=\"img/producto.png\" class=\"card-img-top\">";
            echo "<div class=\"card-body\">";
            echo "<h5 class=\"LSM card-title\"><a href = \"#\" >".$fila['Nombre_Producto']."</a></h5>";
            echo "<p class=\"card-text\">".$fila['Precio']."</p>";
            echo "</div>";
            echo "<div class=\"card-footer\"><a href=\"#\">leer mas...</a></div>";
            echo "</div>";
            $num++;
            
        }else{
            echo "</div>";
            $num=1;
        }
    }
}

echo "</div>";
cerrarConexion($conexion);
?>