<a href="./index.php?pagina=formularios&accion=crear&tabla=compras" class="crear-nuevo"><?php echo $boton_nuevo; ?></a>


<table id="listar_todos">
	<thead>
		<tr>
			<td>ID</td>
			<td>Usuario</td>
			<td>Item</td>
			<td>Pago</td>
			<td>Estado</td>
			<td>Fecha</td>
			<td>Descripción</td>
			<td>Accion</td>
		</tr>
	</thead>
	<tbody>
		
	<?php

	// Consultamos las compras a nuestra base de datos

	$consulta = "SELECT C.descripcion, C.fecha, C.id, I.nombre as item, E.nombre as estado, T.nombre as tipo_de_pago, U.nombre as nombre_usuario  FROM compras C LEFT JOIN usuarios U ON C.id_usuario = U.id LEFT JOIN item I ON C.id_item = I.id INNER JOIN estados E ON C.id_estado = E.id INNER JOIN t_pagos T ON C.tipo_pago = T.id  ORDER BY id DESC";

	// Utilizamos INNER JOIN para poder relacionar por ejemplo nuestro ID_usuario, con la tabla USUARIOS, y poder verificar cual es el USUARIO del que vamos a necesitar información.

	// Utilizamos INNER JOIN pero tambien podemos utilizar LEFT JOIN, que lo hace NO EXCLUYENTE..


if($resultado = $mysqli->query($consulta)){
	while ($item = $resultado->fetch_array()) {

			?>
			<tr>
				<td><?php echo $item["id"]; ?></td>
				<td><?php echo $item["nombre_usuario"]; ?></td>
				<td><?php echo $item["item"]; ?></td>
				<td><?php echo $item["tipo_de_pago"]; ?></td>
				<td><?php echo $item["estado"]; ?></td>
				<td><?php echo $item["fecha"]; ?></td>
				<td><?php echo $item["descripcion"]; ?></td>
				<td>
					<a href="./index.php?pagina=formularios&accion=editar&tabla=compras&id=<?php echo $item['id']; ?>"><?php echo $boton_editar; ?></a>
					<a href="./acciones.php?accion=borrar&tabla=compras&id=<?php echo $item['id']; ?>"><?php echo $boton_borrar; ?></a>

				</td>
			</tr>
			<?php
		}
	}

	?>
	</tbody>
</table>