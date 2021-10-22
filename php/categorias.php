<?php
include("conexion.php");
include("productF.php");
$conexion = abrirConexion();


//?  cuanto resultados se encontraron
echo "<li class=\"item\">";
echo "<div class=\"buscados\">";
echo "<label for=\"\">Encontrados</label>";
echo "<span class= \"resultado\">0</span>";
echo "</div></li>";



//* categorias
echo "<li class=\"item\">";
echo "<div class=\"row\">";
echo "<div class=\"col-sm-12\">";
$resultadoc=obtenerCategorias($conexion);
if ($resultadoc == false){
  echo "Error";
}else{
    echo "<select id=\"categorias\" class=\"form-select\" >";
    echo "<option value=\"\">Categorias....</option>";
    while($fila = $resultadoc->fetch_assoc()) {
        echo "<option value=\"" . $fila['Categorias'] . "\">" . $fila['Categorias'] . "</option>";
    }
    echo "</select>";
}
echo "</div></div></div></li>";

//* condiciones
echo "<li class=\"item\">";
echo "<div class=\"row\">";
echo "<div class=\"col-sm-12\">";
$resultadoc=obtenerCondicion($conexion);
if ($resultadoc == false){
    echo "Error";
  }else{
      echo "<select id=\"condicion\" class=\"form-select\" >";
      echo "<option value=\"\">Condición...</option>";
      while($fila = $resultadoc->fetch_assoc()) {
          echo "<option value=\"" . $fila['Condicion'] . "\">" . $fila['Condicion'] . "</option>";
      }
      echo "</select>";
  }
  echo "</div></div></div></li>";

  echo "<li class=\"item\">";
  echo "<div class=\"row\">";
  echo "<div class=\"col-sm-12\">";
  echo "<select class=\"form-select\" id=\"orden\">";
  echo "<option value=\"\">Orden...</option>";
  echo "<option value=\"\">Precio menor</option>";
  echo "<option value=\"\">Precio mayor</option>";
  echo "</div></div></div></li>";

  echo "<li class=\"item\">";
  echo "<div class=\"row\">";
  echo "<div class=\"col-sm-12\">";  
  
  echo "</div></div></div></li>";

cerrarConexion($conexion);

?>