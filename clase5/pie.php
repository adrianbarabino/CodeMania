

		<footer>
			<span>Sitio desarrollado por MI NOMBRE &copy; 2013</span>
		</footer>
	</section>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="./jquery.numeric.js"></script>

	<script>
	$(document).on("ready", iniciar);
	function iniciar (argument) {
		$("input[name=cantidad]").numeric({ decimal: false, negative: false }, function() { this.value = ""; this.focus(); });

		$(document).on("click", "#form-inicio span.chico", function () {
	 		// Cuando hagamos click en SPAN con clase "chico" hacemos lo siguiente...
			// $(this) es el elemento actual, osea: #form-inicio span.chico
			// .parent() es el elemento padre, osea, el elemento superior a este.
			if($(this).text() == "Registrar"){
				$(this).parent().parent().find("#registrar").slideDown();
				$(this).parent().parent().find("#ingresar").slideUp();
			}
			if( $(this).text() == "Ingresar"){
				// Si el texto de este elemento es Ingresar hacemos que
				// Buscamos el elemento padre, el h2, y hacemos lo mismo, y llegamos al section#form-inicio
				// Ahi buscamos el elemento con ID registrar y lo ocultamos
				// y con ingresar lo mostramos
				
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
</body>
</html>

