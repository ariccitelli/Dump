<?php
		require 'db.php';

		if( $_SERVER["REQUEST_METHOD"] == "POST"){
			//Acá deberá procesar los datos

			$id = $_POST["id"];

			$datos = array(
			"Nombre"	=> filter_var ($_POST["nombre"], FILTER_SANITIZE_SPECIAL_CHARS),
			"Precio"	=> $_POST["precio"],
			"Marca"		=> $_POST["marca"],
			"Categoria"	=> 1,
			"Detalle"	=> $_POST["detalle"],
			"Imagen"	=> "https://image.ibb.co/hK2VTT/sin_foto.jpg",
			"Stock"		=> $_POST["stock"]
		);
			
		if( Actualizar($id, $datos) ){
			header("location: index.php?rta=ok");
		} else {
			header("location: index.php?rta=error");			
		}

		} else {
			//Acá deberá mostrar el formulario

		if( !isset($_GET["id"]) || !filter_var($_GET["id"], FILTER_VALIDATE_INT) )
			header("location: index.php");
		
		$id = $_GET["id"];

		$elegido = Obtener( $id );                      
		include "../header.php";
?>

<div class="container">
	<h1>Actualizar producto</h1>

	<form method="post" class="form-horizontal" enctype="multipart/form-data">

		<label class="control-label">Nombre:</label>
		<input class="form-control" type="text" name="nombre" value="<?php echo $elegido["Nombre"] ?>">

		<label class="control-label">Precio:</label>
		<input class="form-control" type="number" name="precio" value="<?php echo $elegido["Precio"] ?>">

		<label class="control-label">Stock:</label>
		<input class="form-control" type="number" name="stock" value="<?php echo $elegido["Stock"] ?>">

		<label class="control-label">Marca:</label>
		<input class="form-control" type="text" name="marca" value="2">

		<label class="control-label">Detalle:</label>
		<textarea class="form-control" rows="5" name="detalle"><?php echo $elegido["Detalle"] ?></textarea>
		
		<label class="control-label">Imagen:</label>
		<input type="file" name="imagen">
		
		<br>
		
		<button type="submit" class="btn btn-default">Guardar</button>
		<input type="hidden" name="id" value="<?php echo $elegido["idProducto"] ?>">

	</form>

</div>

<?php
		include "../footer.php";
	}
?>