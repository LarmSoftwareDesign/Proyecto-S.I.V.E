<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- css de boostrap-->
    <link rel="stylesheet" href="bootstrap-5.1.0-dist/css/bootstrap.min.css">
    
    <!--css-->
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <script src="js/funciones.js"></script>
    <title>Perfil Actual</title>
</head>
<body>
    <header>
      <script src ="js/header.js"> </script>
      
    </header>
    <?php
      if (isset($_GET['Ci'])){
          include("php/conexion.php");
          include("php/UserF.php");
          $conexion = abrirConexion();
          $CiO = $_GET['Ci'];
          $datos =obtenerusuarioCi($conexion,$CiO);
          $oldP = $datos['Contrasena'];
          cerrarConexion($conexion);

      ?>
    
    <!--registro-->
    <section class="container">
      
        <div class="caja-registro">
          <!--cambio de Registro-->
          <h1>Datos de Perfil</h1>
          <br>
          <br> 
          <form action="php/registeragenda.php" method="post" class="row g-3 needs-validation" novalidate>
            <div class="col-md-12">
              <label for="validationCustomUsername" class="form-label">Email:</label>  
              <input type="email" name="emailM" class="form-control" id="validationCustomUsername" value="<?php echo $datos['Email'];?>" aria-describedby="inputGroupPrepend" required placeholder="example@gmail.com" pattern="[a-zA-Z0-9._%+-]+@[a-z.-]+\.[a-z]{2,}$">
              <div class="valid-feedback">
                OK!
              </div>
              <div class="invalid-feedback">
              Este no es un correo no es valido
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustom01" class="form-label">Ci: <?php echo $CiO;?></label>
              <input type="hidden" name="ciM" class="form-control" id="validationCustom01" required placeholder="" value="<?php echo $CiO;?>" pattern="[0-9]{8}">
              <div class="valid-feedback">
                OK!
              </div>
              <div class="invalid-feedback">
              La cedula son solo 8 numeros sin guion
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustom02" class="form-label">Nombre:</label>
              <!--* Al ingresar el required en el input nos enviará una alerta si detecta el campo vacio -->
              <!--* Con el pattern="[a-z]{3,20}" restringimos los rangos de caracteres a chequear y solo letras -->
              <!--* Autofus permite posicionar el cursos en un input al cargar el formulario -->
              <input type="text" class="form-control" id="validationCustom02" value="<?php echo $datos['Nombre'];?>" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ]{3,20}" placeholder="" autofocus name="nombreM">
              <div class="valid-feedback">
                Nombre OK!
              </div>
              <div class="invalid-feedback">
                Los nombres solo pueden contener letras con un minimo de 3 caracteres
              </div>
            </div>

            <div class="col-md-4">
              <label for="validationCustom03" class="form-label">Apellido:</label>
              <input type="text" class="form-control" id="validationCustom03" value="<?php echo $datos['Apellido'];?>" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ]{3,20}" placeholder="" autofocus name="apellidoM">
              <div class="valid-feedback">
                Apellido OK!
              </div>
              <div class="invalid-feedback">
                Los Apellidos solo pueden contener letras con un minimo de 3 caracteres
              </div>
            </div>
            <div class="col-md-4">
              <label for="form-label" class="validationCustom04">Fecha de Nacimiento:</label>
              <input type="date" class="form-control" name="fnacM" id="validationCustom04" required value="<?php echo $datos['Fnac'];?>" placeholder="" autofocus>
              <div class="valid-feedback">
                 OK!
              </div>
              <div class="invalid-feedback">
                ponga su fecha de nacimiento
              </div>
            </div>

            <div class="col-md-8">
              <label for="form-label" class="validationCustom05">Dirección:</label>
              <input type="text" class="form-control" name="direccionM" id="validationCustom05" value="<?php echo $datos['Direccion'];?>" required pattern="[a-zA-Z0-9]{5,30}" placeholder="" autofocus>
              <div class="valid-feedback">
                 OK!
              </div>
              <div class="invalid-feedback">
                Ponga su direccion
              </div>
            </div>
            
            <div class="col-md-6">
              <label for="validationCustom06" class="form-label">Nueva Contraseña:</label>
              <input type="password" class="form-control" id ="validationCustom06" name="contM" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}" placeholder="" autofocus>
              
              <div class="valid-feedback">
                Cumple con los Requisitos
              </div>
              <div class="invalid-feedback">
                No cumple con los Requisitos !
              </div>
              <!--*boton de mostrar-->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" onclick="myFunction()" >
                <label class="form-check-label">
                  Mostrar
                </label>
              </div>
              <div id="passwordHelpBlock" class="CM form-text">
                Debe tener de 8 a 20 caracteres de largo, contar con numeros, letras y sin espacios<br>
                Es opcional poner simbolos($%.!?)             
              </div>
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Verificar Contraseña:</label>
              <input type="password" class="form-control" id ="validationCustom07" name="verM" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}" placeholder="" autofocus>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" onclick="myFunction1()">
                <label class="form-check-label">
                  Mostrar
                </label>
              </div>
              <div class="valid-feedback">
                
              </div>
              <div class="invalid-feedback">
                
              </div>
          </div>
            
            <br>
            <div class="d-grid gap-2">
              <button class="btn btn-lg btn-primary" type="submit">Editar Perfil</button>
              
            </div>
            </form>
        
        </div>

    </section>
    <?php
      }else{
          echo "<div class='container'><h1>ERROR</h1></div>";
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
                       alert('Datos Validados Correctamente !!')
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