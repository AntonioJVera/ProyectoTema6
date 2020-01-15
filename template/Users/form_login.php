<form method="POST" action="validar_acceso.php">
    <legend>Formulario. Login Usuario</legend>
    <small id="nameHelp" class="form-text text-danger"><?= (isset($_SESSION['mensaje'])) ? $_SESSION['mensaje']:null?></small>
    <div class="form-group">
        <label for="">Correo electrónico:</label>
        <input type="email" class="form-control" required="required" title="email" name="email" placeholder="example@hotmail.es">
        <small id="emailHelp" class="form-text text-danger"><?= (isset($errores['email'])? $errores['email']: null ) ?></small>
    </div>  

    <div class="form-group">
        <label for="">Password:</label>
        <input type="password" class="form-control" required="required" title="password" name="password">
        <small id="emailHelp" class="form-text text-danger"><?= (isset($errores['password'])? $errores['password']: null ) ?></small>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Remember me</label>
    </div>
    <a class="btn btn-danger" href="register.php">Register</a>
    <input type="submit" class="btn btn-primary" value="Sign in">
</form>