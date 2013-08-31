<?php
session_start();
require("./configuracion.php");
require("./conexion.php");
require("./panel/verificar.php");
require("./funciones.php");

if(isset($_GET['pagina'])){

	$pagina = $_GET['pagina'];
}else{
	$pagina = "inicio";
}


$boton_editar = '<i class="icon-edit icon-large"></i>';
$boton_borrar = '<i class="icon-remove icon-large"></i>';

require("plantilla.php");

// Si recibimos mediante el método GET, la variable PAGINA, hacemos que nuestra variable $pagina sea igual a ese valor, pero en el caso que no recibamamos esa variable, definimos que el valor de $pagina es inicio.


?>