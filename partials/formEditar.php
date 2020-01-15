<form method="POST" action="Editar.php?indice=<?=$alumno->getId();?>">
    <legend>Formulario Editar Alumno</legend>

    <div class="form-group">
      <input type="number"  style="display:none" class="form-control" required="required" title="Id" name="Id" value = "<?= $alumno->getId(); ?>" >
    </div>

    <div class="form-group">
      <label for="">Nombre:</label>
      <input type="text" class="form-control" required="required" title="Nombre" name="Nombre" value = "<?= $alumno->getNombre(); ?>" >
    </div>  

    <div class="form-group">
      <label for="">Apellidos:</label>
      <input type="text" class="form-control" required="required" title="Apellidos" name="Apellidos" value = "<?= $alumno->getApellidos(); ?>" >
    </div>  

    <div class="form-group">
      <label for="">Poblacion</label>
      <input type="text" class="form-control" required="required" title="Poblacion" name="Poblacion" value = "<?= $alumno->getPoblacion(); ?>">
    </div>

    <div class="form-group">
      <label for="">Email:</label>
      <input type="email" class="form-control" required="required" title="Email" name="Email" value ="<?= $alumno->getEmail(); ?>">
    </div>
    
    <div class="form-group">
      <label for="">Teléfono:</label>
      <input type="number" class="form-control" required="required" title="Telefono" name="Telefono" value = "<?= $alumno->getTelefono(); ?>" >
    </div>

    <div class="form-group">
      <label for="">Fecha de Nacimiento</label>
      <input type="date" class="form-control" required="required" title="FechaNac" name="FechaNac" step="any" value = "<?= $alumno->getFechaNac(); ?>">
    </div>

    <div class="form-group">
      <label for="">DNI</label>
      <input type="text" class="form-control" required="required" title="DNI" name="DNI" step="any" value = "<?= $alumno->getDni(); ?>">
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Curso:</label>
      <select class="form-control" id="exampleFormControlSelect1" name="id_curso">
        <?php while ($curso = $cursos->fetch()) :?>
            <?php if ($curso == $alumno->getId_curso()):?>
                <option value="<?= $curso->id ?>" selected="selected">
                  <?= $curso->nombreCorto ?>
                </option>
            <?php else:?>
                <option value="<?= $curso->id?>"><?=$curso->nombreCorto?></option>
            <?php endif; ?>
        <?php endwhile;?>
      </select>
    </div>

    <div class="form-group">
      <label for="">Nacionalidad</label>
      <input type="text" class="form-control" required="required" title="Nacionalidad" name="Nacionalidad" step="any" value = "<?= $alumno->getNacionalidad(); ?>">
    </div>

    <a class="btn btn-danger" href="index.php" value="Cancelar">Cancelar</a>
    <input type="submit" class="btn btn-primary" value="Actualizar">
</form>