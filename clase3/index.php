<?php

require("configuracion.php");
require("conexion.php");

if(isset($_GET['pagina'])){

	$pagina = $_GET['pagina'];
}else{
	$pagina = "inicio";
}


require("plantilla.php");

// Si recibimos mediante el método GET, la variable PAGINA, hacemos que nuestra variable $pagina sea igual a ese valor, pero en el caso que no recibamamos esa variable, definimos que el valor de $pagina es inicio.


?>