<?php 
    require_once("class/corredor.php");
    require_once("class/conexion_maratoon.php");

    $genero = Corredor::genero();

    $conexion = new Conexion_maratoon();

    $indice = $_GET["indice"];

    $categorias = $conexion->getCategorias();

    $clubs = $conexion->getClubs();

    $corredores = $conexion->getCorredores();

    $corredor = $conexion->getCorredor($indice);

?>
<!doctype html>
<html lang="es">

  <?php require_once("template/partials/head.php"); ?>

  <body>
    <div class="container">

      <?php require_once("template/partials/cabecera.php"); ?>

          <section>
            <article>
                <form method="POST" action="mostrar.php">
                    <legend>Formulario Mostrar Corredor</legend>

                    <div class="form-group">
                    <input disabled type="number" style="display:none" class="form-control" required="required" title="Id" name="Id" value = "<?= $corredor->getId(); ?>" >
                    </div>

                    <div class="form-group">
                    <label for="">Nombre:</label>
                    <input disabled type="text" class="form-control" required="required" title="Nombre" name="Nombre" value = "<?= $corredor->getNombre(); ?>" >
                    </div>  

                    <div class="form-group">
                    <label for="">Apellidos:</label>
                    <input disabled type="text" class="form-control" required="required" title="Apellidos" name="Apellidos" value = "<?= $corredor->getApellidos(); ?>" >
                    </div>  

                    <div class="form-group">
                    <label for="">Ciudad</label>
                    <input disabled type="text" class="form-control" required="required" title="Poblacion" name="Poblacion" value = "<?= $corredor->getCiudad(); ?>">
                    </div>
                    <div class="form-group">
                    <label for="">Fecha Nacimiento:</label>
                    <input disabled type="date" class="form-control" required="required" title="fechaNacimiento" name="fechaNacimiento" value ="<?= $corredor->getFechaNacimiento(); ?>">
                    </div>

                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Género:</label>
                    <select disabled class="form-control" id="exampleFormControlSelect1" name="Sexo" value="<?= $corredor->getSexo();?>">
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
                    <label for="">Email:</label>
                    <input disabled type="email" class="form-control" required="required" title="email" name="email" value ="<?= $corredor->getEmail(); ?>">
                    </div>

                    <div class="form-group">
                    <label for="">DNI:</label>
                    <input disabled type="text" class="form-control" required="required" title="dni" name="dni" value ="<?= $corredor->getDni(); ?>">
                    </div>
                   
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Categoria:</label>
                    <select disabled class="form-control" id="exampleFormControlSelect1" name="id_curso">
                        <?php while ($categoria = $categorias->fetch()) :?>
                        <?php if ($categoria->id == $corredor->getId_categoria()):?>
                                <option value="<?= $categoria->id ?>" selected="selected">
                                <?= $categoria->nombreCorto ?>
                                </option>
                            <?php else:?>
                                <option value="<?= $categoria->id?>"><?=$categoria->nombreCorto?></option>
                            <?php endif; ?>
                        <?php endwhile;?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Club:</label>
                    <select disabled class="form-control" id="exampleFormControlSelect1" name="id_curso">
                        <?php while ($club = $clubs->fetch()) :?>
                        <?php if ($club->id == $corredor->getId_categoria()):?>
                                <option value="<?= $club->id ?>" selected="selected">
                                <?= $club->nombre ?>
                                </option>
                            <?php else:?>
                                <option value="<?= $club->id?>"><?=$club->nombre?></option>
                            <?php endif; ?>
                        <?php endwhile;?>
                    </select>
                    </div>

                    <a class="btn btn-danger" href="index.php" value="Volver">Volver</a>
                </form>
            </article>
          </section>
      
    </div>
    <?php require_once("template/partials/footer.php"); ?>
    <?php require_once("template/partials/javascript.php"); ?>
  </body>
</html>