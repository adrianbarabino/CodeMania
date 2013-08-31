<?php

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$consulta = "SELECT * FROM categorias WHERE id = ".$id." ORDER BY id DESC";


if($resultado = $mysqli->query($consulta)){
	while ($categoria = $resultado->fetch_array()) {
		?>
		
		<article>
			<h2><?php echo $categoria['nombre']; ?></h2>
<ul>
			<?php

$consulta_item = "SELECT I.*  FROM item I WHERE id_categoria = ".$_GET['id']." ORDER BY id DESC";


if($resultado_item = $mysqli->query($consulta_item)){
	while ($item = $resultado_item->fetch_array()) {
		?>
		
		<li>
			<figure>
				<img src="" alt="">
			</figure>
			<h2><a href="./?pagina=item&id=<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></a></h2>
			<h4><a href="./?pagina=categorias&id=<?php echo $item['id_categoria']; ?>"><?php echo $item['categoria']; ?></a></h4>
			<p class="descripcion">
				<?php echo cortar_palabras(strip_tags($item['descripcion']), 140, " ", "..."); ?>
			</p>
			<a href="./?pagina=item&id=<?php echo $item['id']; ?>">Ver más</a>

		</li>
		
		<?php


	}
}
			?>
		</ul>
		</article>

		<?php

	}
}



}else{

	$consulta = "SELECT * FROM categorias ORDER BY id DESC";


if($resultado = $mysqli->query($consulta)){
	while ($categoria = $resultado->fetch_array()) {

	?>
		<article>
			<figure>
				<img src="" alt="">
			</figure>
			<h2><a href="./?pagina=categorias&id=<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></a></h2>

		</article>

<?php
	}
}
}

?>