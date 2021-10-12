<?php
session_start();

require_once("clase.php");

$usar_db = new DBControl();

if(!empty($_GET["accion"])) 
{
switch($_GET["accion"]) 
{
    case "agregar":
        if(!empty($_POST["cantidad"])) 
        {
            $codproducto = $usar_db->vaiQuery("SELECT * FROM productos WHERE id='" . $_GET["id"] . "'");
            $items_array = array($codproducto[0]["id"]=>array(
            'vai_nom'       =>$codproducto[0]["producto"],  
            'cantidad'   =>$_POST["cantidad"], 
            'vai_pre'       =>$codproducto[0]["precio"], 
            'vai_img'       =>$codproducto[0]["imagen"]
            ));
            
            if(!empty($_SESSION["items_carrito"])) 
            {
                if(in_array($codproducto[0]["id"],
                array_keys($_SESSION["items_carrito"]))) 
                {
                    foreach($_SESSION["items_carrito"] as $i => $j) 
                    {
                            if($codproducto[0]["id"] == $i) 
                            {
                                if(empty($_SESSION["items_carrito"][$i]["cantidad"])) 
                                {
                                    $_SESSION["items_carrito"][$i]["cantidad"] = 0;
                                }
                                $_SESSION["items_carrito"][$i]["cantidad"] += $_POST["cantidad"];
                            }
                    }
                } else 
                {
                    $_SESSION["items_carrito"] = array_merge($_SESSION["items_carrito"],$items_array);
                }
            } 
            else 
            {
                $_SESSION["items_carrito"] = $items_array;
            }
        }
    break;
    case "eliminar":
        if(!empty($_SESSION["items_carrito"])) 
        {
            foreach($_SESSION["items_carrito"] as $i => $j) 
            {
                if($_GET["eliminarcode"] == $i)
                {
                    unset($_SESSION["items_carrito"][$i]);  
                }           
                if(empty($_SESSION["items_carrito"]))
                {
                    unset($_SESSION["items_carrito"]);
                }
            }
        }
    break;
    case "vacio":
        unset($_SESSION["items_carrito"]);
    break;  
    case "pagar":
    echo "<script> alert('Gracias por su compra');window.location= 'modulodeventas.php' </script>";
        unset($_SESSION["items_carrito"]);
    
    break;  
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Estilodecatalogo.css">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Catalogo</title>
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

<div align="center"><h1>Carrito de compras</h1></div>
<div>
<div><h2>Lista de productos a comprar.</h2></div>


<?php
if(isset($_SESSION["items_carrito"]))
{
    $totcantidad = 0;
    $totprecio = 0;
?>  

<table>
<tr>
<th style="width:30%">Descripción</th>
<th style="width:10%">Cantidad</th>
<th style="width:10%">Precio x unidad</th>
<th style="width:10%">Precio</th>
<th style="width:10%"><a href="catalogo.php?accion=vacio">Limpiar</a></th>
</tr>   
<?php       
    foreach ($_SESSION["items_carrito"] as $item){
        $item_price = $item["cantidad"]*$item["vai_pre"];
        ?>
                <tr>
                <td><img src="<?php echo $item["vai_img"]; ?>" class="imagen_peque" /><?php echo $item["vai_nom"]; ?></td>
                <td><?php echo $item["id"]; ?></td>
                <td><?php echo $item["cantidad"]; ?></td>
                <td><?php echo "$ ".$item["vai_pre"]; ?></td>
                <td><?php echo "$ ". number_format($item_price,2); ?></td>
                <td><a href="catalogo.php?accion=eliminar&eliminarcode=<?php echo $item["id"]; ?>">Eliminar</a></td>
                </tr>
                <?php
                $totcantidad += $item["cantidad"];
                $totprecio += ($item["vai_pre"]*$item["cantidad"]);
        }
        ?>

<tr style="background-color:#f3f3f3">
<td colspan="2"><b>Total de productos:</b></td>
<td><b><?php echo $totcantidad; ?></b></td>
<td colspan="2"><strong><?php echo "$ ".number_format($totprecio, 2); ?></strong></td>
<td><a href="Modulodeventas.php?accion=pagar">Pagar</a></td>
</tr>

</table>        
  <?php
} else {
?>
<div align="center"><h3>¡El carrito esta vacío!</h3></div>

<?php 
}
?>
</div>

<div>
<div><h2>Productos</h2></div>
<div class="contenedor_general">
    <?php
    $productos_array = $usar_db->vaiquery("SELECT * FROM productos ORDER BY id ASC");
    if (!empty($productos_array)) 
    { 
        foreach($productos_array as $i=>$k)
        {
    ?>
        <div class="contenedor_productos">
            <form method="POST" action="modulodeventas.php?accion=agregar&id=
            <?php echo $productos_array[$i]["id"]; ?>">
            <div><img src="<?php echo $productos_array[$i]["imagen"]; ?>"></div>
            <div>
            <div style="padding-top:20px;font-size:18px;"><?php echo $productos_array[$i]["producto"]; ?></div>
            <div style="padding-top:10px;font-size:20px;"><?php echo "$".$productos_array[$i]["precio"]; ?></div>
            <div><input type="text" name="cantidad" value="1" size="2" /><input type="submit" value="Agregar" />
            </div>
            </div>
            </form>
        </div>
    <?php
        }
    }
    ?>
</div>
	    
	
</body>
</html>