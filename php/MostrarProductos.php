<?php
include("conexion.php");
$conexion = abrirConexion();
$num=1;
$unidad='U$S';

if (isset($_GET['categorias'])){
    $categorias=$_GET['categorias'];
    $sql="SELECT Nomempresa, IdProducto, Nombre_Producto, Descripcion,Categorias, Precio FROM producto p join empresa e on p.Rut = e.Rut where Categorias ='".$categorias."'";
    $resultado = $conexion->query($sql);
    $_SESSION['categorias']=$categorias;
    
}elseif (isset($_GET['condicion'])){
    $condicion=$_GET['condicion'];
    $sql="SELECT Nomempresa, IdProducto, Nombre_Producto, Descripcion,Condicion, Precio  FROM producto p join empresa e on p.Rut = e.Rut where Condicion = '".$condicion."'";
    $resultado = $conexion->query($sql);
    $_SESSION['condicion']= $condicion;
    
}

// if (isset($_SESSION['condicion']) && isset($_SESSION['categorias'])){
//     $sql="SELECT * FROM producto WHERE Condicion='".$condicion."'";
//     $resultado = $conexion->query($sql);
// }

    




echo "<div class=\"container\">";  

if($resultado){
    while($fila = $resultado->fetch_assoc()) {
    
        if ($num == 1){
            echo "<div class=\"Mar row justify-content-between\">";
        }
        
        if ($num <= 4){
            $id = $fila['IdProducto'];
            $NOE=$fila['Nomempresa'];
            $nombre=$fila['Nombre_Producto'];
            $t ='../Archivos/'.$NOE.'/'.$id.'-'.$nombre.'/*.*';
            $u=1;
            foreach (glob($t) as $imagen){
                if ($u==1){
                  $ruta=$imagen;
                }
                $u++;
              }
              $rutaR=substr($ruta, 1);
            echo "<div class=\"card\" style=\"width: 220px;\"> ";
            echo "<div class=\"card-body\">";
            echo "<a href=\"productoC.php?id=$id\" style='text-decoration:none;'><img src=\"".$rutaR."\" class=\"card-img-top\"></a><br>";
        
            echo "<h5 class=\"card-title text-center\"><a href=\"productoC.php?id=$id\" style='text-decoration:none;'>".$nombre."</a></h5>";
            echo "<p class=\"card-text\">".$unidad." ".$fila['Precio']."</p><br>";
            echo "<p class=\"text-break\">".$fila['Descripcion']."<p>";
            echo "</div>";
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