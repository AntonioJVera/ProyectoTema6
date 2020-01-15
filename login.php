<?php
    session_start();

    $email = null;
    $password = null;

    if (isset($_SESSION['mensaje'])) {

        $mensaje = $_SESSION['mensaje'];
        unset($_SESSION['mensaje']);

    }

    if (isset($_SESSION['errores'])) {

        $errores = $_SESSION['errores'];
        
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
        
        unset($_SESSION['errores']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
    }
?>
<!doctype html>
<html lang="es"> 

<?php require_once("template/partials/head.php") ?>

<body>
    <?php require_once("template/partials/cabecera.php") ?>
    <?php if (isset($mensaje)) require_once("template/partials/mensaje.php") ?>

    <!-- Page Content -->
    <div class="container">
        <?php require_once("template/Users/form_login.php")?>
    </div>

    <!-- /.container -->

    <?php require_once("template/partials/footer.php") ?>
    <?php require_once("template/partials/javascript.php") ?>
</body>

</html>