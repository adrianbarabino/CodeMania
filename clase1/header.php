
		<header>
			<h1><?php echo $config['titulo_web']; ?></h1>
			<h2><?php echo $config['slogan_web']; ?></h2>

			<form action="buscar.php" method="GET">
				<!-- El metodo GET envia el parametro mediante la URL, en cambio el mètodo POST, está oculto -->
				<input type="text" placeholder="Que buscás?" name="q" id="q">
				<input type="submit" value="Ir">
				<!-- Si el action es buscar.php, cuando presionemos el boton buscar, redireccionaremos la pagina actual hacia la url buscar.php?q= (y el valor del input con name="q") -->

			</form>
		</header>