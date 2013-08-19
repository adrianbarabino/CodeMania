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


// Si el usuario ingreso, requerimos cabecera.php y cuerpo.php, en caso contrario mostramos el formulario.
if($loginOK){
	if($esAdmin){

		require("cabecera.php");
		require("navegacion.php");
		require("cuerpo.php");
	}else{
		die("Te falta..");
	}

}else{

?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Area Restringida</title>
</head>
<body>


	<h2>Ingresar</h2>
	<form action="procesar.php?accion=ingresar" method="POST">
		<input type="text" name="email" placeholder="Email">
		<input type="password" name="password" placeholder="Contraseña">
		<input type="submit" value="Ingresar">
	</form>
	

	<h2>Registro</h2>
	<form action="procesar.php?accion=registrar" method="POST">
		<input type="text" name="nombre" placeholder="Nombre">
		<input type="text" name="email" placeholder="Email">
		<input type="password" name="password" placeholder="Contraseña">
		<input type="submit" value="Registrar">
	</form>
	
</body>
</html>

<?php

}

?>

