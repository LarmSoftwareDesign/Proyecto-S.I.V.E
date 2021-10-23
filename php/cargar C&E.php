<?php
session_start();


echo "<div class=\"d-grid gap-2  mx-auto\" >";
            
echo "<div>";
echo "<input type=\"number\" name=\"cantidad\" id=\"Cantidad\" value=\"1\" min=\"1\" class=\"form-control\">";
echo "<input type=\"hidden\" name=\"id\" id =\"IDP\" value=\"". $_SESSION['idpV']."\">";
echo "<button class=\"btn btn-outline-info btn\" id=\"boton\" onclick=\"carrito()\">";
echo "<svg src=\"bootstrap-5.1.0-dist/SVG/bag-plus.svg\" width=\"32\" height=\"32\" fill=\"currentColor\" class=\"bi bi-bag-plus\" viewBox=\"0 0 16 16\">";
echo "<path fill-rule=\"evenodd\" d=\"M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z\"/>";
echo "<path d=\"M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z\"/>";
echo "</svg> Agregar al carrito</button></div>";
  

// <button class="btn btn-outline-success btn" id="boton">
//   <svg src="bootstrap-5.1.0-dist/SVG/currency-dollar.svg" width="32" height="32" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
//     <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
//   </svg>
//   Comprar
// </button>

?>