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
    <title>Mi Perfil</title>
</head>
<body>
  
    <header>
        <?php 
        include("php/conexion.php");
        include("php/UserF.php");
        $conexion = abrirConexion();
        session_start();
        if (isset($_GET['Ci'])){
            echo "<script> sessionStorage.removeItem('es');";
            unset($_SESSION['email']);
            echo "location.href = 'index.html'</script>";
            
        }else{
            if (isset($_SESSION['email'])){
                $EMAIL=$_SESSION['email'];
                $NC = obtenerusuarioE($conexion, $EMAIL);
                $nombre= $NC["Nombre"]. " ". $NC["Apellido"]; 
                $pasword = $NC["Direccion"];
                $E=$NC['Es'];
                cerrarConexion($conexion);
                echo "<script type=\"text/javascript\"> MYAPP = {es: '$E'}; ";
                echo "sessionStorage.setItem('es', MYAPP.es);</script>";
                $fecha_nacimiento= $NC['Fnac'];
                $Edad = obtener_edad($fecha_nacimiento);
            }    
            // }else{
            //     echo "<script>location.href = 'index.html'</script>";
            // }
        }

        ?>
        <script src="js/header.js"></script>
        <script src="js/funciones.js"></script>
    </header>
    <!--form-->
    
    <section class ="container">
        <div class="MS col align-self-center">
            <div class="row">
                <div class="col-md-5">
                    <img src="img/login.png" class="logo-perfil">
                </div>
                <div class="col-md-7">
                    <h1 style="font-size: 84px;"><?php echo $nombre;?></h1>
                    
                </div>
            </div>
            <br>
            <div class="row justify-content-between">
                <div class="col-md-6">
                    <h3>Gmail:</h3>
                    <p style="font-size: 24px;"><?php echo $EMAIL; ?></p>
                </div>
                <div class="col-md-6" >
                    <h3>Direccion</h3>
                    <p style="font-size: 24px;"><?php echo $pasword;?></p>
                    
                </div>
                <div class="col-md-4">
                    <h3>Ci:</h3>
                    <p style ="font-size: 24px;"><?php echo $NC['Ci'];?></p>
                </div>
                <div class="col-md-4">
                    <h3>Edad:</h3>
                    <p style ="font-size: 24px;"><?php echo $Edad; ?></p>
                </div>
                <div class="col-md-4">
                    <h3>Fecha de Nacimiento:</h3>
                    <p style ="font-size: 24px;"><?php echo $NC['Fnac']; ?></p>
                </div>
                <div class="row">
                    <?php $Ci=$NC['Ci'];?>
                    <a class="Esp btn btn-outline-info" href="<?php echo "modify.php?Ci=".$Ci;?>">
                        <svg src="bootstrap-5.1.0-dist/SVG/pencil-square.svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        Editar</a>
                    <a class="Esp btn btn-outline-danger" href="<?php echo "perfil.php?Ci=".$Ci;?>">
                        <svg src="bootstrap-5.1.0-dist/SVG/pencil-square.svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        Cerrar Sesión
                    </a>
                
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
</body>
</html>