<?php
	$productos = array(
		array('idProducto' => '1','Nombre' => 'Apple iPhone 6','Precio' => '499.99','Stock' => '500','Imagen' => 'https://image.ibb.co/j8Xx8T/P001.jpg'),
		array('idProducto' => '2','Nombre' => 'Apple iPad Pro','Precio' => '599.99','Stock' => '300','Imagen' => 'https://image.ibb.co/hMHm2o/P002.jpg'),
		array('idProducto' => '3','Nombre' => 'Google Nexus 7','Precio' => '299.99','Stock' => '300','Imagen' => 'https://image.ibb.co/jQVTF8/P003.jpg'),
		array('idProducto' => '4','Nombre' => 'Samsung Galaxy S7','Precio' => '459.99','Stock' => '650','Imagen' => 'https://image.ibb.co/dOjoF8/P004.jpg'),
		array('idProducto' => '5','Nombre' => 'Motorola Moto G','Precio' => '489.99','Stock' => '750','Imagen' => 'https://image.ibb.co/jgkH8T/P005.jpg'),
		array('idProducto' => '6','Nombre' => 'LG L40','Precio' => '199.69','Stock' => '350','Imagen' => 'https://image.ibb.co/kObPoT/P006.jpg'),
		array('idProducto' => '7','Nombre' => 'Apple Watch','Precio' => '199.69','Stock' => '350','Imagen' => 'https://image.ibb.co/mHT4oT/P007.jpg'),
		array('idProducto' => '8','Nombre' => 'HP Mini 110','Precio' => '399.89','Stock' => '400','Imagen' => 'https://image.ibb.co/hK2VTT/sin_foto.jpg')
	);

	$ultimos = array(
		array('idProducto' => '9','Nombre' => 'Motorola Moto G4 Plus','Precio' => '299.99','Stock' => '450','Imagen' => 'https://image.ibb.co/j8Xx8T/P001.jpg'),
		array('idProducto' => '10','Nombre' => 'Motorola Moto G4 Play','Precio' => '250','Stock' => '200','Imagen' => 'https://image.ibb.co/hMHm2o/P002.jpg'),
		array('idProducto' => '11','Nombre' => 'Motorola Moto C','Precio' => '199.99','Stock' => '375','Imagen' => 'https://image.ibb.co/jQVTF8/P003.jpg'),
		array('idProducto' => '12','Nombre' => 'Nintendo Switch','Precio' => '459.99','Stock' => '600','Imagen' => 'https://image.ibb.co/dOjoF8/P004.jpg'),
		array('idProducto' => '13','Nombre' => 'XboX One','Precio' => '500','Stock' => '900','Imagen' => 'https://image.ibb.co/jgkH8T/P005.jpg'),
		array('idProducto' => '14','Nombre' => 'Lenovo Thinkpad','Precio' => '450','Stock' => '400','Imagen' => 'https://image.ibb.co/kObPoT/P006.jpg'),
		array('idProducto' => '15','Nombre' => 'Samsung VR Headset','Precio' => '120.69','Stock' => '100','Imagen' => 'https://image.ibb.co/mHT4oT/P007.jpg'),
		array('idProducto' => '16','Nombre' => 'Samsung Galaxy S6','Precio' => '499.89','Stock' => '120','Imagen' => 'https://image.ibb.co/hK2VTT/sin_foto.jpg')
	);

	header ("Content-Type: application/json");

	if( isset($_GET["d"]) ){

		$data = $_GET["d"];
	
		switch($data){
		case 'productos':
		 	echo json_encode($productos);
		break;

		case 'ultimos':
			echo json_encode($ultimos);
		break;

		default:
			echo json_encode( ["error" => "Productos no encontrados"] );
		break;
		}
	}

	

?>