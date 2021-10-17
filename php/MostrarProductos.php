<?php
include("conexion.php");
$conexion = abrirConexion();
$seleccion = $_GET['seleccion'];


$num=1;
$sql="SELECT * FROM producto WHERE idsel=". $seleccion;
$resultado = $conexion->query($sql);

while($fila = $resultado->fetch_assoc()) {

if ($num < 4){
    echo "<div class=\"card\" style=\"width: 220px;\"> ";
    echo "<img src=\"img/producto.png\" class=\"card-img-top\">";
    echo "<div class=\"card-body\">";
    echo "<h5 class=\"LSM card-title\"><a href = \"#\" >".$fila['Nombre_Producto']."</a></h5>";
    echo "<p class=\"card-text\">".$fila['Precio']."</p>";
    echo "</div>";
    echo "<div class=\"card-footer\"><a href=\"#\">leer mas...</a></div>";
    echo "</div>";
}else{
echo "<>";
}
}
cerrarConexion($conexion);
?>