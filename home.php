<?php
	//Array Secuencial
	//$producto = array("iPhone 6", 599.99, 600);

	//Array Asociativo
	// $producto = array(
	// 	"nombre" => "iPhone 6",
	// 	"precio" => 599.99,
	// 	"stock" => 600
	// );

	$api = file_get_contents("http://127.0.0.1/MercadoTECH/api/?d=productos");
	$productos = json_decode($api);

	$api = file_get_contents("http://127.0.0.1/MercadoTECH/api/?d=ultimos");
	$ultimos = json_decode($api);

	//print_r($productos);
	//print_r($ultimos);
	//die();


?>
<section id="page">
				<!-- PRODUCTOS DESTACADOS -->
<div class="shoes-grid">
	<div class="products">
		<h5 class="latest-product">PRODUCTOS DESTACADOS</h5>
	</div>
	<div class="product-left">
		<!-- Producto #1 -->
		<?php
			for($i = 0; $i < count($productos); $i++){
				/*
				if( ($i+1) % 3 == 0 ){ //<-- Si es multiplo de 3 ...
					$class = "grid-top-chain";
				} else {
					$class = null;
				}
				*/
				//Operador ternario:
				//$variable = (CONDICION) ? VALOR_VERDADERO : VALOR_FALSO;
				$class = ( ($i+1) % 3 == 0 ) ? "grid-top-chain" : null;
		?>
		<div class="col-sm-4 col-md-4 chain-grid <?php echo $class ?>">
			<a href="?p=producto&id=<?php echo $productos[$i]->idProducto ?>"><img class="img-responsive chain" src="<?php echo $productos[$i]->Imagen ?>" alt="" /></a>
			<div class="grid-chain-bottom">
				<h6><a href="?p=producto&id=<?php echo $productos[$i]->idProducto ?>"><?php echo $productos[$i]->Nombre ?></a></h6>
				<div class="star-price">
					<div class="dolor-grid"> 
						<span class="actual">$<?php echo $productos[$i]->Precio ?></span>
					</div>
					<a class="now-get get-cart" href="?p=producto&id=<?php echo $productos[$i]->idProducto ?>">VER MÁS</a> 
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"> </div>
</div>
<!-- ULTIMOS PRODUCTOS -->
<div class="shoes-grid">
	<div class="products">
		<h5 class="latest-product">ULTIMOS PRODUCTOS</h5>	
		<a class="view-all" href="productos.html">VER TODOS<span></span></a>
	</div>
	<div class="product-left">
		<?php
			foreach($ultimos as $ultimo){
		?>
		<!-- Producto #1 -->
		<div class="col-sm-4 col-md-4 chain-grid">
			<a href="producto.html"><img class="img-responsive chain" src="<?php echo $ultimo->Imagen ?>" alt=" " /></a>
			<span class="star"></span>
			<div class="grid-chain-bottom">
				<h6><a href="producto.html"><?php echo $ultimo->Nombre ?></a></h6>
				<div class="star-price">
					<div class="dolor-grid"> 
						<span class="actual">$<?php echo $ultimo->Precio ?></span>
					</div>
					<a class="now-get get-cart" href="producto.html">VER MÁS</a> 
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"> </div>
</div>
			</section>