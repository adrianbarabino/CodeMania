<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Panel de Administracion</title>
	<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
	 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

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
	 }
	 </script>
	<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>
</head>
<body>

