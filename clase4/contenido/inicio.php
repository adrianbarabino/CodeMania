<?php


$consulta = "SELECT I.*, C.nombre as categoria FROM item I INNER JOIN categorias C ON I.id_categoria = C.id ORDER BY id DESC LIMIT 0,5";


if($resultado = $mysqli->query($consulta)){
	while ($item = $resultado->fetch_array()) {

		?>
		<article>
			<figure>
				<img src="" alt="">
			</figure>
			<h2><a href="./?pagina=item&id=<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></a></h2>
			<h4><a href="./?pagina=categorias&id=<?php echo $item['id_categoria']; ?>"><?php echo $item['categoria']; ?></a></h4>
			<p class="descripcion">
				<?php echo cortar_palabras(strip_tags($item['descripcion']), 140, " ", "..."); ?>
			</p>
			<a href="./?pagina=item&id=<?php echo $item['id']; ?>">Ver más</a>

		</article>

		<?php

	}
}




?>