<?php
    require_once("class/corredor.php");
    require_once("class/conexion.php");
    require_once("class/conexion_maratoon.php");

    $genero = Corredor::genero();

    $conexion = new Conexion_maratoon();

    $indice = $_GET["indice"];

    $corredor = $conexion->getCorredor($indice);

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
                <form method="POST" action="Editar.php?indice=<?=$corredor->getId();?>">
                    <legend>Formulario. Editar Corredor</legend>

                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" required="required" title="nombre" name="nombre" value="<?=$corredor->getNombre();?>">
                    </div>  

                    <div class="form-group">
                        <label for="">Apellidos</label>
                        <input type="text" class="form-control" required="required" title="apellidos" name="apellidos" value="<?=$corredor->getApellidos();?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Ciudad</label>
                        <input type="text" class="form-control" required="required" title="ciudad" name="ciudad" value="<?=$corredor->getCiudad();?>">
                    </div>

                    <div class="form-group">
                        <label for="">Fecha de Nacimiento</label>
                        <input type="text" class="form-control" required="required" title="fechaNac" name="fechaNac" value="<?=$corredor->getFechaNacimiento();?>">
                    </div>

                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Sexo:</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="Sexo" value="<?= $corredor->getSexo();?>">
                        <?php foreach($genero as $indice => $desplegable): ?>
                        <?php if ($desplegable == $corredor->getSexo()):?>
                            <option value="<?= $indice ?>" selected="selected">
                                <?= $desplegable ?>
                            </option>
                        <?php else:?>
                            <option value="<?= $indice ?>"><?= $desplegable ?></option>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" required="required" title="email" name="email" placeholder="ejemplo@gmail.com" value="<?=$corredor->getEmail();?>">
                    </div>

                    <div class="form-group">
                        <label for="">DNI</label>
                        <input type="text" class="form-control" required="required" title="dni" name="dni" value="<?=$corredor->getDni();?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Categoria:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="id_categoria">
                            <?php while ($categoria = $categorias->fetch()) :?>
                                    <option <?= ($categoria->id == $corredor->getId_categoria()) ? "selected='selected'":"" ?> value="<?=$categoria->id;?>">
                                    <?= $categoria->nombreCorto ?>
                                    </option>
                            <?php endwhile;?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Club:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="id_club">
                            <?php while ($club = $clubs->fetch()) :?>
                                    <option <?= ($club->id == $corredor->getId_club()) ? "selected='selected'":"" ?> value="<?=$club->id;?>" >
                                    <?= $club->nombre ?>
                                    </option>
                            <?php endwhile;?>
                        </select>
                    </div>

                    <a class="btn btn-danger" href="index.php" value="Cancelar">Cancelar</a>
                    <input type="submit" class="btn btn-primary" value="Añadir">
                </form>
            </article>
          </section>
      
    </div>
    <?php require_once("template/partials/footer.php"); ?>
    <?php require_once("template/partials/javascript.php"); ?>
  </body>
</html>