<?php
session_start();
require("./configuracion.php");
require("./conexion.php");
require("./funciones.php");

$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 

if(isset($_GET['accion'])){

	$accion = $_GET['accion'];
}else{
	die("Parámetros incorrectos, esta accion sera avisada al administrador junto con su IP: ".$_SERVER['REMOTE_ADDR']);
}

if($accion == "ingresar" || $accion == "registrar" || $accion == "salir" || $accion == "carrito" || $accion == "borrar_carrito"){



	function mostrar_mensaje($valor)
	{

		$titulo = "Procesando datos";
		require("./cabecera.php");
				// Segun el valor de la variable VALOR mostramos el mensaje acorde.

				echo '<h1><i class="icon-info-sign icon-large"></i> ';
				switch($valor){

				case "salir":
					echo "Has salido satisfactoriamente";
				break;
				case "agregado_al_carrito":
					echo "Elemento agregado al carrito";
				break;
				case "carrito_eliminado":
					echo "Elemento eliminado del carrito";
				break;
				case "cantidad_invalida":
					echo "Cantidad Inválida";
				break;
				case "cantidad_actualizada":
					echo "Elemento actualizado en el carrito";
				break;
				case "ingreso_no_existe":
					echo "El email no existe en la base de datos";
				break;
				case "ingreso_fail_pwd":
					echo "Contraseña Incorrecta";
				break;
				case "email_incorrecto":
					echo "El email ingresado no es válido";
				break;
				case "ingreso_ok":
					echo "Has ingresado satisfactoriamente";
				break;
				case "registro_duplicado":
					echo "Ya hay otro usuario con ese email";
				break;
				case "registro_ok":
					echo "Te registraste satisfactoriamente";
				break;
				case "campos_vacios":
					echo "No llenaste todos los campos";
				break;
				case "parametros_incorrectos":
					echo "Parametros incorrectos";
				break;
				}
				echo "</h1>";



			?>
				<script>
				function ir_home () {
					<?php
					if(isset($_REQUEST['callback'])){

						?>

					location.href = "<?php echo urldecode($_REQUEST['callback']); ?>";
						<?php
					}else{
						?>
					location.href = "index.php";
						
						<?php
					}
					?>
				}
				setTimeout(ir_home, 2000);
				</script>
			</section>

		</body>
		</html>
		<?php
	}

	if($accion == "borrar_carrito"){
		if(isset($_GET['item'])){
			$item = $_GET['item'];
		$i = 0;
			foreach ($_SESSION['carrito'] as &$valor) {
			    $valor_objeto = json_decode($valor);
			    if($valor_objeto->id == $item){
			    	$id_del_duplicado = $i;
			    }
				$i++;
			}

		// Eliminamos el item del array
		unset($_SESSION['carrito'][$id_del_duplicado]);
		// Ya que borramos un elemento dentro de nuestro array
		// lo re ordenamos para que el array comience desde 0

		$_SESSION['carrito'] = array_values($_SESSION['carrito']);

		 // Ahora eliminamos los valores vacios
		$_SESSION['carrito'] = array_values(array_diff($_SESSION['carrito'], array('{}')));
			mostrar_mensaje("carrito_eliminado");
		}else{
			mostrar_mensaje("parametros_incorrectos");
		}		
	}
	if($accion == "carrito"){
		if(isset($_GET['item'])){
			// verificamos la cantidad que eligió el usuario

			if(isset($_GET['cantidad'])){
				if(verificar_numeros($_GET['cantidad'])){

					$consulta = "SELECT disponibles FROM item WHERE id = ".$item;
					if($resultado = $mysqli->query($consulta)){
						while ($item = $resultado->fetch_array()) {
							$item_disponibles = $item['disponibles'];
						}
					}		
					if($_GET['cantidad'] > $item_disponibles){
						mostrar_mensaje("cantidad_invalida");
						die();
					}else{
						$cantidad = $_GET['cantidad'];
					}
				}else{
					mostrar_mensaje("parametros_incorrectos");
					// Usamos DIE para que se deje de ejecutar la página.
					die();					
				}
			}else{
				$cantidad = "1";
			}


			$item = $_GET['item'];
			if(is_array($_SESSION['carrito'])){

			// $i es nuestro índice del array
			// hacemos un foreach para recorrer nuestro array
			// Valor objeto es el objeto convertido ya desde JSON
			// jd_del_duplicado solo se define si es que existe ya el item que vamos a ingresar.

			$i = 0;
			foreach ($_SESSION['carrito'] as &$valor) {
			    $valor_objeto = json_decode($valor);
			    if($valor_objeto->id == $item){
			    	$id_del_duplicado = $i;
			    }
				$i++;
			}




		}else{
			$_SESSION['carrito'] = array();
		}

		if(isset($id_del_duplicado)){
			$_SESSION['carrito'][$id_del_duplicado] =  '{"id": "'.$item.'", "cantidad":"'.$cantidad.'"}';
			mostrar_mensaje("cantidad_actualizada");

		}else{
			array_push($_SESSION['carrito'], '{"id": "'.$item.'", "cantidad":"'.$cantidad.'"}');
			mostrar_mensaje("agregado_al_carrito");
		}


		}else{
			mostrar_mensaje("parametros_incorrectos");

		}

	}

	if($accion == "ingresar"){


		// Verificamos con TRIM de que las cadenas de EMAIL y PASSWORD no tengan ningun espacio vacio al inicio y al final, y que tampoco se encuentren vacías.


		if(trim($_POST["email"]) != "" && trim($_POST['password']) != "")
		{
			$emailN = remover_etiquetas($_POST['email']);
			$passN = md5(md5(remover_etiquetas($_POST['password']))); 
			if (preg_match($regex, $emailN)) {


				// Removemos etiquetas y limpiamos las cadenas de EMAIL y PASSWORD, y ciframos la contraseña con MD5 DOBLE.

				$sql = "SELECT password FROM usuarios WHERE email='".$emailN."'";

				$resultado = $mysqli->query($sql);

				if($row = $resultado->fetch_assoc())
				{
					if($row['password'] == $passN)
					{
						// Creamos la cookie ya que el usuario se ha logueado satisfactoriamente...

						setcookie("miMail", $emailN, time()+7776000);
						setcookie("miPass", $passN, time()+7776000);


						mostrar_mensaje("ingreso_ok");

					}
					else
					{
						// SI la contraseña no coincide con el email del usuario, le decimos que puso mal su Contraseña...

						mostrar_mensaje("ingreso_fail_pwd");
					}
				}
				else
				{
					// Si el usuario no existe en la base de datos, le decimos que no existe D:

					mostrar_mensaje("ingreso_no_existe");
				}

			}else{
				mostrar_mensaje("email_incorrecto");
			}

		}else{
			mostrar_mensaje("campos_vacios");
		}

	}

	if($accion == "registrar"){

		if(trim($_POST['email']) != "" && trim($_POST['password']) != "" && trim($_POST['nombre']) != ""){

			$emailN = remover_etiquetas($_POST['email']);
			$passN = remover_etiquetas($_POST['password']);
			if (preg_match($regex, $emailN)) {

				$sql = "SELECT password FROM usuarios WHERE email='".$emailN."'";

				$resultado = $mysqli->query($sql);

				if($row = $resultado->fetch_assoc())
				{

					mostrar_mensaje("registro_duplicado");
				}
				else
				{
					$sql = "INSERT INTO usuarios (nombre,password,rango,email, ultima_ip) VALUES (";
					$sql .= "'".remover_etiquetas($_POST["nombre"])."'";
					$sql .= ",'".md5(md5(remover_etiquetas($_POST["password"])))."'";
					$sql .= ",'1'"; // 1 is the rank of Normal User
					$sql .= ",'".remover_etiquetas($_POST["email"])."'";
					$sql .= ",'".$_SERVER['REMOTE_ADDR']."'";
					$sql .= ")";

					$resultado = $mysqli->query($sql);

					mostrar_mensaje("registro_ok");
				}
			}else{
				mostrar_mensaje("email_incorrecto");
			}

		}else{
			mostrar_mensaje("campos_vacios");
		}

	}

	if($accion == "salir"){


		setcookie('miMail', "x", time()-3600);
		setcookie('miPass', "x", time()-3600);

		mostrar_mensaje('salir');

	}

}else{

	die("Parámetros incorrectos, esta accion sera avisada al administrador junto con su IP: ".$_SERVER['REMOTE_ADDR']);
}

?>