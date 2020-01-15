<form method="POST" action="nuevo_usuario.php">
    <legend>Formulario. Registrar Usuario</legend>

    <div class="form-group">
        <label for="">Nombre:</label>
        <input type="text" class="form-control" required value="<?= $usuario->getName()?>" title="nombre" name="nombre">
        <small id="nameHelp" class="form-text text-muted">Nombre de usuario entre 5-50 caracteres</small>
        <small id="nameHelp"
            class="form-text text-danger"><?= (isset($errores['nombre'])) ? $errores['nombre']:null?></small>
    </div>

    <div class="form-group">
        <label for="">Correo electrónico:</label>
        <input type="email" class="form-control" required value="<?= $usuario->getEmail()?>" title="email" name="email"
            placeholder="example@hotmail.es">
        <small id="emailHelp" class="form-text text-muted">Introduzca Email válido</small>
        <small id="nameHelp"
            class="form-text text-danger"><?= (isset($errores['email'])) ? $errores['email']:null?></small>
    </div>

    <div class="form-group">
        <label for="">Password:</label>
        <input type="password" class="form-control" required value="<?= $usuario->getPassword()?>" title="password"
            name="password">
        <small id="password1" class="form-text text-muted">Introduzca entre 5-50 caracteres</small>
        <small id="nameHelp"
            class="form-text text-danger"><?= (isset($errores['password'])) ? $errores['password']:null?></small>

    </div>

    <div class="form-group">
        <label for="">Repita password:</label>
        <input type="password" class="form-control" required title="passwordVer" name="passwordVer">
    </div>

    <a class="btn btn-danger" href="index.php" value="Cancelar">Cancelar</a>
    <a class="btn btn-danger" href="form_register.php" value="Reset">Reset</a>
    <button type="submit" class="btn btn-primary">Registrar</button>
</form>