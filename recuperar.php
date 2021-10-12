<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <title>VaidrollTeamLogin4</title>
     <link rel="stylesheet" href="login.css">
     <link rel="stylesheet" href="estiloregistro.css">

</head>
<body background="diseños/SOV.png">
    <div class="cajafuera">
    <div class="formulariocaja">
        <div class="botondeintercambiar">
            <div id="btnvai"></div>
		</div>
		<!--Formulario para el login -->
        <div class="checkboxvai"><a onclick="abrirform()">Recuperar contraseña</a></div>
        
        </form>
		<!--Formulario para registrar -->

        </form>
        </div>
    </div>
    <script>
		
		function abrirform() {
  document.getElementById("formrecuperar").style.display = "block";
  
}

function cancelarform() {
  document.getElementById("formrecuperar").style.display = "none";
}
    </script>
<div class="caja_popup" id="formrecuperar">
  <form action="recu.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Recuperar contraseña</th></tr>
            <tr> 
                <td><b>&#128231; Correo</b></td>
                <td><input type="email" name="correo" required class="cajaentradatexto"></td>
            </tr>
            <tr> 	
               <td colspan="2">
				   <button type="button" onclick="cancelarform()" class="txtrecuperar">Cancelar</button>
				   <input class="txtrecuperar" type="submit" name="btnrecuperar" value="Enviar" onClick="javascript: return confirm('¿Deseas enviar tu contraseña a tu correo?');">
			</td>
            </tr>
        </table>
    </form>
	</div>
    <hr>
        <a href="ingresar.php">REGRESAR</a>
</body>
</html>

