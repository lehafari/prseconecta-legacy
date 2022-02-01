<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?= media(); ?>/images/Logo.png">
  <link rel="stylesheet" href="<?= media() ?>/css/boxicons.css">
  <?php if (isset($data['datatable'])) { ?>
  <link rel="stylesheet" href="<?= media() ?>/css/datatables.css">
  <?php } ?>

  <?php if (isset($data['swal'])) { ?>
  <link rel="stylesheet" href="<?= media() ?>/css/swal2.css">
  <?php } ?>

  <link rel="stylesheet" href="<?= media() ?>/css/swal.css">

  <?php if (isset($data['selectpicker'])) { ?>
  <link rel="stylesheet" href="<?= media() ?>/css/bootstrap-select.min.css">
  <?php } ?>

  <?php if (isset($data['dropzone'])) { ?>
  <link rel="stylesheet" href="<?= media() ?>/css/dropzone.css">
  <?php } ?>

  <?php if (isset($data['fileinput'])) { ?>
  <link rel="stylesheet" href="<?= media() ?>/css/fileinput.min.css">
  <?php } ?>

  <?php if (isset($data['datepickerjquery'])) { ?>
  <link rel="stylesheet" type="text/css"
    href="<?= media(); ?>/js/datepicker/jquery-ui.min.css">
  <?php } ?>
  <link rel="stylesheet" href="<?= media() ?>/css/bootstrap.min.css">
  <link rel="stylesheet"
    href="<?= media() ?>/css/<?= isset($data['dashboard-dark']) ? 'styles-dark' : 'styles' ?>.css">
  <link rel="stylesheet" href="<?= media() ?>/css/utils.css">

  <link rel="stylesheet" href="<?= media() ?>/css/custom.css">
  <title><?= $data['page_tag'] ?></title>
</head>

<body id="body-pd">

  <div id="divLoading">
    <div class="text-center">
      <img src="<?= media(); ?>/images/loading.svg" alt="Loading"> <br>
      <span class="text-light h5">Cargando...</span>

    </div>
  </div>

  <div class="sidebar">
    <div class="logo-details">
      <a href="<?= base_url() ?>">
        <img src="<?= media() ?>/images/logo.png" alt="">
      </a>

    </div>
    <?php if (!isset($data['dashboard-dark'])) { ?>
    <span class="textovolteado">
      Panel de Control
    </span>
    <?php } ?>

    <?php
    if (isset($data['dashboard-dark'])) {
      include 'nav_admin.php';
    } else {
      include 'nav_cliente.php';
    }

    ?>

  </div>

  <?php if (isset($data['dashboard-dark'])) { ?>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>

      <div class="d-flex align-items-center justify-content-center">
        <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input"
            id="sidebarStorage">
          <label class="custom-control-label" for="sidebarStorage"></label>
        </div>
        <a href="<?= base_url() ?>/users/profile">
          <i
            class='bx bx<?= $data['page_name'] === 'profile' ? 's' : null ?>-user-circle'></i>
        </a>
        <a href="<?= base_url() ?>/settings">
          <i
            class='bx bx<?= $data['page_name'] === 'settings' ? 's' : null ?>-cog 
                    <?= $data['page_name']  === 'settings' ? 'text-primary' : null ?>'></i>
        </a>
      </div>
    </div>
    <?php } else { ?>
    <nav
      class="navbar navbar-light p-1 d-flex justify-content-end d-block d-md-none bg-info">
      <a class="navbar-brand" href="#">
        <div class="text-white d-block text-center" id="sidebarStorage">
          <i style="font-size: 30px;" class='bx bx-menu mt-2 ml-3'></i>
        </div>
      </a>
    </nav>
    <?php } ?>