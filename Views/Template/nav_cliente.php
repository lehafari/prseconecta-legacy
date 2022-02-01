<ul class="nav-links">
  <li
    class="link <?= $data['page_name'] === 'supervision' ? 'active' : null ?>">
    <a href="<?= base_url() ?>/supervision">
      <i class='bx bx-bar-chart-alt-2'></i>
      <span class="link_name">Supervisión</span>
    </a>
    <ul class="sub-menu blank">
      <li><a class="link_name"
          href="<?= base_url() ?>/supervision">Supervisión</a></li>
    </ul>
  </li>
  <li
    class="link <?= $data['page_name'] === 'propiedades' ? 'active' : null ?>">
    <a href="<?= base_url() ?>/mis-propiedades">
      <i class='bx bx-building-house'></i>
      <span class="link_name">Propiedades</span>
    </a>
    <ul class="sub-menu blank">
      <li><a class="link_name"
          href="<?= base_url() ?>/mis-propiedades">Propiedades</a></li>
    </ul>
  </li>
  <li
    class="link <?= $data['page_name'] === 'crear-listado' ? 'active' : null ?>">
    <a href="<?= base_url() ?>/crear-listado">
      <i class='bx bx-plus-circle'></i>
      <span class="link_name">Agregar</span>
    </a>
    <ul class="sub-menu blank">
      <li><a class="link_name"
          href="<?= base_url() ?>/crear-listado">Agregar</a></li>
    </ul>
  </li>
  <li class="link <?= $data['page_name'] === 'favoritos' ? 'active' : null ?>">
    <a href="<?= base_url() ?>/propiedades-favoritas">
      <i class='bx bx-heart'></i>
      <span class="link_name">Favoritos</span>
    </a>
    <ul class="sub-menu blank">
      <li><a class="link_name"
          href="<?= base_url() ?>/propiedades-favoritas">Favoritos</a></li>
    </ul>
  </li>
  <li
    class="link <?= $data['page_name'] === 'bqs_guardadas' ? 'active' : null ?>">
    <a href="<?= base_url() ?>/busquedas-guardadas">
      <i class='bx bx-search-alt'></i>
      <span class="link_name">Búsqs. Grds</span>
    </a>
    <ul class="sub-menu blank">
      <li><a class="link_name"
          href="<?= base_url() ?>/busquedas-guardadas">Búsquedas Guardadas</a>
      </li>
    </ul>
  </li>

  <li class="link <?= $data['page_name'] === 'profile' ? 'active' : null ?>">
    <a href="<?= base_url() ?>/perfil">
      <i class='bx bx-user-circle'></i>
      <span class="link_name">Mi Perfil</span>
    </a>
    <ul class="sub-menu blank">
      <li><a class="link_name" href="<?= base_url() ?>/perfil">Mi Perfil</a>
      </li>
    </ul>
  </li>

  <li class="link">
    <a href="#" onclick="logout(event,'spanish')">
      <i class='bx bx-lock'></i>
      <span class="link_name">Cerrar Sesión</span>
    </a>
    <ul class="sub-menu blank" onclick="logout(event,'spanish')">
      <li><a class="link_name" href="#">Cerrar Sesión</a></li>
    </ul>
  </li>
  <div class="profile-details">
    <div class="profile-content">
      <a href="<?= base_url() ?>/perfil">
        <?php if (empty($_SESSION['userData-cliente']['imagen'])) { ?>
        <img src="<?= media() ?>/images/profile-avatar.png" alt="profileImg">
        <?php } else { ?>
        <img
          src="<?= media() ?>/images/uploads/<?= $_SESSION['userData-cliente']['imagen'] ?>"
          alt="<?= strtok($_SESSION['userData-cliente']['nombres'], '') . ' ' . strtok($_SESSION['userData-cliente']['apellidos'], '') ?>">

        <?php } ?>
      </a>
    </div>
    <div class="name-job" style="overflow: hidden;">
      <div class="profile_name">
        <?= strtok($_SESSION['userData-cliente']['nombres'], ' ')  . ' ' . strtok($_SESSION['userData-cliente']['apellidos'], ' ')  ?>
      </div>
      <div class="job"><?= $_SESSION['userData-cliente']['nombrerol'] ?></div>
    </div>
    <div></div>
  </div>
  </li>
</ul>