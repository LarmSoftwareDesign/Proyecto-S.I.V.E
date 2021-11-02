<?php
include("conexion.php");
include("productF.php");

$conexion = abrirConexion();
$num=1;
$unidad='U$S';
session_start();//iniciando
if (isset($_SESSION['emailE'])){
    $emai =$_SESSION['emailE'];
    $sql="SELECT Nomempresa, IdProducto, Nombre_Producto, Descripcion, Precio, e.Rut Rut FROM producto p join empresa e on p.Rut = e.Rut WHERE Email='".$emai."'";
    $resultado = $conexion->query($sql);
    
}
// }elseif (isset($_GET['condicion'])){
    
// }

// if (isset($_SESSION['condicion']) && isset($_SESSION['categorias'])){
//     $sql="SELECT * FROM producto WHERE Condicion='".$condicion."'";
//     $resultado = $conexion->query($sql);
// }

    




echo "<div class=\"container\">"; 
echo "<h3>Tus Productos:</h3>";  
echo "<br>";
if($resultado){
    $cant=0;
    while($fila = $resultado->fetch_assoc()) {
        
        
        if ($num == 1){
            echo "<div class=\" row justify-content-between\">";
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
            echo "<div class= \"card-footer\" align ='center'>";
            echo "<a class=\"Esp btn btn-outline-info btn-lg\" href=\"modify P.php?Rut=".$fila['Rut']."&idp=".$id."\";?>";
            echo "<svg src=\"bootstrap-5.1.0-dist/SVG/pencil-square.svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-pencil-square\" viewBox=\"0 0 16 16\">";
            echo "<path d=\"M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z\"/>";
            echo "<path fill-rule=\"evenodd\" d=\"M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z\"/>";
            echo "</svg>Editar</a>";
            echo "<a class=\"Esp btn btn-outline-danger btn-lg\" href=\"perfil1E.php?idpB=".$id."\";?>";
            echo "<svg src=\"bootstrap-5.1.0-dist/SVG/pencil-square.svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-pencil-square\" viewBox=\"0 0 16 16\">";
            echo "</svg>Borrar</a>";
            echo "</div>";
            echo "</div>";
            $num++;  
        }else{
            echo "</div>";
            $num=1;
        }
        $cant++;
    }
    if ($cant == 0){
        echo "<h1>usted no tiene productos</h1>";
    }
}else{
    echo "<h1>usted no tiene productos</h1>";
}

echo "</div>";
cerrarConexion($conexion);
?>