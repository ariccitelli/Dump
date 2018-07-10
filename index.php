<?php
	
	if( isset($_GET["p"]) ){  //con isset se fija si existe la supervariable GET con el parametro "p", el == true no es necesario, lo hace redundante
		$pagina = $_GET["p"]; //asigno a $pagina el valor del parametro "p"
	} else {
		$pagina = "home"; //si no existe parametro p, asume que el modulo a cargar por default es home
	}

	include "header.php";
?>

<div class="container">	
<?php

	if( file_exists("{$pagina}.php") ){ //si "existe" el archivo **.php
		include "{$pagina}.php"; //le agrega el .php al get
	} else {
		include "404.php";
	}
	
?>	
</div>

<?php
 include "footer.php";
?>