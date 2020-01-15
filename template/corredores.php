<!doctype html>
<html lang="es">
<?php require_once("template/partials/navbar.php");?>
<!-- head de HTML -->
<?php require_once("template/partials/head.php"); ?>

<body>
    <!-- Cabecera de la página -->
    <?php require_once('template/partials/cabecera.php'); ?>
    <div class="container">
        <?php if (isset($mensaje)) require_once("template/partials/mensaje.php") ?>

        <!-- Menú de navegación -->
        <?php require_once('template/partials/menu.php'); ?>

        <section>
            <article>
                <br>
                <!-- Especificar Contenido -->
                <legend>Tabla Corredores</legend>
                <table class="table">
                    <thead class="">
                        <tr>
                            <?php foreach ($cabecera as $key => $valor): ?>
                            <th><?=$valor?></th>
                            <?php endforeach;?>
                            <th>
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Muestra contenido de la tabla -->
                        <?php while ($corredor = $corredores->fetch()):?>
                        <tr>
                            <td><?=$corredor->id;?></td>
                            <td><?=$corredor->nombre;?></td>
                            <td><?=$corredor->apellidos;?></td>
                            <td><?=$corredor->ciudad;?></td>
                            <td><?=$corredor->email;?></td>
                            <td><?=$corredor->edad;?></td>
                            <td><?=$corredor->categoria;?></td>
                            <td><?=$corredor->club;?></td>
                            <td>
                                <?php if(in_array($id_perfil, $editar)): ?>
                                <a href="form_edit.php?indice=<?=$corredor->id?>" title="Editar"> <i
                                        class="material-icons">edit</i> </a>
                                <?php endif;?>
                                <?php if(in_array($id_perfil, $eliminar)): ?>
                                <a href="eliminar.php?indice=<?=$corredor->id?>" title="Eliminar"> <i
                                        class="material-icons">delete</i> </a>
                                <?php endif;?>
                                <?php if(in_array($id_perfil, $consultar)): ?>
                                <a href="mostrar.php?indice=<?=$corredor->id?>" title="Mostrar"> <i
                                        class="material-icons">visibility</i> </a>
                                <?php endif;?>
                            </td>
                        </tr>
                        <?php endwhile;?>
                    </tbody>
                </table>
                <h4>El número de corredores es: <?=$corredores->rowCount()?></h4>
            </article>
        </section>
    </div>
    <!-- Pie de página -->
    <?php require_once('template/partials/footer.php'); ?>
    <!-- Enlaces javascript -->
    <?php require_once('template/partials/javascript.php'); ?>
</body>

</html>