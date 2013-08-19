<table>
	<thead>
		<tr>
			<td>ID</td>
			<td>Categoría</td>
			<td>Nombre</td>
			<td>Descripción</td>
			<td>Fecha Creado</td>
			<td>Disponibles</td>
			<td>Precio</td>
			<td>Accion</td>
		</tr>
	</thead>
	<tbody>
		
	<?php

	// Consultamos los productos a nuestra base de datos

	$consulta = "SELECT I.*, C.nombre as categoria FROM item I INNER JOIN categorias C ON I.id_categoria = C.id ORDER BY id DESC";


if($resultado = $mysqli->query($consulta)){
	while ($item = $resultado->fetch_array()) {

			?>
			<tr>
				<td><?php echo $item["id"]; ?></td>
				<td><?php echo $item["categoria"]; ?></td>
				<td><?php echo $item["nombre"]; ?></td>
				<td><?php echo $item["descripcion"]; ?></td>
				<td><?php echo $item["fecha_ingreso"]; ?></td>
				<td><?php echo $item["disponibles"]; ?></td>
				<td><?php echo $item["precio"]; ?></td>
				<td>
					<a href="./acciones.php?accion=editar&tabla=item&id=<?php echo $item['id']; ?>">Editar</a>
					<a href="./acciones.php?accion=borrar&tabla=item&id=<?php echo $item['id']; ?>">Borrar</a>

				</td>
			</tr>
			<?php
		}
	}

	?>
	</tbody>
</table>