<?php


require("../configuracion.php");
require("../conexion.php");
require("./verificar.php");

print_r($_POST);

function borrar_tabla($tabla, $id, $nombre)
{	
				global $mysqli;

				$query_borrar = "delete from $tabla where id='$id'";

				$mysqli->query($query_borrar);
				echo $nombre . " ha sido borrado exitosamente de la base de datos, seras redireccionado en unos segundos";
};

function crear_tabla($tabla, $campos)
{
				global $mysqli;

				// Serialize nos sirve para poder convertir un array en una cadena de texto...
				// Unserialize es para decifrar y poder volver esa cadena de texto en un array...

				$campos = unserialize($campos);
				switch ($tabla) {
					case 'item':
								$nombre      = $campos['nombre'];
								$descripcion = $campos['descripcion'];
								$id_categoria = $campos['id_categoria'];
								$fecha_ingreso   = $campos['fecha_ingreso'];
								$disponibles     = $campos['disponibles'];
								$precio    = $campos['precio'];

								$create_query = "insert into $tabla (nombre,id_categoria,fecha_ingreso,descripcion,disponibles,precio) VALUES ('$nombre','$id_categoria','$fecha_ingreso','$descripcion','$disponibles','$precio')";
								
					break;
					case 'compras':
								$id_usuario      = $campos['id_usuario'];
								$descripcion = $campos['descripcion'];
								$id_item = $campos['id_item'];
								$tipo_pago   = $campos['tipo_pago'];
								$id_estado     = $campos['id_estado'];
								$fecha    = $campos['fecha'];

								$create_query = "insert into $tabla (id_usuario,tipo_pago,fecha,descripcion,id_item,id_estado) VALUES ('$id_usuario','$tipo_pago','$fecha','$descripcion','$id_item','$id_estado')";
								
					break;
					case 'usuarios':
								$nombre      = $campos['nombre'];
								$email = $campos['email'];
								$rango = $campos['rango'];
								$password   = md5(md5($campos['password']));

								$create_query = "insert into $tabla (nombre,password,email,rango) VALUES ('$nombre','$password','$email','$rango')";
								
					break;
					case 'categorias':
								$nombre      = $campos['nombre'];
								$create_query = "insert into $tabla (nombre) VALUES ('$nombre')";
					break;
					case 't_pagos':
								$nombre      = $campos['nombre'];
								$create_query = "insert into $tabla (nombre) VALUES ('$nombre')";
					break;
					case 'estados':
								$nombre      = $campos['nombre'];
								$create_query = "insert into $tabla (nombre) VALUES ('$nombre')";
					break;

				}
				print_r($create_query);
				$mysqli->query($create_query);
}
function editar_tabla($tabla, $id, $campos)
{
				global $mysqli;

				// Serialize nos sirve para poder convertir un array en una cadena de texto...
				// Unserialize es para decifrar y poder volver esa cadena de texto en un array...

				$campos = unserialize($campos);
				switch ($tabla) {
					case 'item':
								$nombre      = $campos['nombre'];
								$descripcion = $campos['descripcion'];
								$id_categoria = $campos['id_categoria'];
								$fecha_ingreso   = $campos['fecha_ingreso'];
								$disponibles     = $campos['disponibles'];
								$precio    = $campos['precio'];

								$update_query = "update $tabla set nombre='$nombre',descripcion='$descripcion',id_categoria='$id_categoria',fecha_ingreso='$fecha_ingreso',disponibles='$disponibles',precio='$precio' WHERE id = '$id'";

								
					break;
					case 'compras':
								$id_usuario      = $campos['id_usuario'];
								$descripcion = $campos['descripcion'];
								$id_item = $campos['id_item'];
								$tipo_pago   = $campos['tipo_pago'];
								$id_estado     = $campos['id_estado'];
								$fecha    = $campos['fecha'];

								$update_query = "update $tabla set id_usuario='$id_usuario',descripcion='$descripcion',id_item='$id_item',tipo_pago='$tipo_pago',id_estado='$id_estado',fecha='$fecha' WHERE id = '$id'";
								
					break;
					case 'usuarios':
								$nombre      = $campos['nombre'];
								$email = $campos['email'];
								$rango = $campos['rango'];
								$password   = $campos['password'];
								$ultima_ip     = $campos['ultima_ip'];

								if($password == "no-editar"){
								$update_query = "update $tabla set nombre='$nombre',email='$email',rango='$rango' WHERE id = '$id'";
								}else{
								$password   = md5(md5($campos['password']));
								$update_query = "update $tabla set nombre='$nombre',email='$email',rango='$rango',password='$password' WHERE id = '$id'";
									
								}
								
					break;
					case 'categorias':
								$nombre      = $campos['nombre'];
								$update_query = "update $tabla set nombre='$nombre' WHERE id = '$id'";
					break;
					case 't_pagos':
								$nombre      = $campos['nombre'];
								$update_query = "update $tabla set nombre='$nombre' WHERE id = '$id'";
					break;
					case 'estados':
								$nombre      = $campos['nombre'];
								$update_query = "update $tabla set nombre='$nombre' WHERE id = '$id'";
					break;

				}
								$mysqli->query($update_query);

}




$accion = $_REQUEST['accion'];
$tabla = $_REQUEST['tabla'];


if ($_REQUEST['accion'] == 'editar') {



$id = $_REQUEST['id'];

editar_tabla($tabla, $id, serialize($_REQUEST));

?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editando...</title>
	<!-- Redireccionamos a la pagina de editar -->
<meta http-equiv="Refresh" content="1;url=index.php?pagina=formularios&tabla=<?php
echo $tabla;
?>&accion=editar&id=<?php
				echo $id;
?>">
</head>
<body>
	Serás redireccionado en los próximos segundos.
</body>
</html>
<?php



}elseif($_REQUEST['accion'] == 'crear'){


crear_tabla($tabla, serialize($_REQUEST));
$id = $mysqli->insert_id;
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editando...</title>
	<!-- Redireccionamos a la pagina de editar -->
<meta http-equiv="Refresh" content="1;url=index.php?pagina=formularios&tabla=<?php
echo $tabla;
?>&accion=editar&id=<?php
				echo $id;
?>">
</head>
<body>
	Serás redireccionado en los próximos segundos.
</body>
</html>
<?php



}elseif($_REQUEST['accion'] == 'borrar'){
$id = $_REQUEST['id'];

$nombre = $_REQUEST['nombre'];

if(!isset($nombre)){
	"Elemento";
}
borrar_tabla($tabla, $id, $nombre);
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<meta http-equiv="Refresh" content="1;url=index.php?pagina=<?php
echo $tabla;
?>">
</head>
<?php
} 

?>