<?php  
	session_start();
	if (!isset($_GET['id'])) {
		header('Location: modulodeventas.php');
	}

	


	if (!isset($_SESSION['nombre'])) {
		header('Location: ingresar.php');
	}elseif(isset($_SESSION['nombre'])){
		include 'model/conexion.php';
		$id = $_GET['id'];

		$sentencia = $bd->prepare("SELECT * FROM ventas WHERE id_compras = ?;");
		$sentencia->execute([$id]);
		$persona = $sentencia->fetch(PDO::FETCH_OBJ);
		//print_r($persona);
	}else{
		echo "Error en el sistema";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar Cantidad</title>
	<meta charset="utf-8">
</head>
<body>
	<center>
		<h3>Editar cantidad:</h3>
		<form method="POST" action="editarProceso.php">
			<table>
				<tr>
					<td>Cantidad: </td>
					<td><input type="text" name="txtcantidad" value="<?php echo $persona->cantidad; ?>"></td>
				</tr>
				<tr>
					<input type="hidden" name="oculto">
					<input type="hidden" name="id2" value="<?php echo $persona->id_compras; ?>">
					<td colspan="2"><input type="submit" value="EDITAR CANTIDAD"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>