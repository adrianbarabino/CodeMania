<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo $titulo; ?></title>
	<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<!-- Cargamos nuestro DateTime Picker -->
	<script src="./jquery.datetimepicker.js"></script>
	<script src="./jquery.datepicker.spanish.js"></script>
	<link rel="stylesheet" href="./css/estilos.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet">

	 <script>
	 // Cuando el documnto está listo, ejecutamos la función iniciar..
	 $(document).on("ready", iniciar);

	 function iniciar (info) {
	 	$(document).on("click", "input[name=limpiar]", function () {
	 		$("form > input").attr("value", "");
	 		$("form > textarea").attr("value", "");
	 		$("form > input[name=limpiar]").attr("value", "limpiar");
	 		$("form > input[name=enviar]").attr("value", "enviar");
	 	})
	 	$('input[name="fecha"], input[name="fecha_ingreso"]').datetimepicker({ dateFormat: 'yy-mm-dd', timeFormat: 'hh:mm:ss' });


		$(document).on("click", "#form-inicio span.chico", function () {
	 		// Cuando hagamos click en SPAN con clase "chico" hacemos lo siguiente...
			// $(this) es el elemento actual, osea: #form-inicio span.chico
			// .parent() es el elemento padre, osea, el elemento superior a este.
			if($(this).text() == "Registrar"){
				$(this).parent().parent().find("#registrar").slideDown();
				$(this).parent().parent().find("#ingresar").slideUp();
			}
			if( $(this).text() == "Ingresar"){
				$(this).parent().parent().find("#registrar").slideUp();
				$(this).parent().parent().find("#ingresar").slideDown();		
			}
			$("span.activo").addClass("chico");
			$("span.activo").removeClass("activo");
			$(this).removeClass("chico");
			$(this).addClass("activo");
		})
	 }
	 </script>
	<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>
</head>
<body>
	<section id="contenedor">
