<?php
include("conexion.php");
$conexion = abrirConexion();


$sql="SELECT  Categorias FROM producto group by Categorias";
$resultado = $conexion->query($sql);

echo "<select name=\"selecciones\" class=\"form-select\" onchange=\"mostrarJugadores(this.value)\">";
echo "<option value=\"\">Categorias</option>";


while($fila = $resultado->fetch_assoc()) {
echo "<option value=\"" . $fila['Categorias'] . "\">" . $fila['Categorias'] . "</option>";
 }
echo "</select>";

cerrarConexion($conexion);

?>