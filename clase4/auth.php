<?php


?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Autentificación</title>
		<link rel="stylesheet" href="./css/estilos.css">

	<script>
	$(document).on("ready", iniciar);
	function iniciar (argument) {

		$(document).on("click", "#form-inicio span.chico", function () {
	 		// Cuando hagamos click en SPAN con clase "chico" hacemos lo siguiente...
			// $(this) es el elemento actual, osea: #form-inicio span.chico
			// .parent() es el elemento padre, osea, el elemento superior a este.
			if($(this).text() == "Registrar"){
				$(this).parent().parent().find("#registrar").slideDown();
				$(this).parent().parent().find("#ingresar").slideUp();
			}
			if( $(this).text() == "Ingresar"){
				// Si el texto de este elemento es Ingresar hacemos que
				// Buscamos el elemento padre, el h2, y hacemos lo mismo, y llegamos al section#form-inicio
				// Ahi buscamos el elemento con ID registrar y lo ocultamos
				// y con ingresar lo mostramos
				
				$(this).parent().parent().find("#registrar").slideUp();
				$(this).parent().parent().find("#ingresar").slideDown();		
			}
			$("span.activo").addClass("chico");
			$("span.activo").removeClass("activo");
			$(this).removeClass("chico");
			$(this).addClass("activo");
		})
	 }
	 </script>

	<section id="form-inicio">
		
		<h2><span class="activo">Ingresar</span> <span class="chico">Registrar</span></h2>
		<form autocomplete="off" action="./procesar.php?accion=ingresar" method="POST" id="ingresar">
			<input type="hidden" name="callback" value="<?php echo $_GET['callback']; ?>">
			<input type="text" name="email" placeholder="Email">
			<input type="password" name="password" placeholder="Contraseña">
			<input type="submit" value="Ingresar">
		</form>


		<form autocomplete="off" action="./procesar.php?accion=registrar" method="POST" id="registrar" style="display:none;">
			<input type="hidden" name="callback" value="<?php echo $_GET['callback']; ?>">
			<input type="text" name="nombre" placeholder="Nombre">
			<input type="text" name="email" placeholder="Email">
			<input type="password" name="password" placeholder="Contraseña">
			<input type="submit" value="Registrar">
		</form>
	</section>
	</section>
</head>
<body>
	
</body>
</html>