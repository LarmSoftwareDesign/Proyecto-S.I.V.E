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
    <title>Registro Empresarial</title>
</head>
<body>
    <header>
      <script src="js/funciones.js"></script>
       <script src="js/header.js"></script>
    </header>
    <?php
    include("php/conexion.php");
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
          <h1>Datos de la Empresa</h1>
          <br>
          <!--cambio de registro-->
          
          <br>
          <form action="php/registerEagenda.php" method="post" class="row g-3 needs-validation" novalidate>
            <div class="col-md-12">
              <label for="validationCustomUsername" class="form-label">Email:</label>  
              <input type="text" name="emailM" value="<?php echo $datos['Email'] ?>" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required pattern="[a-zA-Z0-9._%+-]+@[a-z.-]+\.[a-z]{2,}$">
              <div class="valid-feedback">
                OK!
              </div>
              <div class="invalid-feedback">
              Este no es un correo no es valido
              </div>
            </div>

            <div class="col-md-6">
              <label for="validationCustom01" class="form-label">Nombre de la empresa:</label>
              <!--* Al ingresar el required en el input nos enviará una alerta si detecta el campo vacio -->
              <!--* Con el pattern="[a-z]{3,20}" restringimos los rangos de caracteres a chequear y solo letras -->
              <!--* Autofus permite posicionar el cursos en un input al cargar el formulario -->
              <input type="text" class="form-control" id="validationCustom01" value="<?php echo $datos['Nomempresa'] ?>" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ]{3,20}" placeholder="" autofocus name="nomempresaM">
              <div class="valid-feedback">
                Nombre Valido!
              </div>
              <div class="invalid-feedback">
                Los nombres solo pueden contener letras  con un minimo de 3 caracteres
              </div>
            </div>

            <div class="col-md-6">
              <label for="validationCustom02" class="form-label">Telefono:</label>
              <input type="text" value="<?php echo $datos['Telefono'] ?>" name="telefonoM" class="form-control" id="validationCustom02" required placeholder="" pattern="[0-9]{9}">
              <div class="valid-feedback">
                OK!
              </div>
              <div class="invalid-feedback">
              El telefono son solo 9 numeros sin guion
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustom03" class="form-label">Rut:</label>

              <h4><?php echo $datos['Rut'] ?></h4>
              <input type="hidden" name="rutM" required placeholder="" value="<?php echo $Rut;?>" >
              
            </div>

            <div class="col-md-8">
              <label for="form-label" class="validationCustom05">Dirección:</label>
              <input type="text" value="<?php echo $datos['Direccion'] ?>" class="form-control" name="direccionM" id="validationCustom04" required pattern="{15,35}" placeholder="" autofocus>
              <div class="valid-feedback">
                 OK!
              </div>
              <div class="invalid-feedback">
                Ponga su direccion Correctamente.
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
            <div class="d-grid gap-2">
              <button class="btn btn-lg btn-primary" type="submit">Editar Perfil de la sEmpresa</button>
              
            </div>
            </form>
            
        </div>

          </div>
              
            
          </div>
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