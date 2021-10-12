<?php 

$contrasena='';
$usuario='root';
$nombrebd='base';

try {
	$bd = new PDO(
		'mysql:host=localhost; 
		dbname='.$nombrebd,
		$usuario,
		$contrasena
	);
} catch (Exception $e) {
	echo "Error de conexion".$e->getMessage();
}
?>