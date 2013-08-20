<center><?php
$accion = $_GET['accion'];
$tabla = $_GET['tabla'];
$id = $_GET['id'];

if(!isset($id)){
	$id = "0";
}
if(!isset($accion)){
	die("Parametros incorrectos");
}

if(!isset($tabla)){
	die("Parametros incorrectos");
}else{

	switch($tabla){

		case "item":
		$consulta = "SELECT * FROM item WHERE id = ".$id." LIMIT 0,1";
		$consulta_db = $mysqli->query($consulta);

		if($resultado = $consulta_db->fetch_assoc()){
		
		$nombre = $resultado['nombre'];
		$descripcion = $resultado['descripcion'];
		$fecha_ingreso = $resultado['fecha_ingreso'];
		$disponibles = $resultado['disponibles'];
		$precio = $resultado['precio'];
		$id_categoria = $resultado['id_categoria'];

		}else{
		$nombre = 'nombre';
		$descripcion = 'descripcion';
		$fecha_ingreso = 'fecha_ingreso';
		$disponibles = 'disponibles';
		$precio = 'precio';
		$id_categoria = '0';

		}

		break;

		case "categorias":
		$consulta = "SELECT * FROM categorias WHERE id = ".$id." LIMIT 0,1";
		$consulta_db = $mysqli->query($consulta);

		if($resultado = $consulta_db->fetch_assoc()){
		
		$nombre = $resultado['nombre'];


		}else{
		$nombre = 'nombre';


		}

		break;	

		case "estados":
		$consulta = "SELECT * FROM estados WHERE id = ".$id." LIMIT 0,1";
		$consulta_db = $mysqli->query($consulta);

		if($resultado = $consulta_db->fetch_assoc()){
		
		$nombre = $resultado['nombre'];


		}else{
		$nombre = 'nombre';


		}

		break;	

		case "tipo_pago":
		$consulta = "SELECT * FROM tipo_pago WHERE id = ".$id." LIMIT 0,1";
		$consulta_db = $mysqli->query($consulta);

		if($resultado = $consulta_db->fetch_assoc()){
		
		$nombre = $resultado['nombre'];


		}else{
		$nombre = 'nombre';


		}

		break;	

		case "usuarios":
		$consulta = "SELECT * FROM usuarios WHERE id = ".$id." LIMIT 0,1";
		$consulta_db = $mysqli->query($consulta);

		if($resultado = $consulta_db->fetch_assoc()){
		
		$nombre = $resultado['nombre'];
		$email = $resultado['email'];
		$rango = $resultado['rango'];
		// en Password vamos a poner NO EDITAR, eso es porque no podemos leer la contraseña del usuario
		// Entonces si no editamos este campo, no se va a cambiar la contraseña del usuario.

		$password = "no-editar";
		$ultima_ip = $resultado['ultima_ip'];


		}else{
		$nombre = 'nombre';
		$email = 'email';
		$rango = 'rango';
		$password = 'password';
		$ultima_ip = 'ultima_ip';


		}

		break;
		case "compras":
		$consulta = "SELECT * FROM compras WHERE id = ".$id." LIMIT 0,1";
		$consulta_db = $mysqli->query($consulta);

		if($resultado = $consulta_db->fetch_assoc()){
		
		$id_usuario = $resultado['id_usuario'];
		$id_item = $resultado['id_item'];
		$tipo_pago = $resultado['tipo_pago'];
		$id_estado = $resultado['id_estado'];
		$fecha = $resultado['fecha'];
		$descripcion = $resultado['descripcion'];


		}else{

		$id_usuario = 'id_usuario';
		$id_item = 'id_item';
		$tipo_pago = 'tipo_pago';
		$id_estado = 'id_estado';
		$fecha = 'fecha';
		$descripcion = 'descripcion';


		}

		break;
	}


}




	switch($tabla){

		case "item":
		?>
		
		<form action="./acciones.php" id="formulario" method="POST" class="accion">
			<?php if($accion == "editar"){ ?>
			<input name="id" id="id" type="hidden" value="<?php echo $id; ?>">
			<?php } ?>
			<input name="accion" id="accion" type="hidden" value="<?php echo $accion; ?>">
			<input name="tabla" id="tabla" type="hidden" value="<?php echo $tabla; ?>">
			<br><label for="nombre">Nombre:</label>
			<input name="nombre" id="nombre" type="text" value="<?php echo $nombre; ?>">
			<br><label for="descripcion">Descripcion:</label>
			<textarea name="descripcion" id="descripcion" type="text"><?php echo $descripcion; ?></textarea>
			<br><label for="categoria">Categoría:</label>
			<select name="id_categoria" id="categoria">
			<?php
	$consulta_categorias = "SELECT * FROM categorias ORDER BY id DESC";


if($resultado_categorias = $mysqli->query($consulta_categorias)){
	while ($categoria = $resultado_categorias->fetch_array()) {
		?>

    <option <?php if($id_categoria == $categoria['id']){?> selected="selected" <?php }; ?> value="<?php echo $categoria['id'];?>"><?php echo $categoria['nombre'];?></option>
<?php
}
}
?>

			</select>
			<br><label for="fecha_ingreso">Fecha Ingresado:</label>
			<input name="fecha_ingreso" id="fecha_ingreso" type="text"value="<?php echo $fecha_ingreso; ?>">
			<br><label for="disponibles">Disponibles:</label>
			<input name="disponibles" id="disponibles" type="text" value="<?php echo $disponibles; ?>">
			<br><label for="precio">Precio:</label>
			<input name="precio" id="precio" type="text"value="<?php echo $precio; ?>">
			<input name="enviar" type="submit" value="enviar">
			<input name="limpiar" type="button" value="limpiar">
		</form>

		<?php
		
		break;
	case "categorias":
		?>
		
		<form action="./acciones.php" id="formulario" method="POST" class="accion">
			<?php if($accion == "editar"){ ?>
			<input name="id" id="id" type="hidden" value="<?php echo $id; ?>">
			<?php } ?>
			<input name="accion" id="accion" type="hidden" value="<?php echo $accion; ?>">
			<input name="tabla" id="tabla" type="hidden" value="<?php echo $tabla; ?>">
			<br><label for="nombre">Nombre:</label>
			<input name="nombre" id="nombre" type="text" value="<?php echo $nombre; ?>">
			<input name="enviar" type="submit" value="enviar">
			<input name="limpiar" type="button" value="limpiar">
		</form>

		<?php
		
		break;
	case "estados":
		?>
		
		<form action="./acciones.php" id="formulario" method="POST" class="accion">
			<?php if($accion == "editar"){ ?>
			<input name="id" id="id" type="hidden" value="<?php echo $id; ?>">
			<?php } ?>
			<input name="accion" id="accion" type="hidden" value="<?php echo $accion; ?>">
			<input name="tabla" id="tabla" type="hidden" value="<?php echo $tabla; ?>">
			<br><label for="nombre">Nombre:</label>
			<input name="nombre" id="nombre" type="text" value="<?php echo $nombre; ?>">
			<input name="enviar" type="submit" value="enviar">
			<input name="limpiar" type="button" value="limpiar">
		</form>

		<?php
		
		break;

	case "t_pagos":
		?>
		
		<form action="./acciones.php" id="formulario" method="POST" class="accion">
			<?php if($accion == "editar"){ ?>
			<input name="id" id="id" type="hidden" value="<?php echo $id; ?>">
			<?php } ?>
			<input name="accion" id="accion" type="hidden" value="<?php echo $accion; ?>">
			<input name="tabla" id="tabla" type="hidden" value="<?php echo $tabla; ?>">
			<br><label for="nombre">Nombre:</label>
			<input name="nombre" id="nombre" type="text" value="<?php echo $nombre; ?>">
			<input name="enviar" type="submit" value="enviar">
			<input name="limpiar" type="button" value="limpiar">
		</form>

		<?php
		
		break;

	case "usuarios":
		?>
		
		<form action="./acciones.php" id="formulario" method="POST" class="accion">
			<?php if($accion == "editar"){ ?>
			<input name="id" id="id" type="hidden" value="<?php echo $id; ?>">
			<?php } ?>
			<input name="accion" id="accion" type="hidden" value="<?php echo $accion; ?>">
			<input name="tabla" id="tabla" type="hidden" value="<?php echo $tabla; ?>">
			<br><label for="nombre">Nombre:</label>
			<input name="nombre" id="nombre" type="text" value="<?php echo $nombre; ?>">
			<br><label for="email">Email:</label>
			<input name="email" id="email" type="text" value="<?php echo $email; ?>">
			<br><label for="rango">Rango:</label>
			<select name="rango" id="rango">
				<option <?php if($rango == "1"){?>selected<?php };?>  value="1">Usuario Comun</option>
				<option <?php if($rango == "2"){?>selected<?php };?> value="2">Administrador</option>
			</select>
			<br><label for="password">Password:</label>
			<input name="password" id="password" type="text" value="<?php echo $password; ?>">
			<input name="enviar" type="submit" value="enviar">
			<input name="limpiar" type="button" value="limpiar">
		</form>

		<?php
		
		break;

	case "compras":
		?>
		
		<form action="./acciones.php" id="formulario" method="POST" class="accion">
			<?php if($accion == "editar"){ ?>
			<input name="id" id="id" type="hidden" value="<?php echo $id; ?>">
			<?php } ?>
			<input name="accion" id="accion" type="hidden" value="<?php echo $accion; ?>">
			<input name="tabla" id="tabla" type="hidden" value="<?php echo $tabla; ?>">

			<br><label for="descripcion">Descripcion:</label>
			<textarea name="descripcion" id="descripcion" type="text"><?php echo $descripcion; ?></textarea>
			<br><label for="usuario">Usuarios:</label>
			<select name="id_usuario" id="usuario">
			<?php
	$consulta_usuarios = "SELECT * FROM usuarios ORDER BY id DESC";


if($resultado_usuarios = $mysqli->query($consulta_usuarios)){
	while ($usuario = $resultado_usuarios->fetch_array()) {
		?>

    <option <?php if($id_usuario == $usuario['id']){?> selected="selected" <?php }; ?> value="<?php echo $usuario['id'];?>"><?php echo $usuario['nombre'];?></option>
<?php
}
}
?>

			</select>
			<br><label for="id_item">Item:</label>
			<select name="id_item" id="item">
			<?php
	$consulta_items = "SELECT * FROM item ORDER BY id DESC";


if($resultado_items = $mysqli->query($consulta_items)){
	while ($item = $resultado_items->fetch_array()) {
		?>

    <option <?php if($id_item == $item['id']){?> selected="selected" <?php }; ?> value="<?php echo $item['id'];?>"><?php echo $item['nombre'];?></option>
<?php
}
}
?>

			</select>
			<br><label for="id_estado">Estado:</label>
			<select name="id_estado" id="estado">
			<?php
	$consulta_estados = "SELECT * FROM estados ORDER BY id DESC";


if($resultado_estados = $mysqli->query($consulta_estados)){
	while ($estado = $resultado_estados->fetch_array()) {
		?>

    <option <?php if($id_estado == $estado['id']){?> selected="selected" <?php }; ?> value="<?php echo $estado['id'];?>"><?php echo $estado['nombre'];?></option>
<?php
}
}
?>

			</select>
			<br><label for="tipo_pago">Tipo de Pago:</label>
			<select name="tipo_pago" id="tipo_pago">
			<?php
	$consulta_tipo_pagos = "SELECT * FROM t_pagos ORDER BY id DESC";


if($resultado_tipo_pagos = $mysqli->query($consulta_tipo_pagos)){
	while ($tipo_pago = $resultado_tipo_pagos->fetch_array()) {
		?>

    <option <?php if($tipo_pago == $tipo_pago['id']){?> selected="selected" <?php }; ?> value="<?php echo $tipo_pago['id'];?>"><?php echo $tipo_pago['nombre'];?></option>
<?php
}
}
?>

			</select>
			<br><label for="fecha">Fecha:</label>
			<input name="fecha" id="fecha" type="text"value="<?php echo $fecha; ?>">
			<input name="enviar" type="submit" value="enviar">
			<input name="limpiar" type="button" value="limpiar">
		</form>

		<?php
		
		break;


	}



	




?>
</center>