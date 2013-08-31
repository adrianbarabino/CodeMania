<?php
function calcular_total($consulta_where)
{
	global $mysqli;
	$precio = 0;
	$consulta = "SELECT id, precio FROM item".$consulta_where;
	if($resultado = $mysqli->query($consulta)){
	while ($item = $resultado->fetch_array()) {
		$i = 0;
		foreach ($_SESSION['carrito'] as &$valor) {
			$valor_objeto = json_decode($valor);
			if($valor_objeto->id == $item['id']){
				$id_del_duplicado = $i;
			}
			$i++;
		}

		$cantidad = floatval(json_decode($_SESSION['carrito'][$id_del_duplicado])->cantidad);

		$precio = $precio+floatval($item['precio'])*$cantidad;
	}

}

return $precio;
}

	
	if(is_array($_SESSION['carrito'])){
		if(count($_SESSION['carrito']) > 1){

			$i = 0;
			foreach ($_SESSION['carrito'] as &$valor) {
				$valor_objeto = json_decode($valor);
				if($valor_objeto->id){

				   	if($i == 0){
					$consulta_where = " WHERE id = ".$valor_objeto->id;

				   	}else{
				   		
					$consulta_where .= " OR id = ".$valor_objeto->id;
				   	}
				}
				$i++;
			}

		}elseif(count($_SESSION['carrito']) == "1"){

			$consulta_where = " WHERE id = ".json_decode($_SESSION['carrito'][0])->id;
		}else{
			$consulta_where = " LIMIT 0";
			$sin_carrito = true;
		}
	}
if(!$sin_carrito == true){
?>
<table id="listar_carrito">
	<thead>
		<tr>
			<td>Nombre</td>
			<td>Cantidad</td>
			<td>Precio/unidad</td>
			<td>Precio total</td>
			<td>Accion</td>
		</tr>
	</thead>
	<tbody>
<?php



	$consulta = "SELECT id, nombre, precio FROM item".$consulta_where;


if($resultado = $mysqli->query($consulta)){
	while ($item = $resultado->fetch_array()) {

			?>
		<tr>
			<td><a href="./?pagina=item&id=<?php echo $item['id']; ?>"><?php echo $item['nombre']; ?></a></td>
			<td><?php 

		$i = 0;
		foreach ($_SESSION['carrito'] as &$valor) {
			$valor_objeto = json_decode($valor);
			if($valor_objeto->id == $item['id']){
				$id_del_duplicado = $i;
			}
			$i++;
		}

$cantidad = json_decode($_SESSION['carrito'][$id_del_duplicado])->cantidad;
echo $cantidad;
?></td>
			<td>$<?php echo $item['precio']; ?></td>
			<td>$<?php echo floatval($item['precio'])*floatval($cantidad); ?></td>
			<td>
					<a href="./index.php?pagina=comprar&id=<?php echo $item['id']; ?>"><?php echo $boton_editar; ?></a>
					<a href="./procesar.php?accion=borrar_carrito&callback=.%2F%3Fpagina%3Dcarrito&item=<?php echo $item['id']; ?>"><?php echo $boton_borrar; ?></a>


			</td>
		</tr>
		<?php

	}
}

?>
	</tbody>
</table>

<h3>Total de la compra: $<?php echo calcular_total($consulta_where); ?> </h3>

<?php
}else{
	echo "<h2>El carrito está vacío</h2>";
}
?>
