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
      include("php/registerp.php");
      $conexion = abrirConexion();
      
      $titulo= $fila["Nombre_Producto"];
      $precio = $fila["Precio"];
      $descripcion= $fila["Descripcion"];
      cerrarConexion($conexion);
      ?>
    <!--js-->
    <script src="js/funciones.js"></script>
    <title>Comprar:</title>
</head>
<body>
    <header>
      <?php
      include("php/productF.php");
      $conexion=abrirConexion($conexion);

      
      ?>
        <script src="js/header.js"></script>
    </header>
    <section class="caja-productos" >
        <div class="PS container">
            <div class="row">
                <div class=" col-sm-2">
                    <div class="galeria">
                        <ul class="fila">
                            <li>
                                <a href="#" onclick="cambio(1)" class="position"><img src="img/G1.png" class="item" id="G1"></a>
                            </li>
                            <li>
                                <a href="#" onclick="cambio(2)" class="position"><img src="img/G2.jpg" class="item" id="G2"></a>
                            </li>
                            <li>
                                <a href="#" onclick="cambio(3)" class="position"><img src="img/G3.jpg" class="item" id="G3"></a>
                            </li>
                            <li>
                                <a href="#" onclick="cambio(4)" class="position"><img src="img/G4.jpg" class="item" id="G4" ></a>
                            </li>
                        </ul>

                      </div>
                </div>
                <div class="col">
                    <div class="imagen">
                        <img src="img/G1.png" class="item-principal" id="F">

                    </div>
                </div>
                <div class="col">
                    
                    <div class="content">
                        <h1>Nombre del producto</h1>
                        <br>
                        <h3>Precio:0.00$</h3> 
                        <br>
                        <h2>Descripcion:</h2> 
                        
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi quaerat voluptatum animi,
                            unde laboriosam, dolor, necessitatibus in nesciunt magnam maxime sit dignissimos at. Dolores 
                            amet repudiandae pariatur delectus hic nam!</p>
                        <br>
                        <div class="col-sm-4 ">
                            
                            <label class="ll form-label">Disponibles</label> 
                            <input type="number" value="4100" class="form-control" disabled>
                        </div>
                        <br>
                        <div class="col-sm-4 ">
                            
                            <label class="form-label">Cantidad</label> 
                            <input type="number" name="cant" min="0" maxlength="2" max="99" class="form-control">
                        </div>
                        <br>
                        <div class="cus gap-2 mx-auto">
                            <button class="btn btn-outline-success btn-lg">
                                <svg src="bootstrap-5.1.0-dist/SVG/currency-dollar.svg" width="32" height="32" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                    <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                                </svg>
                                    Comprar
                            </button>
                            <button class="btn btn-outline-info btn-lg">
                                <svg src="bootstrap-5.1.0-dist/SVG/bag-plus.svg" width="32" height="32" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                </svg>
                                Agregar al carrito
                            </button>
                        </div>
                    </div>
                    

                </div>
            </div>
            
            
        </div>
    </section>





    <section class="productos">
        <!-- contenedor -->  
        <div class="PC">
          <h4>Productos</h4>
  
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <div class="container">
         
          <div class="row justify-content-between">
            <div class="card" style="width: 14rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            <div class="card" style="width: 14rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            <div class="card" style="width: 14rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            <div class="card" style="width: 14rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            
          </div>
      </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <div class="container">
         
          <div class="row justify-content-between">
            <div class="card" style="width: 14rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            <div class="card" style="width: 14rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            <div class="card" style="width: 14rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            <div class="card" style="width: 14rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            
          </div>
      </div>
      
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
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


    <?php
    cerrarConexion($conexion);
    ?>
</body>
</html>