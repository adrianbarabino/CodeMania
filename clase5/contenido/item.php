<?php
setlocale(LC_ALL,"es_ES");
if(isset($_GET['id'])){

$id = $_GET['id'];

$consulta = "SELECT I.*, C.nombre as categoria FROM item I INNER JOIN categorias C ON I.id_categoria = C.id  WHERE I.id = ".$id." ORDER BY id DESC LIMIT 0,5";


if($resultado = $mysqli->query($consulta)){
	while ($item = $resultado->fetch_array()) {
		?>
		<article>
			<script>
			</script>
			<figure class="imagen-item">
				<img src="./imagenes/thumb/<?php echo $id; ?>.jpg" alt="<?php echo $item['nombre']; ?>">
			</figure>
			<section id="info-item">
				<h2 class="titulo-item"><?php echo $item['nombre']; ?></h2>
				<h4 class="categoria"><a href="./?pagina=categorias&id=<?php echo $item['id_categoria']; ?>"><?php echo $item['categoria']; ?></a></h4>
				<span class="fecha_ingreso">Fecha de Ingreso: <?php echo date("j", strtotime($item['fecha_ingreso']))." de ".traducirMes(date("F", strtotime($item['fecha_ingreso'])))." del ".date("Y", strtotime($item['fecha_ingreso']));     ?></span><br>
				<span class="disponibles">Disponibles: <?php echo $item['disponibles']; ?></span><br>
				<span class="precio">Precio: $<?php echo $item['precio']; ?></span>
				<a href="./?pagina=comprar&id=<?php echo $id; ?>">Comprar</a>
			</section>
			<h1><?php echo $item['nombre']; ?></h1>
			<p class="descripcion">
				<?php echo $item['descripcion']; ?>
			</p>
			
		</article>

		<?php
	}
}
}

?>