<?php
include("conexion.php");
include("productF.php");
$conexion = abrirConexion();


switch ($variable) {
    case '':
        # code...
        break;
    
    default:
        # code...
        break;
}
echo "<nav class=\"navbar navbar-light bg-light fixed-top\">";
echo "<div class=\"container-fluid\">";
echo "<a class=\"navbar-brand\" href=\"index.html\"><img src=\"img/logo.png\" alt=\"\" width=\"100\" height=\"50\"></a>";
echo "<form class=\"d-flex\">";
echo "<input class=\"form-control me-2\" type=\"search\" placeholder=\"busqueda....\" aria-label=\"Search\" ></form>";


echo " <form class=\"justify-content-end\">";
//! boton del carrito
echo "<button class=\"btn btn-sm btn-outline-info me-1 position-relative\" type=\"button\" onclick=\"location.href='carrito.html'\">";
echo "<svg src=\"bootstrap-5.1.0-dist/SVG/cart.svg\" width=\"32\" height=\"32\" fill=\"currentColor\" class=\"bi bi-cart\" viewBox=\"0 0 16 16\">";
echo "<path d=\"M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z\"/></svg>";
echo "<span class\"position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary\">+99 <span class= \"visually-hidden\">unread messages</span></span>  </button> ";
//* boron de perfil
echo "<button class=\"btn btn-sm btn-outline-primary me-1\" type=\"button\" onclick=\"location.href='perfil.php'\" >";
echo "<svg src=\"bootstrap-5.1.0-dist/SVG/person.svg\" width=\"32\" height=\"32\" fill=\"currentColor\" class=\"bi bi-person\" viewBox=\"0 0 16 16\">";
echo "<path d=\"M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z\"></path></svg>";
echo "</button>";
echo "<button class=\"navbar-toggler btn btn-info\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarToggleExternalContent\" aria-controls=\"navbarToggleExternalContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">";
echo "<span class=\"navbar-toggler-icon\"></span>";
echo "</button></form></div>";


//? segundo barra
echo "<div class=\"collapse\" id=\"navbarToggleExternalContent\">";
echo "<div class=\"bg-light\">";
echo "<div class=\"sef\">";
echo "<ul class=\"nav nav-pills\">";

//todo categorias
echo "<li class=\"nav-item dropdown\">";
echo "<a class=\"nav-link dropdown-toggle\" data-bs-toggle=\"dropdown\" href='#' role=\"button\" aria-expanded=\"false\">";
echo "<svg src=\"bootstrap-5.1.0-dist/SVG/tags.svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-tags\" viewBox=\"0 0 16 16\">";
echo "<path d=\"M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z\"/>";
echo "<path d=\"M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z\"/>";
echo "</svg> Categorias</a>";

echo "<ul class=\"dropdown-menu\">";
$resultadoc=obtenerCategorias($conexion);
if ($resultadoc == false){
  echo "Error";
}else{
    echo "<li><a class=\"dropdown-item\" href=\"#\">";
    
    while($fila = $resultadoc->fetch_assoc()) {
    echo "<svg src=\"bootstrap-5.1.0-dist/SVG/tags-fill.svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-tags-fill\" viewBox=\"0 0 16 16\">";
    echo "<path d=\"M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z\"/>";
    echo "<path d=\"M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z\"/>";
    echo "</svg>";
    echo $fila['Categorias'];
    echo "</a></li> ";
    echo "</ul></li>";
}
}

//? comprar
echo "<li class=\"nav-item\">";
echo "<a class=\"nav-link\" href=\"categorias.html\">";
echo "<svg src=\"bootstrap-5.1.0-dist/SVG/bag.svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-bag\" viewBox=\"0 0 16 16\">";
echo "<path d=\"M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z\"/></svg>";
echo "Comprar</a></li>";

//! historial
echo "<li class=\"nav-item\">";
echo "<a class=\"nav-link\" href=\"lista(historial).html\">";
echo "<svg src=\"bootstrap-5.1.0-dist/SVG/file-earmark-text.svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-file-earmark-text\" viewBox=\"0 0 16 16\">";
echo "<path d=\"M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z\"/>";
echo "<path d=\"M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z\"/></svg>";
echo "historial</a></li>";

// * info o ayuda
echo "<li class=\"nav-item\">";
echo "<a class=\"nav-link\" href=\"info.html\">";
echo "<svg src=\"bootstrap-5.1.0-dist/SVG/info-circle.svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-info-circle\" viewBox=\"0 0 16 16\">";
echo "<path d=\"M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z\"/>";
echo "<path d=\"m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z\"/>";

echo "</svg>ayuda</a></li></ul>";


echo "</div></div></div></div></nav>";



?>