<?php


$loginOK = false;
$esAdmin = false;
$userID;
$userRango;
$userName;
$userMail;
$userIP;


if(isset($_COOKIE['miMail']) && isset($_COOKIE['miPass'])){


	// Verificamos si el usuario y contraseña coincide con el de algun usuario en la base de datos, mediante una consulta. Los datos los recojemos mediante COOKIES...


	$resultado = $mysqli->query("SELECT * FROM usuarios WHERE email='".$_COOKIE['miMail']."' AND password='".$_COOKIE['miPass']."'");


	if($row = $resultado->fetch_assoc()){
		// Si es que hay un resultado de nuestra consulta, lo guardamos en la variable ROW.

		setcookie("miMail", $_COOKIE['miMail'], time()+7776000);
		setcookie("miPass", $_COOKIE['miPass'], time()+7776000);

		// Entonces le renovamos la cookie por mucho tiempo más


		$loginOK = true;
		$userID = $row['id'];
		$userIP = $row['ultima_ip'];
		$userName = $row['nombre'];
		$userMail = $row['email'];
		$userRango = $row['rango'];
		if($userRango >= 2){
			$esAdmin = true;
		}

		// Seteamos las variables

	}else{

		setcookie("miPass", "x", time()-3600);
		setcookie("miMail", "x", time()-3600);
	}



	$resultado->free();
}


?>