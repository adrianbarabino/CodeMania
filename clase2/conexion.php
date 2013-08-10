<?php

$mysqli = new mysqli($config['dbhost'],$config['dbuser'], $config['dbpass'], $config['dbname']);

// Conectamos a la base de datos y si tenemos un valor positivo en $mysqli->connect_errno, imprimimos el error.

if($mysqli->connect_errno){

    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();

}else{
	// echo "<h1>Aprendi a conectar</h1>";
}

public function remover_etiquetas($mensaje)
{
	$mensaje = str_replace("<","<",$mensaje);
	$mensaje = str_replace(">",">",$mensaje);
	$mensaje = str_replace("\'","'",$mensaje);
	$mensaje = str_replace('\"',"\"",$mensaje);
	return $mensaje;
}

?>

