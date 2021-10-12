<?php  
    session_start();
    if (!isset($_SESSION['nombre'])) {
        header('Location: ingresar.php');
    }elseif(isset($_SESSION['nombre'])){
        include 'model/conexion.php';
        $sentencia = $bd->query("SELECT * FROM t_usuario;");
        $usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }else{
        echo "Error en el sistema";
    }

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
 <head>
 	<meta charset="utf-8">
 	<link rel="stylesheet" href="css/inicio.css"><title>Principal</title>
        <link rel="stylesheet" type="text/css" href="inicioestilo.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
 </head>
<body background="diseños/SOV.png">


    <nav>

        <ul>

            <li><a href="inventario.php">Inventario</a></li>
            <li><a href="catalogo.php">Catalogo</a></li>
            <li><a href="Modulodeventas.php">Ventas</a></li>
            <li><a href="ingresar.php">Ingresar</a></li>

        </ul>

    </nav>

    <hr>
 		<h1>Principal</h1>
 	</div>
 	<p><img src="logo.png" width="500" height="500" align="right"></p>

    <div>
            <p><img src="logo.png" width="500" height="500" align="left"></p>
    </div>

    <center>
        <h1>Bienvenido: <?php echo $_SESSION['nombre'] ?></h1>
        <a href="cerrar.php">Cerrar Sesión</a>
    </center>

 </body>
 </html>