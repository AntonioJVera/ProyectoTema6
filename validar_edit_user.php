<?php
    session_start();

    if (!isset($_SESSION['id'])) {
        header("location:login.php");
    }

    #Clases
	require_once("class/user.php");
	require_once("class/conexion.php");
    require_once("class/conexion_users_gestion.php");
    
    # Creo nueva conexión
    $conexion_users = new Conexion_users_gestion();

    # Obtengo el objeto del usuario que tiene la sesión
    $usuario = $conexion_users->getUserId($_SESSION['id']);

    #Saneamiento
    $nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

    #Validamos el cambio de valor
    if (strcmp($nombre, $usuario->getName()) !== 0) {
        if (!$conexion_users->validarName($nombre)) {
            $errores['nombre'] = "Nombre usuario no permitido";
        }
    }

    if (strcmp($email, $usuario->getEmail()) !== 0) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = "Email no válido";
        } else if (!$conexion_users->validarEmail($email)) {
            $errores['email'] = 'Email especificado ya registrado';
        }
    }

    if (!empty($errores)) {
        $_SESSION['errores'] = $errores;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['email'] = $email;

        header('location:editar_user.php');
    } else {
        $id = $usuario->getId();
        $conexion_users->actualizar_columnas($id, $nombre, $email);

        $_SESSION['mensaje'] = "Usuario actualizado correctamente";

        header('location:index.php');
    }
?>
