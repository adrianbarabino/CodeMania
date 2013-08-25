<?php


if(isset($_GET['id'])){

	$id = $_GET['id'];

if($loginOK){

$consulta = "SELECT I.*, C.nombre as categoria FROM item I INNER JOIN categorias C ON I.id_categoria = C.id  WHERE I.id = ".$id." ORDER BY id DESC LIMIT 0,1";


if($resultado = $mysqli->query($consulta)){
	while ($item = $resultado->fetch_array()) {
		$nombre_item = $item['nombre'];
	}
}
?>
	<h2>Compra del artículo <?php echo $nombre_item; ?></h2>
<?php
}else{
	?>	

	Debés ingresar o registrarte para poder hacer compras en el sistema.

	<?php
	$_GET['callback'] = $_SERVER['REQUEST_URI'];
	include("auth.php");
	?>


	<?php
}
}

?>