<?php
    #Clases
    require_once("class/user.php");
    require_once("class/conexion.php");
    require_once("class/conexion_users_gestion.php");
    require_once("lib/gestion_perfiles.php");
    require_once("class/corredor.php");
    require_once("class/conexion_maratoon.php");

    session_start();

    if (!isset($_SESSION['id'])) {
        header("location:login.php");
        
    } else if (isset($_SESSION['mensaje'])) {

        $mensaje = $_SESSION['mensaje'];
        unset($_SESSION['mensaje']);

    }
    
    
    # Creo nueva conexión
    $conexion_users = new Conexion_users_gestion();
    
    # Obtengo el objeto del usuario que tiene la sesión
    $usuario = $conexion_users->getUserId($_SESSION['id']);
    
    $id_perfil = $conexion_users->getUserIdPerfil($_SESSION['id']);
    $perfil = $conexion_users->getUserPerfil($id_perfil);

    $conexion = new Conexion_maratoon();

    $corredores = $conexion->getCorredores();

    $cabecera = Corredor::cabeceraTabla();

    require_once("template/corredores.php");
?>