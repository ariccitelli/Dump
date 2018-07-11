<?php

	//Array secuencial
	//$producto = array("iPhone 6", 599.99, 600);

	//Array asociativo
	//$producto = array(
	//	"nombre" => "iPhone 6",
	//	"precio" => 599.99,
	//	"stock" => 600
	// );

	//combinación de array asociativo dentro de array secuencial
   /* $productos = array(
        array('idProducto' => '1','Nombre' => 'Apple iPhone 6','Precio' => '499.99','Stock' => '500','Imagen' => 'https://image.ibb.co/j8Xx8T/P001.jpg'),
        array('idProducto' => '2','Nombre' => 'Apple iPad Pro','Precio' => '599.99','Stock' => '300','Imagen' => 'https://image.ibb.co/hMHm2o/P002.jpg'),
        array('idProducto' => '3','Nombre' => 'Google Nexus 7','Precio' => '299.99','Stock' => '300','Imagen' => 'https://image.ibb.co/jQVTF8/P003.jpg'),
        array('idProducto' => '4','Nombre' => 'Samsung Galaxy S7','Precio' => '459.99','Stock' => '650','Imagen' => 'https://image.ibb.co/dOjoF8/P004.jpg'),
        array('idProducto' => '5','Nombre' => 'Motorola Moto G','Precio' => '489.99','Stock' => '750','Imagen' => 'https://image.ibb.co/jgkH8T/P005.jpg'),
        array('idProducto' => '6','Nombre' => 'LG L40','Precio' => '199.69','Stock' => '350','Imagen' => 'https://image.ibb.co/kObPoT/P006.jpg'),
        array('idProducto' => '7','Nombre' => 'Apple Watch','Precio' => '199.69','Stock' => '350','Imagen' => 'https://image.ibb.co/mHT4oT/P007.jpg'),
        array('idProducto' => '8','Nombre' => 'HP Mini 110','Precio' => '399.89','Stock' => '400','Imagen' => 'https://image.ibb.co/hK2VTT/sin_foto.jpg')


	);*/

	

	$api = file_get_contents("http://localhost/MercadoTECH/api/?d=productos");
	$productos = json_decode($api);

	$api = file_get_contents("http://localhost/MercadoTECH/api/?d=ultimos");
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
			if ( $i+1 % 3 == 0 ){ //si es múltiplo de 3
				$class = "grid-top-chain";
			} else {
				$class = null;
			}
			*/
			//Operador ternario:
			//$variable = (CONDICION) ? VERDADERO : VALOR_FALSO;
			$class = ( ($i+1) % 3 == 0 ) ? "grid-top-chain" : null;

		 ?> 
		<div class="col-sm-4 col-md-4 chain-grid <?php echo $class ?>">
			<a href="?p=producto&id=<?php echo $productos [$i]["idProducto"] ?>"><img class="img-responsive chain" src=<?php echo $productos [$i] ["Imagen"] ?> /></a>
			<div class="grid-chain-bottom">
				<h6><a href="?p=producto&id=<?php echo $productos [$i]["idProducto"] ?>"><?php echo $productos [$i] ["Nombre"] ?></a></h6>
				<div class="star-price">
					<div class="dolor-grid"> 
						<span class="actual"><?php echo $productos [$i] ["Precio"] ?></span>
						<span><?php echo $productos [$i] ["Stock"] ?> unid.</span>
					</div>
					<a class="now-get get-cart" href="?p=producto&id=<?php echo $productos [$i]["idProducto"] ?>">VER MÁS</a> 
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
			<a href="producto.html"><img class="img-responsive chain" src="<?php echo $ultimo->Imagen?>" alt=" " /></a>
			<span class="star"></span>
			<div class="grid-chain-bottom">
				<h6><a href="producto.html"><?php echo $ultimo->Nombre ?></a></h6>
				<div class="star-price">
					<div class="dolor-grid"> 
						<span class="actual"><?php echo $ultimo->Precio ?></span>
						<span><?php echo $productos [3] ["Stock"] ?> unid.</span>

					</div>
					<a class="now-get get-cart" href="producto.html">VER MÁS</a> 
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	<?php } ?>
		<!-- Producto #2 -->
		<div class="col-sm-4 col-md-4 chain-grid">
			<a href="producto.html"><img class="img-responsive chain" src="images/productos/P005.jpg" alt=" " /></a>
			<span class="star"></span>
			<div class="grid-chain-bottom">
				<h6><a href="producto.html"><?php echo $productos [4] ["Nombre"] ?></a></h6>
				<div class="star-price">
					<div class="dolor-grid"> 
						<span class="actual"><?php echo $productos [4] ["Precio"] ?></span>
						<span><?php echo $productos [4] ["Stock"] ?> unid.</span>
					</div>
					<a class="now-get get-cart" href="producto.html">VER MÁS</a> 
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- Producto #3 -->
		<div class="col-sm-4 col-md-4 chain-grid grid-top-chain">
			<a href="producto.html"><img class="img-responsive chain" src="images/productos/P006.jpg" alt=" " /></a>
			<span class="star"></span>
			<div class="grid-chain-bottom">
				<h6><a href="producto.html"><?php echo $productos [5] ["Nombre"] ?></a></h6>
				<div class="star-price">
					<div class="dolor-grid"> 
						<span class="actual"><?php echo $productos [5] ["Precio"] ?></span>
						<span><?php echo $productos [5] ["Stock"] ?> unid.</span>
					</div>
					<a class="now-get get-cart" href="producto.html">VER MÁS</a> 
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"> </div>
</div>
			</section>