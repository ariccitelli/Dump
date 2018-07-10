<?php
	//Formas de "testear" lo que hay en una variable

		//print_r( $_POST ); //está pensando para decirle al sistema que imprima variables array(guarda muchos valores y les agrega posiciones numéricas) para mostrar la estructura de los datos. 

		//var_dump( $_POST ); me devuelve qué tipo de var es y cuántos caracteres tiene. Es más preciso, mostrando estructura, daots y tipos (string, int, float, bool)
	
		/*Validar si la petición http es GET o POST*/
		if ( $_SERVER["REQUEST_METHOD"] == "POST" ){ //Si la petición http es post
			//▼acá programo que hacer con los datos del formulario de contacto▼

			//1) Validación del nombre
			if (empty($_POST["nombre"]) || is_numeric( $_POST["nombre"])){ //<-- || agrega condiciones al if
				echo "Error, ingrese un nombre válido.";

			} elseif( empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ){ //<- validación del email, strpos busca el @, !adelante pregunta si es falso

				echo "Error, ingrese un email válido.";

			} elseif( empty($_POST["mensaje"]) || strlen($_POST["mensaje"]) < 10 || strlen($_POST["mensaje"]) > 280 ){ //<- validación del mensaje- stringlen(strlen) te devuelve la cantidad de caracteres del string (post, mensaje), y a partir de ahi se le asigna un límite
				
				echo "Error, ingrese un mensaje de entre 10 y 280 caracteres.";
			
			} else {
				//▼Acá programo enviar los datos vía email porque son válidos▼
				$nombre =  filter_var($_POST["nombre"],  FILTER_SANITIZE_SPECIAL_CHARS); //el filtro sirve para desactivar código html/java/etc ingreado potencialmente malicioso. en php.net hay miles
				$email =   filter_var($_POST ["email"],  FILTER_SANITIZE_EMAIL);
				$mensaje = filter_var($_POST["mensaje"], FILTER_SANITIZE_SPECIAL_CHARS);

				$destinatario = "mercado.tech38@gmail.com";

				$asunto = "Consulta desde MercadoTECH";

				$cuerpo = "<h1>Datos de la consulta:</h1>";
				$cuerpo .= "<p>Nombre: {$nombre}</p>";
				$cuerpo .= "<p>E-mail: {$email}</p>";
				$cuerpo .= "<p>Mensaje:</p>";
				$cuerpo .= "<blockquote>{$mensaje}</blockquote>"; 

				require 'mail.config.php';

				# Configuracion del envio
				$mail->setFrom($email, $nombre);			// ◄ Emisor
				$mail->addAddress($destinatario, 'Mercado TECH');		// ◄ Destinatario
				$mail->addReplyTo($email, $nombre);	// ◄ E-Mail de respuesta (opcional)
				
				# Configuracion del email
				$mail->isHTML(true);									// ◄ Soporte para HTML (true/false)
				$mail->Subject = $asunto;								// ◄ Asunto del E-Mail
				$mail->Body = $cuerpo;								// ◄ Cuerpo del E-Mail
				$mail->SMTPDebug = 0;									// ◄ Visualizador para testeo (0: apagado | 1: mensajes del cliente | 2: mensajes del cliente y servidor)

				if ($mail->send() ){
					echo "¡Gracias por su consulta!";
				} else {
					echo "Ocurrió un error, por favor intente de nuevo...";
				}
			}

		} else { //si es cualquier otro método (get, etc)
			//▼acá programo que el usuario sea redireccionado al formulario inicial▼
			header ("location: index.php?p=contacto");

		}







?>