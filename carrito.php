

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- css de boostrap-->
    <link rel="stylesheet" href="bootstrap-5.1.0-dist/css/bootstrap.min.css">
    <title>Carrito</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/productos.css">
    <link rel="stylesheet" href="css/footer.css">
    
</head>
<body onload="cargarEn()">

    <header>
        <?php
        include("php/conexion.php");
        include("php/UserF.php");
        if (isset($_GET['numcompraBD'])){

        }
        ?>
        <script src="js/header.js"></script>
        <script src="js/funcionesP.js"></script>
    </header>
    <section class="container-fluid">    
        <form method="get" action="compra.php" class="row justify-content-between" id="CED">
                    
            
        </form>
    </section>




    <!--footer-->
    <footer>
        <script src="js/footer.js"></script>   
    </footer>
    
      
    <!-- scripts de boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
</body>
</html>
