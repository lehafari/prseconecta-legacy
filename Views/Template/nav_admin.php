<?php
$permisos = $_SESSION['permisos'];
$page_name = $data['page_name'];
?>

<ul class="nav-links">
  <li class="link">
    <a href="<?= base_url() ?>" target="_blank">
      <i class='bx bx-globe'></i>
      <span class="link_name">Ver sitio web</span>
    </a>
    <ul class="sub-menu blank">
      <li><a class="link_name" href="<?= base_url() ?>/supervision">Ver sitio
          web</a></li>
    </ul>
  </li>
  <li class="link <?= $page_name === 'dashboard' ? 'active' : null ?>">
    <a href="<?= base_url() ?>/dashboard">
      <i
        class='bx bx<?= $page_name === 'dashboard' ? 's' : null ?>-tachometer'></i>
      <span class="link_name">Dashboard</span>
    </a>

    <ul class="sub-menu blank">
      <li><a class="link_name" href="<?= base_url() ?>/dashboard">Dashboard</a>
      </li>
    </ul>
  </li>
  <?php if (!empty($permisos[MUSUARIOS]['r'])) { ?>
  <li
    class="<?= ($page_name === 'users' or $page_name === 'roles') ? 'active showMenu' : null ?>">
    <div class="iocn-link">
      <a href="#">
        <i
          class='bx bx<?= ($page_name === 'users' or $page_name === 'roles') ? 's' : null ?>-user'></i>
        <span class="link_name">Users</span>
      </a>
      <i class='bx bxs-chevron-down arrow'></i>
    </div>
    <ul class="sub-menu">
      <li><a class="link_name" href="#"><i class='bx bx-log-in-circle'></i>
          Users</a></li>
      <li><a href="<?= base_url() ?>/users"><i
            class='bx bx-radio-circle<?= $page_name === 'users' ? '-marked' : null ?>'></i>
          Users</a></li>
      <li><a href="<?= base_url() ?>/roles"><i
            class='bx bx-radio-circle<?= $page_name === 'roles' ? '-marked' : null ?>'></i>
          Roles</a></li>
    </ul>
  </li>
  <?php } ?>
  <?php if (!empty($permisos[MAGENTS]['r'])) { ?>
  <li class="link <?= ($page_name === 'agents') ? 'active' : null ?>">
    <a href="<?= base_url() ?>/agents">
      <i
        class='bx bx<?= ($page_name === 'agents') ? 's' : null ?>-user-voice'></i>
      <span class="link_name">Agents</span>
    </a>

    <ul class="sub-menu blank">
      <li><a class="link_name" href="<?= base_url() ?>/agents">Agents</a></li>
    </ul>
  </li>
  <?php } ?>
  <?php if (!empty($permisos[MCLIENTS]['r'])) { ?>
  <li class="link <?= ($page_name === 'clients') ? 'active' : null ?>">
    <a href="<?= base_url() ?>/clients">
      <i
        class='bx bx<?= ($page_name === 'clients') ? 's' : null ?>-user-pin'></i>
      <span class="link_name">Clients</span>
    </a>

    <ul class="sub-menu blank">
      <li><a class="link_name" href="<?= base_url() ?>/clients">Clients</a></li>
    </ul>
  </li>
  <?php } ?>

  <?php if (!empty($permisos[MPROPERTYS]['r'])) { ?>
  <li
    class="<?= ($page_name === 'propertys' || $page_name === 'customsforms' || $page_name === 'characteristics') ? 'active showMenu' : null ?>">
    <div class="iocn-link">
      <a href="#">
        <i
          class='bx bx<?= ($page_name === 'propertys' || $page_name === 'customsforms' || $page_name === 'characteristics') ? 's' : null ?>-buildings'></i>
        <span class="link_name">Propertys</span>
      </a>
      <i class='bx bxs-chevron-down arrow'></i>
    </div>
    <ul class="sub-menu">
      <li><a class="link_name" href="#"><i class='bx bx-log-in-circle'></i>
          <?= $page_name ?></a></li>
      <li><a href="<?= base_url() ?>/propertys"><i
            class='bx bx-radio-circle<?= $page_name === 'propertys' ? '-marked' : null ?>'></i>
          Propertys</a>
      </li>
      <li><a href="<?= base_url() ?>/customs-forms"><i
            class='bx bx-radio-circle<?= $page_name === 'customsforms' ? '-marked' : null ?>'></i>
          Customs forms</a>
      </li>
      <li><a href="<?= base_url() ?>/characteristics"><i
            class='bx bx-radio-circle<?= $page_name === 'characteristics' ? '-marked' : null ?>'></i>
          Characteristics</a>
      </li>
    </ul>
  </li>
  <?php } ?>
  <li class="link">
    <a onclick="logout(event,'english')" href="#">
      <i class='bx bx-lock'></i>
      <span class="link_name">Log Out</span>
    </a>
    <ul class="sub-menu blank">
      <li><a class="link_name" onclick="logout(event,'english')" href="#">Log
          Out</a></li>
    </ul>
  </li>
  <div class="profile-details">
    <div class="profile-content">
      <a href="<?= base_url() ?>/users/profile">
        <?php if (empty($_SESSION['userData-admin']['imagen'])) { ?>
        <img src="<?= media() ?>/images/profile-avatar.png" alt="profileImg">
        <?php } else { ?>
        <img
          src="<?= media() ?>/images/uploads/<?= $_SESSION['userData-admin']['imagen'] ?>"
          alt="<?= strtok($_SESSION['userData-admin']['nombres'], '') . ' ' . strtok($_SESSION['userData-admin']['apellidos'], '') ?>">
        <?php } ?>
      </a>
    </div>
    <div class="name-job" style="overflow: hidden;">
      <div class="profile_name">
        <?= strtok($_SESSION['userData-admin']['nombres'], '') . ' ' . strtok($_SESSION['userData-admin']['apellidos'], '')  ?>
      </div>
      <div class="job"><?= $_SESSION['userData-admin']['nombrerol'] ?></div>
    </div>
    <div></div>
  </div>
  </li>
</ul>