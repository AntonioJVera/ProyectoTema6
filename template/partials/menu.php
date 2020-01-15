<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Corredores <span class="sr-only">(current)</span></a>
      </li>
      <?php if(in_array($id_perfil, $crear)): ?>
      <li class="nav-item">
        <a class="nav-link" href="form_nuevo.php">Añadir</a>
      </li>
      <?php endif;?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Ordenar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="ordenar.php?criterio=id">Id</a>
          <a class="dropdown-item" href="ordenar.php?criterio=nombre">Nombre</a>
          <a class="dropdown-item" href="ordenar.php?criterio=apellidos">Apellidos</a>
          <a class="dropdown-item" href="ordenar.php?criterio=ciudad">Ciudad</a>
          <a class="dropdown-item" href="ordenar.php?criterio=email">Email</a>
          <a class="dropdown-item" href="ordenar.php?criterio=edad">Edad</a>
          <a class="dropdown-item" href="ordenar.php?criterio=id_categoria">Categoria</a>
          <a class="dropdown-item" href="ordenar.php?criterio=id_club">Club</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input name="expresion" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search"
        name="buscador">
      <button class="btn btn-outline-success my-2 my-sm-0" formaction="buscar.php" type="submit">Buscar</button>
    </form>
  </div>
</nav