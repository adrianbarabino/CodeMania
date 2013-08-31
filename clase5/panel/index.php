<?php


// Cargamos los archivos de configuracion y de conexion.php
require("../configuracion.php");
require("../conexion.php");
require("./verificar.php");


// ./ se refiere a la carpeta actual, ../ se refiere a la carpeta padre, ../.. dos niveles arriba y asi sucesivamente. y si usamos / solo, refiere a la carpeta raiz

if(isset($_GET['pagina'])){

	$pagina = $_GET['pagina'];
}else{
	$pagina = "inicio";
}

$boton_editar = '<i class="icon-edit icon-large"></i>';
$boton_borrar = '<i class="icon-remove icon-large"></i>';
$boton_nuevo = '<i class="icon-plus-sign-alt icon-large"></i> Crear Nuevo';




// Si el usuario ingreso, requerimos cabecera.php y cuerpo.php, en caso contrario mostramos el formulario.
if($loginOK){
	if($esAdmin){
		$titulo = "Panel de Administración";

		require("cabecera.php");
		require("navegacion.php");
		require("cuerpo.php");
		require("pie.php");
	}else{
		die("Te falta..");
	}

}else{
		$titulo = "Area Restringida";
		require("cabecera.php");
		?>
	<h1 class="saludo_off"><?php echo $config['titulo_web']; ?> - <i class="icon-group"></i> Miembros</h1>

	<p class="sinlogear">Para poder acceder a esta sección debes ingresar en el sistema, o registrarte.</p>
	

	<section id="form-inicio">
		
		<h2><span class="activo">Ingresar</span> <span class="chico">Registrar</span></h2>
		<form autocomplete="off" action="procesar.php?accion=ingresar" method="POST" id="ingresar">
			<input type="text" name="email" placeholder="Email">
			<input type="password" name="password" placeholder="Contraseña">
			<input type="submit" value="Ingresar">
		</form>


		<form autocomplete="off" action="procesar.php?accion=registrar" method="POST" id="registrar" style="display:none;">
			<input type="text" name="nombre" placeholder="Nombre">
			<input type="text" name="email" placeholder="Email">
			<input type="password" name="password" placeholder="Contraseña">
			<input type="submit" value="Registrar">
		</form>
	</section>
	</section>
</body>
</html>

<?php

}

?>

