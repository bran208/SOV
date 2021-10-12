<?php 
	session_start();
	if (isset($_SESSION['nombre'])) {
		header('Location: inicio.php');
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<title>Inicio de sesion</title>
	<link rel="stylesheet" type="text/css" href="estiloingresar.css">
</head>
<body background="diseños/SOV.png">

	<form action="loginProceso.php" method="POST">

	<section class="form-login">
		
		<h5>Inicio de sesion</h5>
         <input class="controls" type="text" name="txtUsu" value="" placeholder="user">
         <input class="controls" type="password" name="txtPass" value="" placeholder="password">
         <input class="buttons" type="submit" value="Iniciar sesión">

		<div class="link">
			
			<p><a href="recuperar.php">Recuperar contraseña</a></p>
			<p><a href="registro.php">Registrese</a></p>

		</div>

	</section>

	</form>

	
	
</body>
</html>