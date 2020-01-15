<?php 
	session_start();

	#Clases
	require_once("class/user.php");
	require_once("class/conexion.php");
	require_once("class/conexion_users_gestion.php");

	# Creo nueva conexión
	$conexion_users = new Conexion_users_gestion();

	#Recojo los valores del formulario
    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);

	#obtengo el usuario a partir del email
	$usuario = $conexion_users->getUsuario_email($email);

	$errores = array();

	if ($usuario === false) {

		$errores['email'] = "Usuario no registrado";
		
		$_SESSION['errores'] = $errores;
		
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;

		header("location:login.php");

	} else 

	if (!password_verify($password,$usuario->getPassword())) {

		$errores['password'] = "Password no es correcto";
		
		$_SESSION['errores'] = $errores;

		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;

		header("location:login.php");

	} else {

	
	    $_SESSION['id'] = $usuario->getId();

	    header("location: index.php");
	
	}
	
	
?>