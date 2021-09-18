<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- css de boostrap-->
    <link rel="stylesheet" href="bootstrap-5.1.0-dist/css/bootstrap.min.css">
    <!--otros css-->
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/vender.css">
    <title>crear un producto</title>
</head>
<body>
    <header>
        <!--nav-->
        <nav class="navbar navbar-light bg-light fixed-top">
            <!--contenedor-->
            <div class="container-fluid">
                <!--logo-->
                <a class="navbar-brand" href="#"><img src="img/logo.png" alt="" width="100" height="50"></a>
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="busqueda...." aria-label="Search" >
                </form>
                <form class="justify-content-end">
                    <button class="btn btn-sm btn-outline-info me-1" type="button">
                        <svg src="bootstrap-5.1.0-dist/SVG/cart.svg" width="32" height="32" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                          </svg>
                    </button>
                    <button class="btn btn-sm btn-outline-primary me-1" type="button">
                        <svg src="bootstrap-5.1.0-dist/SVG/person.svg" width="32" height="32" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                        </svg>
                    </button>
                    
                    <button class="navbar-toggler btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </form>
            </div>
      
    
            
            
    
    
    
    
            <!--segundo menu-->
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-light">
                    <div class="sef">
                        <ul class="nav nav-pills">
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                <svg src="bootstrap-5.1.0-dist/SVG/tags.svg" width="16" height="16" fill="currentColor" class="bi bi-tags" viewBox="0 0 16 16">
                                    <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
                                    <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                                  </svg> Categorias
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">
                                    <svg src="bootstrap-5.1.0-dist/SVG/tags-fill.svg" width="16" height="16" fill="currentColor" class="bi bi-tags-fill" viewBox="0 0 16 16">
                                        <path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                        <path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z"/>
                                      </svg>
                                    Action
                                </a></li> 
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Separated link</a></li>
                              </ul>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">
                                <svg xmlns="bootstrap-5.1.0-dist/SVG/bag.svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                </svg>
                                Comprar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <svg src="bootstrap-5.1.0-dist/SVG/cash-coin.svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                                        <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                                        <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                                      </svg>
                                    Vender
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">
                                    <svg src="bootstrap-5.1.0-dist/SVG/file-earmark-text.svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                        <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                                        <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                                      </svg>
                                    historial</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link " href="#">
                                <svg src="bootstrap-5.1.0-dist/SVG/info-circle.svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                  </svg>
                                  ayuda</a>
                            </li>
                          </ul>
                    </div>
    
                    </div>
                </div>
              
    
            </div>
        </nav>
    </header>
    <section class="caja-producto">
        <div class="MS container">
            <h1>Nuevo Producto</h1>
            <form action="venderagenda.php ?>" class="row g-3">
                <div class="col-12">
                  <label for="inputName" class="form-label">Nombre del Producto:</label>
                  <input type="text" name="nomproducto" class="form-control" id="inputName" placeholder="ProductoX">
                </div>
                <div class="col-mb-3">
                    <label for="formFileMultiple" class="form-label">imagenes del producto</label>
                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                  </div>
                <div class="col-md-4">
                  <!--tipo de producto-->
                  <label for="inputState" class="form-label">Categoria:</label>
                  <select id="inputState" name="categoria" class="form-select">
                      <option selected></option>
                      <option>Vehículos</option>
                      <option>Tecnología</option>
                      <option>Deporte</option>
                      <option>Nutrición</option>
                      <option>Vestimenta</option>
                      <option>Servicios</option>
                      <option>Arte</option>
                      <option>Hogar</option>
                      <option>Electrodomésticos</option>
                  </select>
                </div>
                <div class="col-md-6">
                    <!--condicion de producto-->
                    <label for="exampleDataList" class="form-label">Codicion del producto:</label>
                    <input class="form-control" name="condicion" list="datalistOptions" id="exampleDataList" placeholder="Nuevo, renovado, etc..">
                    <datalist id="datalistOptions">
                      <option value="Nuevo">
                      <option value="Reacondicionado">
                      <option value="Usado">                
                    </datalist>
                </div>
                <div class="col-md-2">
                    <label for="inputPrecio" class="form-label">Precio:</label>
                    <input type="number" name="precio" class="form-control" id="inputPrecio">
                  </div>
                <div class="col-mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Descripción:</label>
                    <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                
                 <!--tipo de producto-->
                  <label for="inputState" class="form-label">Nacionalidad:</label>
                  <select id="inputState" name="nacionalidad" class="form-select">
                      <option selected></option>
                      <option>Uruguay</option>
                      <option>Argentina</option>
                      <option>Brasil</option>
                      <option>Paraguay</option>
                     
                  </select>
              
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                      Terminos y Condiciones
                    </label>
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Publicar</button>
                </div>
              </form>
                </div>

        </div>
    </section>

    <!--footer-->
    <footer>
        <div class="container-fluid">
          <div class="row align-items-end">
            <div class="ls col" style="background-color: blue; text-align: center;">
              <img src="img/izquierda.png" alt="" width="32" height="32">
              <a href = "#" style="color:white; text-decoration: none;">S.I.V.E</a>
              <img src="img/derecha.png" alt="" width="32" height="32">
            </div>
            <div class= "row justify-content-between" >
              <p class="terminos">
                  derechos reservados by S.I.V.E
              </p>
            </div>
          </div>
        </div>
      </footer>

    <!-- scripts de boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
</body>
</html>