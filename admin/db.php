<?php
	//PDO: PHP Data Object
	//CRUD: Create, Read, Update, Delete | ABM: Alta, Baja y Modificacion
	
	function Conexion(){
		defined('SERVIDOR') or define('SERVIDOR', '127.0.0.1');
		defined('USUARIO') or define('USUARIO', 'root');
		defined('CLAVE') or define('CLAVE', null);
		defined('BASE_DE_DATOS') or define('BASE_DE_DATOS', 'mercado_tech');
		
		$conexion = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BASE_DE_DATOS . ";charset=utf8", USUARIO, CLAVE);
		
		return $conexion;
	}

	function Insertar($producto){
		$conexion = Conexion();

		$insertar = $conexion->prepare("INSERT INTO productos (Nombre, Precio, Marca, Categoria, Detalle, Imagen, Stock) VALUES	(:n, :p, :m, :c, :d, :i, :s)");

		$insertar->bindParam(":n", $producto["Nombre"],    PDO::PARAM_STR);
		$insertar->bindParam(":p", $producto["Precio"],    PDO::PARAM_STR);
		$insertar->bindParam(":m", $producto["Marca"],     PDO::PARAM_INT);
		$insertar->bindParam(":c", $producto["Categoria"], PDO::PARAM_INT);
		$insertar->bindParam(":d", $producto["Detalle"],   PDO::PARAM_STR);
		$insertar->bindParam(":i", $producto["Imagen"],    PDO::PARAM_STR);
		$insertar->bindParam(":s", $producto["Stock"],     PDO::PARAM_INT);

		if( $insertar->execute() ){
			//echo "Producto registrado correctamente";
			return(true);
		} else {
			//echo "Ocurrio un error :(";
			return(false);
		}
	}

	function Actualizar($id, $producto){
		$conexion = Conexion();

		$actualizar = $conexion->prepare("UPDATE productos SET Nombre = :n, Precio = :p, Marca = :m, Categoria = :c, Detalle = :d, Stock = :s, Imagen = :i WHERE idProducto = :id");
		
		$actualizar->bindParam(":n", $producto["Nombre"],    PDO::PARAM_STR);
		$actualizar->bindParam(":p", $producto["Precio"],    PDO::PARAM_STR);
		$actualizar->bindParam(":m", $producto["Marca"],     PDO::PARAM_INT);
		$actualizar->bindParam(":c", $producto["Categoria"], PDO::PARAM_INT);
		$actualizar->bindParam(":d", $producto["Detalle"],   PDO::PARAM_STR);
		$actualizar->bindParam(":i", $producto["Imagen"],    PDO::PARAM_STR);
		$actualizar->bindParam(":s", $producto["Stock"],     PDO::PARAM_INT);
		$actualizar->bindParam(":id", $id, PDO::PARAM_INT);

		if ( $actualizar->execute() ) {
			//echo "Producto actualizado correctamente!";
			return(true);
		} else {
			//echo "Ocurrio un error :(";
			return(false);
		}
	}

	function Borrar($id){
		$conexion = Conexion();

		$borrar = $conexion->prepare("DELETE FROM productos WHERE idProducto = :id");
		$borrar->bindParam(":id", $id, PDO::PARAM_INT);

		if ( $borrar->execute() ) {
			echo "Producto borrado correctamente!";
		} else {
			echo "Ocurrio un error :(";
		}
	}

	function Obtener($id = 0){
		$conexion = Conexion();

		if( !$id ){
			$obtener = $conexion->query("SELECT idProducto, Nombre, Precio, Detalle, Stock, Imagen FROM productos LIMIT 0,12");

			return $obtener->fetchAll(PDO::FETCH_ASSOC);
		} else {
			$obtener = $conexion->prepare("SELECT idProducto, Nombre, Precio, Detalle, Stock, Imagen FROM productos WHERE idProducto = :id");
			$obtener->bindParam(":id", $id, PDO::PARAM_INT);

			if( $obtener->execute() && $obtener->rowCount() > 0 ):
				return $obtener->fetch(PDO::FETCH_ASSOC);
			else:
				return "Producto no encontrado";
			endif;
		}

		
	}
/////////////////////////////
// TESTEOS DE LA LIBRERIA //
/////////////////////////////
	/*
	$datos = array(
		"Nombre"	=> "Samsung Gear",
		"Precio"	=> 699.99,
		"Marca"		=> 2,
		"Categoria"	=> 1,
		"Detalle"	=> "8GB Wi-Fi",
		"Imagen"	=> "sin-foto.jpg",
		"Stock"		=> 450
	);
	*/
	//Insertar($datos);
	//Actualizar(60, $datos);
	//Borrar(72);

	//print_r( Obtener() );
	//print_r( Obtener(55) );

?>