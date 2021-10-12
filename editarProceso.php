<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}

	include 'model/conexion.php';
	$id2 = $_POST['id2'];
	$cantidad = $_POST['txtcantidad'];
	$sentencia = $bd->prepare("UPDATE ventas SET cantidad = ? WHERE id_compras = ?;");
	$resultado = $sentencia->execute([$cantidad, $id2]);

	if ($resultado === TRUE) {
		header('Location: modulodeventas.php');
	}else{
		echo "Error";
	}
?>