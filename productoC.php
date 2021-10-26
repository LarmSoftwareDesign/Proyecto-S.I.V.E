<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- css de boostrap-->
    <link rel="stylesheet" href="bootstrap-5.1.0-dist/css/bootstrap.min.css">

    <!--personal-->
    <link rel="stylesheet" href="css/stock.css">
    <!--Css-->
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <?php
      include("php/conexion.php");
      include("php/productF.php");
      include("php/empresF.php");
      session_start();//iniciando
      if (isset($_GET['id'])){
        $conexion = abrirConexion();
        $idp=$_GET['id'];
        $productoi=obtenerProductoE($conexion, $idp);
        $NCE = obtenerProducto($conexion, $idp);
        $productoid = $productoi['IdProducto'];
        $_SESSION['idpV']= $productoid;
      }elseif(isset($_SESSION['idp'])){
        $EMAIL=$_SESSION['emailE'];
      $ID =$_SESSION['idp'];
      $conexion = abrirConexion();
      $producto= obtenerProducto($conexion, $ID );
      $empresa = obtenerempresa($conexion, $EMAIL);
      $NCE = $empresa['Nomempresa'];
      $productoid = $producto['IdProducto'];
      $_SESSION['idpV']= $productoid;
      }
      

     
      ?>
    <!--js-->
    <script src="js/funciones.js"></script>
    <title>Comprar <?php
    if(isset($idp)){
      echo $productoi['Nombre_Producto']; 
       
     }elseif (isset($_SESSION['idp'])) {
       
       echo $producto['Nombre_Producto']; 
     }
     
    ?></title>
    
</head>
<body onload="cargarCE()">

    <header>
        <script src="js/header.js"></script>
        <script src="js/funcionesP.js"></script>
    </header>
    <section class="container">
      <div class="caja-registro">
        <div class="row justify-content-between">
          <div class="col-auto offset-md-3"  id="c1">
            
              <?php 
          echo "<ul class = \"fila\">";
            $u=1;
            if(isset($idp)){
            
             $t ='Archivos/'.$productoi['Nomempresa'].'/'.$productoi['IdProducto'].'-'.$productoi['Nombre_Producto'].'/*.*'; 
            }elseif (isset($_SESSION['idp'])) {
              $t ='Archivos/'.$NCE.'/'.$producto['IdProducto'].'-'.$producto['Nombre_Producto'].'/*.*';
            }
            
            foreach (glob($t) as $imagen){
              if ($u==1){
                $ruta=$imagen;
              }
              echo "<a href='#' onclick='cambio(".$u.")' class='position'>";
              echo "<img src='$imagen' width='150' id='G".$u."'></a></li><br>";
              $u++;
            }
            echo "</ul>";
            
            
            ?>
            
          
          </div>
          <div class="col-md-4 float-md-end mb-3 ms-md-3">
            <div class="">
              <h2><?php
              if (isset($idp)){
                echo $productoi['Nombre_Producto'];
              }elseif(isset($_SESSION['idp'])){
                echo $producto['Nombre_Producto'];
              }
            
               ?></h2>
            </div>
            <div class="imagen">
            <img src="<?php  echo $ruta; ?>" class="item-principal" id="F">
              
            </div>
            <br>
            <div>
              <?php
              if (isset($idp)){
                if ($NCE['Cantidad'] == 0){
                  echo "<h4>Disponibilidad: <span style=\"color:red;\">Agotado </span></h4>";
                }else{
                  echo "<h4>Disponibilidad: <span style=\"color:green;\">En Stock </span></h4>";
                }
                echo "<h5>Marca: <span style = \"color: skyblue\">".$productoi['Nomempresa']."</span></h5>";
                echo "<h5>Nacionalidad: ".$NCE['Nacionalidad']."</h5>";
              
                echo "<h5>Condicion: ".$NCE['Condicion']."</h5>";
              }elseif(isset($_SESSION['idp'])){
                if ($producto['Cantidad'] == 0){
                  echo "<h4>Disponibilidad: <span style=\"color:red;\">Agotado </span></h4>";
                }else{
                  echo "<h4>Disponibilidad: <span style=\"color:green;\">En Stock </span></h4>";
                }
                echo "<h5>Marca: <span style = \"color: skyblue\">".$NCE."</span></h5>";
                echo "<h5>Nacionalidad: ".$producto['Nacionalidad']."</h5>";
              
                echo "<h5>Condicion: ".$producto['Condicion']."</h5>";
              }
                ?>
            </div>
            

          </div>
          <div class="col-auto " id= "c3" style="text-align: center;">
            
            <h2>
              
              <?php
              if (isset($idp)){
                echo "Costo: ".'U$S '.$NCE['Precio'];
              }elseif(isset($_SESSION['idp'])){
                echo "Costo: ".'U$S '.$producto['Precio'];
                
              } ?>
            </h2>
            <br>
            
            <div class="contenido d-grid gap-2  mx-auto">
              <h5>Descripcion:</h5>
           
            <div class="collapse" id="collapseExample">
              <p class="text-break text-center"><?php
              if (isset($idp)){
                echo $NCE['Descripcion'];
              }elseif(isset($_SESSION['idp'])){
                  echo $producto['Descripcion'];
                
              }
               
              ?></p> 
            </div>
             <p>
            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              mostrar
            </a>    
            </p>
            </div>
            
            <div class="d-grid gap-2  mx-auto" id="CE">
            
              
              
            </div>
            <div id= "t">

            </div>
          </div>

        </div>
      </div>
    </section>
    
  
    <footer>
        <script src="js/footer.js"></script>
    </footer>
    <!-- scripts de boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>


    <?php
    cerrarConexion($conexion);
    ?>
</body>
</html>