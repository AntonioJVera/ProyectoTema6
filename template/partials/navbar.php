<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="index.php">Maratoon</a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
            &#9776;
        </button>
        <div class="collapse navbar-collapse" id="exCollapsingNavbar">
            <ul class="nav navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Corredores
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Clubs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Categorías</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Registro</a>
              </li>  
            </ul>
            <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?=$usuario->getName()?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="logout.php">Logout</a>
                <a class="dropdown-item" href="editar_user.php">Modificar Perfil</a>
                <a class="dropdown-item" href="editar_password.php">Cambiar Password</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><?=$perfil?></a>
              </div>
            </li>

            </ul>
        </div>
    </div>
</nav>
