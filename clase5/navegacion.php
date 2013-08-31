
		<nav>
			<ul>
				<li><a href="./?pagina=inicio">Inicio</a></li>
				<li><a href="./?pagina=empresa">Empresa</a></li>
				<li><a href="./?pagina=categorias">Categorias</a></li>
				<li><a href="./?pagina=contacto">Contacto</a></li>
			</ul>
			<span id="miembros">
				<?php


				if($loginOK){

					?>
					hola <?php echo $userName; ?>, bienvenido | <a href="./procesar.php?accion=salir&callback=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">salir</a>
					<?php
				}else{

					?>
						<a href="./auth.php?callback=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">ingresa</a> o <a href="./auth.php?callback=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">registrate</a>
					<?php
				}
				?>
			 | <a href="./?pagina=carrito">mi carrito</a> <span class="en_carrito"><?php

			 if(is_array($_SESSION['carrito'])){
			 	$cantidad_carrito = count($_SESSION['carrito']);
			 }else{
			 	$cantidad_carrito = "0";
			 }
			 
			 echo $cantidad_carrito;

			 ?>
			</span>
			</span>
		</nav>
