<table>
	<thead>
		<tr>
			<td>ID</td>
			<td>Nombre</td>
			<td>Accion</td>
		</tr>
	</thead>
	<tbody>
		
	<?php

	// Consultamos los productos a nuestra base de datos

	$consulta = "SELECT * FROM categorias ORDER BY id DESC";


if($resultado = $mysqli->query($consulta)){
	while ($item = $resultado->fetch_array()) {

			?>
			<tr>
				<td><?php echo $item["id"]; ?></td>
				<td><?php echo $item["nombre"]; ?></td>

				<td>
					<a href="./acciones.php?accion=editar&tabla=categorias&id=<?php echo $item['id']; ?>">Editar</a>
					<a href="./acciones.php?accion=borrar&tabla=categorias&id=<?php echo $item['id']; ?>">Borrar</a>

				</td>
			</tr>
			<?php
		}
	}

	?>
	</tbody>
</table>