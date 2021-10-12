<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/inicio.css"><title>Principal</title>
        <link rel="stylesheet" type="text/css" href="inicioestilo.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="style.css">
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
	
<?php include('model/cone.php');?>

<table>

<tr><th colspan="6"><h1>Listado de productos</h1></th></tr>
<tr>

<th>Imagen</th>
<th>Producto</th>
<th>Precio</th>
<th>cantidad</th>
<th>Acción</th>

</tr>

<?php

$sql="SELECT * FROM productos";
$resultado=mysqli_query($conn,$sql);

while($mostrar=mysqli_fetch_array($resultado))

{
?>

<tr>
	<td><?php echo "<img width='80' height='80' src='diseños/".$mostrar['imagen'].".png'>" ?></td>
	<td><?php echo $mostrar['producto'] ?></td>
	<td><?php echo $mostrar['precio'] ?></td>
	<td><?php echo $mostrar['cantidad'] ?></td>
	<td><?php echo $mostrar['id'] ?></td>
</tr>

<?php
}
?>

</table>
	
</body>
</html>