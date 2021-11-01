<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- css de boostrap-->
    <link rel="stylesheet" href="bootstrap-5.1.0-dist/css/bootstrap.min.css">
    
    <!--otros css-->
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Business Registration</title>
</head>
<body>
    <header>
      <script src="js/funciones.js"></script>
       <script src="js/header.js"></script>
    </header>
    <?php
    include("php/conexion.php");
    include("php/productF.php");
    include("php/empresF.php");
    session_start();
     if (isset($_GET['Rut'])){
        
        $conexion = abrirConexion();
        $Rut = $_GET['Rut'];
        $datos =obtenerusuarioRut($conexion, $Rut);
        $oldP = $datos['Contrasena'];
        cerrarConexion($conexion);
    ?>
    <!--registro-->
    <section class="container">

        <div class="caja-registro">
          <h1>Company data</h1>
          <br>
          <!--cambio de registro-->
          
          <br>
          <form action="php/registerEagenda.php" method="post" class="row g-3 needs-validation" novalidate>
            <div class="col-md-12">
              <label for="validationCustomUsername" class="form-label">Email:</label>  
              <input type="text" name="emailM" value="<?php echo $datos['Email'] ?>" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required pattern="[a-zA-Z0-9._%+-\s]+@[a-z.-]+\.[a-z]{2,}$">
              <div class="valid-feedback">
                OK!
              </div>
              <div class="invalid-feedback">
              This is not an email is not valid
              </div>
            </div>

            <div class="col-md-6">
              <label for="validationCustom01" class="form-label">Company name:</label>
              <!--* Al ingresar el required en el input nos enviará una alerta si detecta el campo vacio -->
              <!--* Con el pattern="[a-z]{3,20}" restringimos los rangos de caracteres a chequear y solo letras -->
              <!--* Autofus permite posicionar el cursos en un input al cargar el formulario -->
              <input type="text" class="form-control" id="validationCustom01" value="<?php echo $datos['Nomempresa'] ?>" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ.\s]{3,20}" placeholder="" autofocus name="nomempresaM">
              <div class="valid-feedback">
              Valid Name!
              </div>
              <div class="invalid-feedback">
              Names can only contain letters with a minimum of 3 characters
              </div>
            </div>

            <div class="col-md-6">
              <label for="validationCustom02" class="form-label">Telephone:</label>
              <input type="text" value="<?php echo $datos['Telefono'] ?>" name="telefonoM" class="form-control" id="validationCustom02" required placeholder="" pattern="[0-9]{8,9}">
              <div class="valid-feedback">
                OK!
              </div>
              <div class="invalid-feedback">
              The phone is only 9 numbers without a hyphen
              </div>
            </div>
            <div class="col-md-5">
              <label for="validationCustom03" class="form-label">Rut:</label>

              <h4><?php echo $datos['Rut'] ?></h4>
              <input type="hidden" name="rutM" required placeholder="" value="<?php echo $Rut;?>" >
              
            </div>

            <div class="col-md-7">
              <label for="form-label" class="validationCustom05">Address:</label>
              <input type="text" value="<?php echo $datos['Direccion'] ?>" class="form-control" name="direccionM" id="validationCustom04" required pattern="[a-zA-Z0-9\s]{5,30}" placeholder="" autofocus>
              <div class="valid-feedback">
                 OK!
              </div>
              <div class="invalid-feedback">
              Enter your address Correctly.
              </div>
            </div>

            <div class="col-md-6">
              <label for="validationCustom06" class="form-label">New Password:</label>
              <input type="password" class="form-control" id ="validationCustom06" name="contM" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}" placeholder="" autofocus>
              
              <div class="valid-feedback">
              Meets the requirements
              </div>
              <div class="invalid-feedback">
              Does not accomplish the requirements !
              </div>
              <!--*boton de mostrar-->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" onclick="myFunction()" >
                <label class="form-check-label">
                 Show
                </label>
              </div>
              <div id="passwordHelpBlock" class="CM form-text">
              It must be 8 to 20 characters long, have numbers, letters and no spaces <br>
                It is optional to put symbols ($%.!?)             
              </div>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Verify Password:</label>
              <input type="password" class="form-control" id ="validationCustom07" name="verM" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}" placeholder="" autofocus>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" onclick="myFunction1()">
                <label class="form-check-label">
                 Show
                </label>
              </div>
              <div class="valid-feedback">
                
              </div>
              <div class="invalid-feedback">
                
              </div>
            </div>
            <div class="d-grid gap-2">
              <button class="btn btn-lg btn-primary" type="submit">Edit Company Profile</button>
              
            </div>
            </form>
            
        </div>

          </div>
              
            
          </div>
        </div>

    </section>
    <?php
      }else{
          echo "<div class='container' align= 'center'><h1>ERROR</h1></div>";
      }
    ?>

    <script>
      // Ejemplo de JavaScript de inicio para deshabilitar el envío de formularios si hay campos no válidos
      (function () {
        'use strict'

        //Obtener todos los formularios a los que queremos aplicar estilos de validación de Bootstrap personalizados
        // Buscamos la clase .needs-validation en el DOM (documento)
        var forms = document.querySelectorAll('.needs-validation')

        // Bucle sobre ellos y evitar la presentación
        Array.prototype.slice.call(forms)
          .forEach(function (form) {
            form.addEventListener('submit', function (event) {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }else{
                       alert('Correctly Validated Data !!')
              }

              form.classList.add('was-validated')
            }, false)
          })
        })()

      </script>



     <!--footer-->
     <footer>
        <script src="js/footer.js"></script>
      </footer>  
    <!-- scripts de boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
</body>
</html>