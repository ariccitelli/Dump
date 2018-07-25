<?php
	include "db.php";
	include "../header.php";

	$productos = Obtener();

?>
<div class="container">
	<cite>
		Bienvenido Cosme Fulanito
		<a href="#" style="float:right">[x] Cerrar sesion</a>
	</cite>

	<h1>Listado de Productos</h1>

	
	<a href="admin/agregar.php" style="float:right">
		<button>+ Nuevo producto</button>
	</a>

	<div class="table-responsive">

		<table class="table table-striped">
			<tr>
				<th>#ID</th>
				<th>Imagen</th>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Stock</th>
				<th>Acciones</th>
			</tr>
			<!-- PLANTILLA DE UN PRODUCTO -->
			<?php foreach($productos as $producto){ ?>
			<tr>
				<td class="text-center"><?php echo $producto ["idProducto"] ?></td>
				<td class="text-center"><img src="<?php echo $producto ["Imagen"]?>" alt "" width="100"></td>
				<td class="text-center"><?php echo $producto ["Nombre"] ?></td>
				<td class="text-center"><?php echo $producto ["Precio"] ?></td>
				<td class="text-center"><?php echo $producto ["Stock"] ?></td>
				<td class="text-center">
				<a href="admin/actualizar.php?id=<?php echo $producto ["idProducto"] ?>">Actualizar</a>
				<a href="admin/eliminar.php?id=<?php echo $producto ["idProducto"] ?>">Eliminar</a>
				</td>
			</tr>
		<?php } ?>
		
		</table>
	</div>
</div>
<script>
	$(document).ready(function(){

		$(".eliminar").click(function(e){
			e.preventDefault();

			if( confirm("¿Está seguro que desea borra este producto?") )
				window.location.href = $(this).attr("href");
		});
	});
</script>
<?php include "../footer.php"; ?>