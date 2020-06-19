<nav class="navbar navbar-expand-lg navbar-dark bg-header text-uppercase fixed-top">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger font-weight-bold" href="<?= URL_BASE . 'inicio/' ?>"> Cine+</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav">
        <li class="nav-item mx-0 mx-lg-1">
          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?= URL_BASE . 'inicio/peliculas' ?>">Peliculas</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION['usuario']['id'])) : ?>
          <li class="nav-item mx-0 mx-lg-1 dropdown">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?= $_SESSION['usuario']['nombre'] ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <?php if ($_SESSION['usuario']['rol'] == 1) : ?>
                <a class="dropdown-item" href="<?= URL_BASE ?>Movie/index">Crear pelicula</a>
                <a class="dropdown-item" href="<?= URL_BASE ?>user/lista">Ver usuarios</a>
              <?php else: ?>
                <!-- <a class="dropdown-item" href="#">Perfil</a> -->
                <a class="dropdown-item" href="#">Peliculas Compradas</a>
              <?php endif; ?>
              <hr>
              <a class="dropdown-item" href="<?= URL_BASE . 'user/cerrar_session' ?>">Salir</a>
            </div>
          </li>
        <?php else : ?>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?= URL_BASE . 'user/login' ?>">Login</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?= URL_BASE . 'user/register' ?>">Registro</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>