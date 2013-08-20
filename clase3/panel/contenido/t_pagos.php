<a href="./index.php?pagina=formularios&accion=crear&tabla=t_pagos" class="crear-nuevo">Crear nuevo</a>

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

	$consulta = "SELECT * FROM t_pagos ORDER BY id DESC";


if($resultado = $mysqli->query($consulta)){
	while ($item = $resultado->fetch_array()) {

			?>
			<tr>
				<td><?php echo $item["id"]; ?></td>
				<td><?php echo $item["nombre"]; ?></td>

				<td>
					<a href="./index.php?pagina=formularios&accion=editar&tabla=t_pagos&id=<?php echo $item['id']; ?>">Editar</a>
					<a href="./acciones.php?accion=borrar&tabla=t_pagos&id=<?php echo $item['id']; ?>">Borrar</a>

				</td>
			</tr>
			<?php
		}
	}

	?>
	</tbody>
</table>