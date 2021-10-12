<?php

include('model/cone.php');

$correo = $_POST['correo'];

$queryusuario   = mysqli_query($conn,"SELECT * FROM t_usuario WHERE correo = '$correo'");
$nr             = mysqli_num_rows($queryusuario); 
if ($nr == 1)
{
$mostrar        = mysqli_fetch_array($queryusuario); 
$enviarpass     = $mostrar['password_usu'];

$paracorreo         = $correo;
$titulo             = "Recuperar contraseña";
$mensaje            = $enviarpass;
$tucorreo           = "From: xxxx@gmail.com";

if(mail($paracorreo,$titulo,$mensaje,$tucorreo))
{
    echo "<script> alert('Contraseña enviado');window.location= 'ingresar.php' </script>";
}else
{
    echo "<script> alert('Error');window.location= 'ingresar.php' </script>";
}
}
else
{
    echo "<script> alert('Este correo no existe');window.location= 'ingresar.php' </script>";
}
?>