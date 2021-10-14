<?php
include("conexion.php");
$sql="SELECT * FROM producto order by Categorias";
$resultado = $conexion->query($sql);

echo "<select name=\"selecciones\" class=\"form-select\" onchange=\"mostrarJugadores(this.value)\">";
echo "<option value=\"\"> Elija una Selección:</option>";

while($fila = $resultado->fetch_assoc()) {
  echo "<option value=\"" . $fila['idsel'] . "\">" . $fila['nombre'] . "</option>";
}
echo "</select>";
$conexion->close();

?>