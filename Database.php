<?php

$server = 'localhost';
$username = 'root':
$password = '';
$Database = 'php_database2';

try {

	$conn = new PDO("mysql:host=$server;dbname=$database;",$username, )

}  catch (PDOException $e) {


die('connection failed: '.$e->getMenssage())

}

registro.html {

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
	$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':email',$_POST['email']);
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$stmt->bindParam('password', $password);

	if($stmt->execute()) 
	{
		$message = 'Successfully created new user';

	} else 
	{
		$message = 'Sorry there must have been an issue creating your accout';
	}
}
}

?>