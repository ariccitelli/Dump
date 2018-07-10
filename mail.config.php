<?php
	require 'library/PHPMailer/PHPMailer.php';
	require 'library/PHPMailer/SMTP.php';
	require 'library/PHPMailer/Exception.php';
	require 'library/PHPMailer/OAuth.php';
	
	use PHPMailer\PHPMailer\PHPMailer;
	
	# Datos del Servidor SMTP
	define("SERVIDOR", 'smtp.gmail.com'); 
	#define, son constantes que se escriben siempre en mayus para distinguir de las variables, nunca van a cambiar a menos que las cambies en el código.
	define("ENCRIPTACION", 'ssl');
	define("PUERTO", 465);
	
	# Datos de la cuenta de envio
	define("USUARIO", 'mercado.tech38@gmail.com');
	define("CLAVE", 'mercadotech22');

	$mail = new PHPMailer();

	# Configuracion del sistema de envio
	$mail->isSMTP();
	$mail->Host = SERVIDOR;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = ENCRIPTACION;
	$mail->Port = PUERTO;
	$mail->Username = USUARIO;
	$mail->Password = CLAVE;
?>