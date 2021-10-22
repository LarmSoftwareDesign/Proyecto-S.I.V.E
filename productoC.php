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
      
      if(isset($_SESSION['idp'])){
      $EMAIL=$_SESSION['emailE'];
      $ID =$_SESSION['idp'];
      $conexion = abrirConexion();
      $conexion = abrirConexion();
      $producto= obtenerProducto($conexion, $ID );
      $NCE = obtenerempresa($conexion, $EMAIL);

      }
     
      ?>
    <!--js-->
    <script src="js/funciones.js"></script>
    <title>Comprar <?php echo $producto['Nombre_Producto'];?></title>
</head>
<body>
    <header>
        <script src="js/header.js"></script>
    </header>
    <section class="container">
      <div class="caja-registro">
        <div class="row justify-content-between">
          <div class="col-auto" style="" id="c1">
            
              <?php
          echo "<ul class = \"fila\">";
            $u=1;
            $t ='Archivos/'.$NCE['Nomempresa'].'/'.$producto['IdProducto'].'-'.$producto['Nombre_Producto'].'/*.*';
            foreach (glob($t) as $imagen){
              echo "<a href='#' onclick='cambio(".$u.")' class='position'>";
              echo "<img src='$imagen' width='150";
              if ($u==1){
                $ruta=$imagen;
              }
              echo "' id='G".$u."'></a></li><br>";

              $u++;
            }
            echo "</ul>"
             
            ?>
            
          
          </div>
          <div class="col-md-6 float-md-end mb-3 ms-md-3">
            <div class="">
              <h2><?php echo $producto['Nombre_Producto'];?></h2>
            </div>
            <div class="imagen">
            <img src="<?php  echo $ruta; ?>" class="item-principal" id="F">
              
            </div>
            <br>
            <div>
              <?php
                if ($producto['Cantidad'] == 0){
                  echo "<h4>Disponibilidad: <span style=\"color:red;\">Agotado </span></h4>";
                }else{
                  echo "<h4>Disponibilidad: <span style=\"color:green;\">En Stock </span></h4>";
                }
                echo "<h5>Marca: <span style = \"color: skyblue\">".$NCE['Nomempresa']."</span></h5>";
                echo "<h5>Nacionalidad: ".$producto['Nacionalidad']."</h5>";
              ?>
              <h5><?php echo "Condicion: ".$producto['Condicion'];?></h5>
            </div>
            

          </div>
          <div class="col-auto" id= "c3" style="text-align: center;">
            
            <h2><?php echo "Costo: ".$producto['Precio'];?></h2>
            <br>
            <p style ="font-size:24px;"><?php echo $producto['Descripcion'];?></p>
            <div class="row">
              <form action="" method="get">
              <button class="btn btn-outline-info btn-lg">
                  <svg src="bootstrap-5.1.0-dist/SVG/bag-plus.svg" width="32" height="32" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                  </svg>
                 Agregar al carrito
              </button>
                
              </form>
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