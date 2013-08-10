<?php


if(isset($_GET['accion'])){

	$accion = $_GET['accion'];
}else{
	die("Parámetros incorrectos, esta accion sera avisada al administrador junto con su IP: ".$_SERVER['REMOTE_ADDR']);
}

if($accion == "ingresar" || $accion == "registrar" || $accion == "salir"){



	function mostrar_mensaje($valor)
	{
		?>
		<!doctype html>
		<html lang="es">
		<head>
			<meta charset="UTF-8">
			<title>Procesando datos</title>
		</head>
		<body>
			<?php

				if($valor == "salir"){
					echo "<h1>Has salido satisfactoriamente</h1>";
				}

			?>
			
		</body>
		</html>
		<?php
	}

	if($accion = "ingresar"){


		// Verificamos con TRIM de que las cadenas de EMAIL y PASSWORD no tengan ningun espacio vacio al inicio y al final, y que tampoco se encuentren vacías.


		if(trim($_POST["email"]) != "" && trim($_POST['password']) != "")
		{
			$emailN = remover_etiquetas($_POST['email']);
			$passN = md5(md5(remover_etiquetas($_POST['password']))); 

			// Removemos etiquetas y limpiamos las cadenas de EMAIL y PASSWORD, y ciframos la contraseña con MD5 DOBLE.
			

		}

	}

	if($accion = "registrar"){

	}

	if($accion = "salir"){


		setcookie('miMail', "x", time()-3600);
		setcookie('miPass', "x", time()-3600);

		mostrar_mensaje('salir');

	}

}else{

	die("Parámetros incorrectos, esta accion sera avisada al administrador junto con su IP: ".$_SERVER['REMOTE_ADDR']);
}

?>