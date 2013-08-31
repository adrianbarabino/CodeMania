<?php


function cortar_palabras($cadena, $limite, $corte=".", $puntos="…") {
 
if(strlen($cadena) <= $limite)
 
return $cadena;
 
if(false !== ($puntodecorte = strpos($cadena, $corte, $limite))){
 
if($puntodecorte < strlen($cadena)-1) {
 
$cadena = substr($cadena, 0, $puntodecorte) . $puntos;
 
}
 
}
 
return $cadena;
 
}
function verificar_numeros($valor)
{
    return preg_match('/^([0-9_]*)$/i', $valor);
}

function traducirMes($mes){

	switch ($mes) {
		case 'January':
			return 'enero';
			# code...
			break;

		case 'February':
			return 'febrero';
			# code...
			break;

		case 'March':
			return 'marzo';
			# code...
			break;

		case 'April':
			return 'abril';
			# code...
			break;

		case 'May':
			return 'mayo';
			# code...
			break;

		case 'June':
			return 'junio';
			# code...
			break;

		case 'July':
			return 'julio';
			# code...
			break;

		case 'August':
			return 'agosto';
			# code...
			break;

		case 'September':
			return 'septiembre';
			# code...
			break;

		case 'October':
			return 'octubre';
			# code...
			break;

		case 'November':
			return 'noviembre';
			# code...
			break;

		case 'December':
			return 'diciembre';
			# code...
			break;


	}
}

?>