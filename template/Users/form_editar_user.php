<form method="POST" action="validar_edit_user.php">
    <legend>Formulario. Registrar Usuario</legend>

    <div class="form-group">
        <label for="">Nombre:</label>
        <input type="text" class="form-control" required value="<?= $usuario->getName()?>" title="nombre" name="nombre">
        <small id="nameHelp" class="form-text text-muted">Introduzca el nuevo nombre de usuario entre 5 y 50
            caracteres</small>
        <small id="nameHelp"
            class="form-text text-danger"><?= (isset($errores['nombre'])) ? $errores['nombre']:null?></small>
    </div>

    <div class="form-group">
        <label for="">Correo electrónico:</label>
        <input type="email" class="form-control" required value="<?= $usuario->getEmail()?>" title="email" name="email"
            placeholder="example@hotmail.es">
        <small id="emailHelp" class="form-text text-muted">Introduzca el nuevo email</small>
        <small id="nameHelp"
            class="form-text text-danger"><?= (isset($errores['email'])) ? $errores['email']:null?></small>
    </div>

    <a class="btn btn-danger" href="index.php" value="Cancelar">Cancelar</a>
    <button type="submit" class="btn btn-primary">Modificar</button>
</form>