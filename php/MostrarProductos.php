<?php
include("conexion.php");
$conexion = abrirConexion();
$num=1;

if (is_null($categorias)){    
    echo "<p style = 'color:white;'><p>";
}elseif (isset ($categorias)) {
    $sql="SELECT * FROM jugador WHERE Categorias=". $categorias;
    $resultado = $conexion->query($sql);
}
echo $categorias;
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