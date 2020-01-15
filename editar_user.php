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

    $nombre = $usuario->getName();
    $email = $usuario->getEmail();

    if (isset($_SESSION['errores'])) {

        $errores = $_SESSION['errores'];
        $nombre = $_SESSION['nombre'];
        $email = $_SESSION['email'];
        
        unset($_SESSION['errores']);
        unset($_SESSION['nombre']);
        unset($_SESSION['email']);
    }
?>
<!doctype html>
<html lang="es">

<?php require_once("template/partials/head.php") ?>

<body>
    <?php require_once("template/partials/navbar.php") ?>
    <?php require_once("template/partials/cabecera.php") ?>


    <!-- Page Content -->
    <div class="container">
        <?php require_once("template/Users/form_editar_user.php")?>
    </div>

    <!-- /.container -->

    <?php require_once("template/partials/footer.php") ?>
    <?php require_once("template/partials/javascript.php") ?>
</body>

</html>