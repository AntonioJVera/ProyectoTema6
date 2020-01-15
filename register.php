<?php
    session_start();

	#Clases
    require_once("class/user.php");
    require_once("class/conexion.php");
    require_once("class/conexion_users_gestion.php");

    $usuario = new User();

    if (isset($_SESSION['errores'])) {
        $errores = unserialize($_SESSION['errores']);
        $usuario = unserialize($_SESSION['usuario']);

        unset($_SESSION['errores']);
        unset($_SESSION['usuario']);
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
        <?php require_once("template/Users/form_register.php")?>
    </div>

    <!-- /.container -->

    <?php require_once("template/partials/footer.php") ?>
    <?php require_once("template/partials/javascript.php") ?>
</body>

</html>