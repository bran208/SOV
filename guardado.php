<?php  
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include 'model/conexion.php';
	$n_ombre = $_POST['nombres'];
	$a_pellido = $_POST['apellidos'];
	$e_mail = $_POST['email'];
	$p_word = $_POST['password'];

	$sentencia = $bd->prepare("INSERT INTO t_usuario(id_usuario,nombre_usu,correo,password_usu) VALUES (?,?,?,?);");
	$resultado = $sentencia->execute([$n_ombre,$a_pellido,$e_mail,$p_word]);

	if ($resultado === TRUE) {
		//echo "Insertado correctamente";
		header('Location: ingresar.php');
	}else{
		echo "Error";
	}
?>