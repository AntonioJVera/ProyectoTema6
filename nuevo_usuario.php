<?php
    
    session_start();

	#Clases
    require_once("class/user.php");
    require_once("class/conexion.php");
    require_once("class/conexion_users_gestion.php");
      
    # Creo nueva conexión
	$conexion_users = new Conexion_users_gestion();
    
    $pass2 = filter_var($_POST['passwordVer'],FILTER_SANITIZE_STRING);

	#Creamos un objeto de la clase usuario con los valores del formularios saneados

	$usuario = new User(

		null,
		filter_var($_POST['nombre'],FILTER_SANITIZE_STRING),
		filter_var($_POST['email'],FILTER_SANITIZE_EMAIL),
		filter_var($_POST['password'],FILTER_SANITIZE_STRING)

    );

    $errores = array();
    if ((strlen($usuario->getPassword()) < 5) || (strlen($usuario->getPassword()) > 50)) {
        $errores['password'] = "La contraseña no entra dentro del rango de caracteres";;
    }

    if (strcmp($usuario->getPassword(), $pass2) !== 0) {
        $errores['password'] = "Contraseñas no coincidentes";
    }

    if ($conexion_users->validarEmail($usuario->getEmail()) == false) {
        $errores['email'] = "El email ya está registrado en la base de datos";
    }

    if (!empty($errores)) {
        $_SESSION['errores'] = serialize($errores);
        $_SESSION['usuario'] = serialize($usuario);

        header("location:register.php");
    } else {
        #Añade nuevo usuario
        $conexion_users->crear($usuario);

        $conexion_users->crear_usuario_perfil(3);

        $_SESSION['mensaje'] = "Usuario registrado correctamente";

        #Vuelve al index
        header("location:index.php");
    }

?>