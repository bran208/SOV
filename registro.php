<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="estiloregistro.css">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<title>Formulario de registro</title>
</head>
<body background="diseños/SOV.png">

	<section class="form-register"> 

		<h4>Formulario Registro</h4>
		<form action="guardado.php" method="POST">

		<input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre">
		<input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese su nombre de usuario">
		<input class="controls" type="email" name="email" id="email" placeholder="Ingrese su Correo">
		<input class="controls" type="password" name="password" id="password" placeholder="Ingrese su Contraseña">

		<p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p>

		<input type="hidden" name="oculto" value="1">

		<input class="botons" name="submit" type="submit" value="guardar">
		<p><a href="ingresar.php">¿Ya tengo cuenta?</a></p>
</form>
	</section>
	
</body>
</html>