<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<!--CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="Estiloregistro.css">
	<title>Registro</title>
</head>
<body>

	<div class="row">
		<header class="col-12">
			<div>
			<a href="index.html"><img src="img/logo.png"></a>
			</div>
		</header>
	</div>

	<section class="form-registro">
		<h3 align="center">Registrarme</h3>
		<form action="agenda.php" method="post">
		<input class="controles" type="number" name="ci" id="ci" placeholder="Cedula:">
		<input class="controles" type="text" name="nombre" id="nombre" placeholder="Nombre:">
		<input class="controles" type="text" name="apellido" id="apellido" placeholder="Apellido:">
		<input class="controles" type="password" name="contraseña" id="contraseña" placeholder="Contraseña:">
		<input class="controles" type="email" name="correo" id="correo" placeholder="Email:">
		<input class="controles" type="date" name="fnac" id="fnac" placeholder="Fecha de nacimiento:">
		<input class="controles" type="text" name="direccion" id="direccion" placeholder="Dirección">
		<a href="index.html"><input class="boton" class="controles" type="submit" name="registrar" value="Registrar"></a>
		<a href="Login.html"><input class="boton" class="controles" type="submit" name="login" value="Ya tengo cuenta"></a>
	</section>
	<!--Bundle-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

	<!--Separate-->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
</body>
</html>