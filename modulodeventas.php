 <?php  
    session_start();
    if (!isset($_SESSION['nombre'])) {
        header('Location: ingresar.php');
    }elseif(isset($_SESSION['nombre'])){
        include 'model/conexion.php';
        $sentencia = $bd->query("SELECT * FROM ventas;");
        $ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
        //print_r($ventas);
    }else{
        echo "Error en el sistema";
    }


    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="estilomodulodeventas.css">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Ventas</title>
</head>
<body background="diseños/SOV.png">


    <nav>

        <ul>

            <li><a href="inicio.php">Principal</a></li>
            <li><a href="inventario.php">Inventario</a></li>
            <li><a href="catalogo.php">Catalogo</a></li>
            <li><a href="Modulodeventas.php">Ventas</a></li>
            <li><a href="ingresar.php">Ingresar</a></li>

        </ul>

    </nav>

    <hr>
<table>
            <tr>
                <td>imagen</td>
                <td>nombre</td>
                <td>informacion del producto</td>
                <td>cantidad</td>
                <td>precio</td>
            </tr>
        

<?php 
                foreach ($ventas as $dato) {
                    ?>
                    <tr>
                        <td><?php echo $dato->imagen; ?></td>
                        <td><?php echo $dato->nombre_p; ?></td>
                        <td><?php echo $dato->informacion; ?></td>
                        <td><?php echo $dato->cantidad; ?></td>
                        <td><?php echo $dato->precio; ?></td>
                        <td><a href="editar.php?id=<?php echo $dato->id_compras; ?>">Editar</a></td>
                        <td><a href="eliminar.php?id=<?php echo $dato->id_compras; ?>">Eliminar</a></td>
                    </tr>
                    <?php
                }
            ?>
	</table>
</body>
</html>