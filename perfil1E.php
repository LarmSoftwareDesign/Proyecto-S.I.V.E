<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- css de boostrap-->
    <link rel="stylesheet" href="bootstrap-5.1.0-dist/css/bootstrap.min.css">
    <!--otros css-->
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" href="css/footer.css">
    <!--js-->
    <script src="js/funcionesP.js"></script>
    <title>Mi Perfil</title>
</head>
<body onload="cargarProductosE()">
  
    <header>
    <?php 
    include("php/conexion.php");
    include("php/empresF.php");
    include("php/productF.php");
    session_start();
    $conexion = abrirConexion();
    

    //! eliminar productos de empresa
    if (isset($_GET['idpB'])){
      $idproducto=$_GET['idpB'];
      $carpeta=obtenerproductoE($conexion,$idproducto);
      $carpetaName ='Archivos/'.$carpeta['Nomempresa'].'/'.$idproducto.'-'.$carpeta['Nombre_Producto'].'/';
      $exito = eliminarCarpetaproducto($carpetaName);    
      if ($exito){
      eliminarProducto($conexion,$idproducto);
      unset($carpeta);
      unset($carpetaName);
      unset($_GET['idpB']);}
      else{
        echo"error";
      }
    }


    //elimar empresa
    if (isset($_GET['RutD'])){
      $rut =$_GET['RutD'];
      $CCE =obtenerusuarioRut($conexion, $Rut);
      $carpetaE='Archivos/'.$CCE['Nomempresa'].'/';
      $exitoEC=eliminarCarpetaEmpresa($carpetaE);
      
      if ($exitoEC){
        $sql = "SELECT IdProducto from producto WHERE Rut=".$rut;
        $resultado = $conexion->query($sql);
        if ($resultado){
          while ($fila = $resultado->fetch_assoc()){
            $dml = "DELETE from compra WHERE IdProducto =".$fila['IdProducto'];
          }
          $exitoPE = eliminarPDE($conexion, $rut);
          if ($exitoPE){
            $exito =eliminarEmpresa($conexion, $rut);
            if ($exito){
              echo "<script> sessionStorage.removeItem('es');";
              unset($_SESSION['email']);
              unset($_GET['RutD']);
              unset($CCE);
              unset($carpetaE);
              echo "location.href = 'index.html'</script>";
            }else{
              echo "error 1";
            }
          }else{
            echo "error 2";
          }
        }else{
        }
      }else {
        echo "error 3";
      }
          
      
    }elseif (isset($_GET['Rut'])){
      unset($_SESSION['emailE']);
      echo "<script> sessionStorage.removeItem('es');";
      echo "location.href = 'index.html'</script>";
      
      }else{
        if (isset($_SESSION['emailE'])){
        $EMAIL=$_SESSION['emailE'];
        $NCE = obtenerempresaE($conexion, $EMAIL );
        $nomE= $NCE["Nomempresa"];
        $E='Empresa';
        cerrarConexion($conexion);
        echo "<script type=\"text/javascript\"> MYAPP = {es: '$E'}; ";
        echo "sessionStorage.setItem('es', MYAPP.es);</script>";

        }else{
          echo "<script>location.href = 'index.html'</script>";
        }
      }

?>
        <script src="js/header.js">
      </script>
        <script src="js/funciones.js"></script>
        
    </header>
    <!--form-->
    
    <section class ="container">
        <div class="MS">
            <div class="row">
                <div class="col">
                    <img src="img/login.png" class="logo-perfil">
                </div>
                <div class="col">
                    <h1 style="font-size: 84px;"><?php echo $nomE; ?></h1>
                </div>
            </div>
            <br>
            <div class="row justify-content-between">
                <div class="col-md-6">
                    <h3>Gmail:</h3>
                    <p style="font-size: 24px;"><?php echo $EMAIL; ?></p>
                </div>
                <div class="col-md-6">
                  <h3>Dirección:</h3>
                  <p style="font-size: 24px;"><?php echo $NCE['Direccion']; ?></p>
                </div>
                <div class="col-md-6">
                  <h3>Rut:</h3>
                  <p style="font-size: 24px;"><?php echo $NCE['Rut']; ?></p>
                </div>
                <div class="col-md-6">
                  <h3>Telefono:</h3>
                  <p style="font-size: 24px;"><?php echo $NCE['Telefono']; ?></p>
                </div>
                <div class="row">
                  <?php $Rut=$NCE['Rut'];?>
                  <a class="Esp btn btn-outline-info btn-lg" href="modify E.php?Rut=<?php echo $Rut;?>">
                      <svg src="bootstrap-5.1.0-dist/SVG/pencil-square.svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg>
                    Editar
                  </a>
                    
                  <a class="Esp btn btn-outline-danger btn-lg" href="perfil1E.php?Rut=<?php echo $Rut;?>">
                      <svg src="bootstrap-5.1.0-dist/SVG/pencil-square.svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg>
                    Cerrar Sesión
                  </a>
                  <a class="Esp btn btn-outline-dark" href="perfil1E.php?RutD=<?php echo $Rut;?>">
                        <svg src="bootstrap-5.1.0-dist/SVG/pencil-square.svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        Borrar mi cuenta
                    </a>
                </div>

            </div>

            </div>
        </div>

    </section>
    <section class="container" style="background-color:white; padding:2em; border-radius:10px;" id="productosCreados">
      
    </section>
    
    <footer>
        <script src="js/footer.js"></script>
    </footer>
    
   
    <!-- scripts de boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
</body>
</html>