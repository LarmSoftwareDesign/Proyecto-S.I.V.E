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
    include("php/empresF.php");
    $conexion = abrirConexion();
    session_start();
    $EMAIL=$_SESSION['emailE'];
     $NCE = obtenerempresa($conexion, $EMAIL );
     $nomE= $NCE["Nomempresa"];
     $pasword = $NCE["Contraseña"];
     $E='Empresa';
     cerrarConexion($conexion);
    ?>
    <script type="text/javascript">
      
      
      MYAPP = {
        es: '<?php echo $E;?>'   
      };
      sessionStorage.setItem('es', MYAPP.es);
    
    </script>
        <script src="js/header.js">
      </script>
        <script src="js/funciones.js"></script>
    </header>
    <!--form-->
    
    <section class ="caja">
        <div class="MS container">
            <div class="row">
                <div class="col">
                    <img src="img/login.png" class="logo-perfil">
                </div>
                <div class="col">
                    <h1><?php echo $nomE; ?></h1>
                </div>
            </div>
            <br>
            <div class="row justify-content-between">
                <div class="col">
                    <span class="span">Gmail:</span>
                    <span class="span"><?php echo $EMAIL; ?></span>
                </div>
                <div class="col-md-6" >
                    <span class="span">Contraseña:</span>
                    <input type="password" value="<?php echo $pasword; ?>" class="form-control" disabled id ="validationCustom06">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" onclick="myFunction()" >
                      <label class="form-check-label">
                        Mostrar
                      </label>
                    </div>
                    
                 </div>

            </div>
            <br>
            <div class="col">
            
                <button class="btn btn-outline-info">
                    <svg src="bootstrap-5.1.0-dist/SVG/pencil-square.svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg>
                    Editar</button>
            </div>
        </div>

    </section>
    <section class="caja-ingreso">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="lC">
                    <table class=" table table-light">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="4">Pedidos:</th>
                                </tr>
                              <tr>
                                
                                <th >Nº</th>
                                <th >Fecha:</th>
                                <th >Estado</th>
                                <th >Costo:</th>
                              </tr>
                            </thead>
                            <tbody>
                            
                        
                           
                              <tr>
                                <th scope="row">#1</th>
                                <td>0:00 0/00/0000</td>
                                <td>¿?</td>
                                <td>0.00$</td>
                              </tr>
                              <tr>
                                <th scope="row">#2</th>
                                <td>0:00 0/00/0000</td>
                                <td>¿?</td>
                                <td>0.00$</td>
                              </tr>
                              <tr>
                                <th scope="row">#3</th>
                                <td>0:00 0/00/0000</td>
                                <td>¿?</td>
                                <td>0.00$</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                   
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