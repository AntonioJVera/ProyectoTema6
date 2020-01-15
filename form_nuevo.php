<?php
    require_once("class/corredor.php");
    require_once("class/conexion.php");
    require_once("class/conexion_maratoon.php");

    $genero = Corredor::genero();

    $conexion = new Conexion_maratoon();

    $categorias = $conexion->getCategorias();

    $clubs = $conexion->getClubs();

?>
<!doctype html>
<html lang="es">

  <?php require_once("template/partials/head.php"); ?>

  <body>
    <div class="container">

      <?php require_once("template/partials/cabecera.php"); ?>

          <section>
            <article>
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
                  <label for="">Ciudad</label>
                  <input type="text" class="form-control" required="required" title="ciudad" name="ciudad">
                </div>

                <div class="form-group">
                  <label for="">Fecha de Nacimiento</label>
                  <input type="date" class="form-control" required="required" title="fechaNacimiento" name="fechaNacimiento" step="any">
                </div>

                <div class="form-group">
                  <label for="exampleFormControlSelect1">Sexo:</label>
                  <select class="form-control" id="exampleFormControlSelect1" name = "sexo">
                      <?php foreach ($genero as $desplegable): ?>
                        <option><?=$desplegable?></option>
                      <?php endforeach;?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" class="form-control" required="required" title="email" name="email" placeholder="ejemplo@gmail.com">
                </div>

                <div class="form-group">
                  <label for="">DNI</label>
                  <input type="text" class="form-control" required="required" title="dni" name="dni" step="any" placeholder="Introduce los 8 dígitos más la letra">
                </div>

                <div class="form-group">
                  <label for="exampleFormControlSelect1">Categoria</label>
                  <select class="form-control" id="id_categoria" name="id_categoria">
                      <?php while ($categoria = $categorias->fetch()) :?>
                        <option value="<?= $categoria->id?>"><?=$categoria->nombreCorto?></option>
                      <?php endwhile;?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleFormControlSelect1">Club</label>
                  <select class="form-control" id="id_club" name="id_club">
                      <?php while ($club = $clubs->fetch()) :?>
                        <option value="<?= $club->id?>"><?=$club->nombre?></option>
                      <?php endwhile;?>
                  </select>
                </div>

                <a class="btn btn-danger" href="index.php" value="Cancelar">Cancelar</a>
                <a class="btn btn-danger" href="nuevo_form.php" value="Reset">Reset</a>
                <input type="submit" class="btn btn-primary" value="Añadir">
            </form>
            </article>
          </section>
      
      <?php require_once("template/partials/footer.php"); ?>
    </div>
  
    <?php require_once("template/partials/javascript.php"); ?>
  </body>
</html>