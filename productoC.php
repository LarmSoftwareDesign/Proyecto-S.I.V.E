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
      $producto= obtenerProducto($conexion, $ID );
      $NCE = obtenerempresa($conexion, $EMAIL);

      }if (isset($_GET['id'])){
        

      }
     
      ?>
    <!--js-->
    <script src="js/funciones.js"></script>
    <title>Comprar <?php echo $producto['Nombre_Producto'];?></title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <header>
        <script src="js/header.js"></script>
    </header>
    <section class="container">
      <div class="caja-registro">
        <div class="row justify-content-between">
          <div class="col-auto offset-md-3"  id="c1">
            
              <?php
          echo "<ul class = \"fila\">";
            $u=1;
            $t ='Archivos/'.$NCE['Nomempresa'].'/'.$producto['IdProducto'].'-'.$producto['Nombre_Producto'].'/*.*';
            foreach (glob($t) as $imagen){
              if ($u==1){
                $ruta=$imagen;
              }
              echo "<a href='#' onclick='cambio(".$u.")' class='position'>";
              echo "<img src='$imagen' width='150' id='G".$u."'></a></li><br>";
              $u++;
            }
            echo "</ul>"
             
            ?>
            
          
          </div>
          <div class="col-md-4 float-md-end mb-3 ms-md-3">
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
          <div class="col-auto " id= "c3" style="text-align: center;">
            
            <h2><?php echo "Costo: ".$producto['Precio'];?></h2>
            <br>
            
            <div class="contenido">
              <h5>Descripcion:</h5>
           
            <div class="collapse" id="collapseExample">
              <p class="text-break"><?php echo $producto['Descripcion'];?></p> 
            </div>
             <p>
            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              mostrar
            </a>    
            </p>
            </div>
            
            
            

            <div>
            
              <form action="" class="row" method="get">
              <input type="hidden" name="id" value="<?php echo $producto['IdProducto']?>">
              <button class="btn btn-outline-info btn-lg" id="boton">
                  <svg src="bootstrap-5.1.0-dist/SVG/bag-plus.svg" width="32" height="32" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                  </svg>
                 Agregar al carrito
              </button> 
            </form>
            <form action="" class="row" method="get">
              <button class="btn btn-outline-success btn-lg" id="boton">
                <svg src="bootstrap-5.1.0-dist/SVG/currency-dollar.svg" width="32" height="32" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                  <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                </svg>
                Comprar
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