
<a href="./index.php?pagina=formularios&accion=crear&tabla=usuarios" class="crear-nuevo">Crear nuevo</a>

<table>
	<thead>
		<tr>
			<td>ID</td>
			<td>Nombre</td>
			<td>Email</td>
			<td>Rango</td>
			<td>Contraseña</td>
			<td>Ultima IP</td>
			<td>Accion</td>
		</tr>
	</thead>
	<tbody>
		
	<?php

	// Consultamos los productos a nuestra base de datos

	$consulta = "SELECT * FROM usuarios ORDER BY id DESC";


if($resultado = $mysqli->query($consulta)){
	while ($item = $resultado->fetch_array()) {

			?>
			<tr>
				<td><?php echo $item["id"]; ?></td>
				<td><?php echo $item["nombre"]; ?></td>
				<td><?php echo $item["email"]; ?></td>
				<td><?php echo $item["rango"]; ?></td>
				<td><?php echo $item["password"]; ?></td>
				<td><?php echo $item["ultima_ip"]; ?></td>
				<td>
					<a href="./index.php?pagina=formularios&accion=editar&tabla=usuarios&id=<?php echo $item['id']; ?>">Editar</a>
					<a href="./acciones.php?accion=borrar&tabla=usuarios&id=<?php echo $item['id']; ?>">Borrar</a>

				</td>
			</tr>
			<?php
		}
	}

	?>
	</tbody>
</table>