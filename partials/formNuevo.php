
<form method="POST" action="nuevo.php">
    <legend>Formulario. Crear Usuario</legend>
    
    <div class="form-group">
      <label for="">Nombre</label>
      <input type="text" class="form-control" required="required" title="nombre" name="nombre">
    </div>  

    <div class="form-group">
      <label for="">Apellidos</label>
      <input type="text" class="form-control" required="required" title="apellidos" name="apellidos">
    </div>
    
    <div class="form-group">
      <label for="">Poblacion</label>
      <input type="text" class="form-control" required="required" title="poblacion" name="poblacion">
    </div>
    
    <div class="form-group">
      <label for="">Email</label>
      <input type="email" class="form-control" required="required" title="email" name="email" placeholder="ejemplo@gmail.com">
    </div>

    <div class="form-group">
      <label for="">Telefono</label>
      <input type="number" class="form-control" required="required" title="telefono" name="telefono" step="any">
    </div>

    <div class="form-group">
      <label for="">Fecha de Nacimiento</label>
      <input type="date" class="form-control" required="required" title="fechaNac" name="fechaNac" step="any">
    </div>

    <div class="form-group">
      <label for="">DNI</label>
      <input type="text" class="form-control" required="required" title="dni" name="dni" step="any" placeholder="123456789X">
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Curso</label>
      <select class="form-control" id="id_curso" name="id_curso">
          <?php while ($curso = $cursos->fetch()) :?>
            <option value="<?= $curso->id?>"><?=$curso->nombreCorto?></option>
          <?php endwhile;?>
      </select>
    </div>

    <a class="btn btn-danger" href="index.php" value="Cancelar">Cancelar</a>
    <a class="btn btn-danger" href="nuevo_form.php" value="Reset">Reset</a>
    <input type="submit" class="btn btn-primary" value="Añadir">
</form>
