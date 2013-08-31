<?php


if(isset($_GET['id'])){

	$id = $_GET['id'];

if($loginOK){

$consulta = "SELECT I.*, C.nombre as categoria FROM item I INNER JOIN categorias C ON I.id_categoria = C.id  WHERE I.id = ".$id." ORDER BY id DESC LIMIT 0,1";


if($resultado = $mysqli->query($consulta)){
	while ($item = $resultado->fetch_array()) {
		$nombre_item = $item['nombre'];
		$item_disponibles = $item['disponibles'];
	}
}
?>
	<h2>Compra del artículo <?php echo $nombre_item; ?></h2>

	<form action="./procesar.php">
		<span>Disponibles: <?php echo $item_disponibles; ?></span><br>
		<label for="cantidad">Cantidad de artículos: </label>
		<input name="cantidad" type="number" min="1" max="<?php echo $item_disponibles; ?>" step="1" value="1">
		<input type="hidden" value="carrito" name="accion" id="accion">
		<input type="hidden" value="./?pagina=carrito" name="callback" id="callback">
		<input type="hidden" value="<?php echo $id; ?>" name="item" id="item">
		<button type="submit" value="Agregar al carrito">Agregar al carrito</button>
	</form>
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