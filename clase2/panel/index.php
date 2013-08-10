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

	require("cabecera.php");
	require("cuerpo.php");

}else{

?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Area Restringida</title>
</head>
<body>


	
</body>
</html>

<?php

}

?>

