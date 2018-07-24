<?php  
	//PDO: PHP Data Object

	$servidor = "127.0.0.1";
	$usuario = "root";
	$clave = "";
	$base_datos = "mercado_tech";

	$conexion = new PDO("mysql:host={$servidor};dbname={$base_datos};charset=utf8", $usuario, $clave);

	//CRUD: Create, Read, Uptade, Delete | ABM: Alta, Baja y Modificación
	#1 Crear datos 

	$producto = array(
		"Nombre" => "Cacao",
		"Precio" => 21.75,
		"Marca" => 4,
		"Categoria" => 10,
		"Descripcion" => "Entero 500gr",
		"Imagen" => "nesquik.jpg",
		"Stock" => 350
	);

	$insertar = $conexion->prepare("INSERT INTO productos (Nombre, Precio, Marca, Categoria, Descripcion, Imagen, Stock) VALUES (:n, :p, :m, :c, :d, :i, :s)");
	
	$insertar->bindParam(":n", $producto["Nombre"], 		PDO::PARAM_STR);
	$insertar->bindParam(":p", $producto["Precio"], 		PDO::PARAM_STR);
	$insertar->bindParam(":m", $producto["Marca"], 			PDO::PARAM_INT);
	$insertar->bindParam(":c", $producto["Categoria"], 		PDO::PARAM_INT);
	$insertar->bindParam(":d", $producto["Descripcion"], 	PDO::PARAM_STR);
	$insertar->bindParam(":i", $producto["Imagen"], 		PDO::PARAM_STR);
	$insertar->bindParam(":s", $producto["Stock"], 			PDO::PARAM_INT);
	/*
	if( $insertar->execute() == true ){
		echo "Producto registrado correctamente";
	} else {
		echo "No se pudo registrar el producto :c";
	}

	*/

	#2 Visualizar datos
	$obtener = $conexion->query("SELECT Nombre, Precio, Descripcion, Stock FROM productos ORDER BY Precio ASC");

	print_r( $obtener->fetchAll(PDO::FETCH_ASSOC) );


	#3 Actualizar datos
	$id = 2;
	$precioFinal = 95.2;
	$actualizar = $conexion->prepare("UPDATE productos SET Precio = :precio WHERE id_producto = :id");
	$actualizar->bindParam(":precio", $precioFinal, 		PDO::PARAM_STR);
	$actualizar->bindParam(":id", $id, 						PDO::PARAM_INT);

	if ( $actualizar->execute() ) {
		echo "Producto actualizado correctamente";
	} else {
		echo "El producto no ha sido actualizado";
	}


	#4 Eliminar datos



?>