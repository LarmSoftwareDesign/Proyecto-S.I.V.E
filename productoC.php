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
      $conexion = abrirConexion();
        $EMAIL=$_SESSION['emailE'];
        $ID =$_SESSION['idp'];
      $conexion = abrirConexion();
      $producto= obtenerProducto($conexion, $ID );
      $NCE = obtenerempresa($conexion, $EMAIL);
    
      //! variables de carpetas
      
      ?>
    <!--js-->
    <script src="js/funciones.js"></script>
    <title>Comprar: <?php echo $producto['Nombre_Producto'];?></title>
</head>
<body>
    <header>
        <script src="js/header.js"></script>
    </header>
    <section class="container">
      <div class="caja-ingreso">

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