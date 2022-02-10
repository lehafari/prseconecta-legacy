<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $data['page_tag'] ?></title>
  <meta name="description" content="Prseconecta">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="robots"
    content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
  <link rel="canonical" href="#" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="article" />
  <meta property="og:title" content="Prseconecta" />
  <meta property="og:url" content="" />
  <meta property="og:site_name" content="" />
  <meta property="og:image" content="" />
  <!-- Favicon -->
  <link rel="icon" href="<?= media() ?>/images/logo.png">


  <link rel="stylesheet"
    href="<?= media() ?>/bunzo/assets/css/vendor/bootstrap.min.css">

  <link rel="stylesheet"
    href="<?= media() ?>/bunzo/assets/fonts/gordita-fonts.css" />
  <link rel="stylesheet" href="<?= media() ?>/css/boxicons.css">
  <!-- AOS CSS -->

  <link rel="stylesheet" href="<?= media() ?>/bunzo/assets/css/plugins/aos.css">
  <link rel="stylesheet" href="<?= media() ?>/css/bootstrap-select.min.css">
  <!-- ARCHIVO HECHO POR MI PARA ARREGLAR DETALLES EN LA PAGINA -->
  <link rel="stylesheet" href="<?= media() ?>/css/Changes.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


  <!-- Light gallery CSS -->
  <link rel="stylesheet"
    href="<?= media() ?>/bunzo/assets/css/plugins/lightgallery.min.css">
  <link rel="stylesheet" href="<?= media() ?>/css/swal.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  <?php if (!empty($data['rating'])) { ?>
  <link rel="stylesheet" href="<?= media() ?>/css/star-rating.min.css">
  <?php } ?>
  <link rel="stylesheet" href="<?= media() ?>/bunzo/assets/css/style.css">

</head>




<body class="theme-color-two">


  <?php getModal('modalIniciarSesion', $data); ?>


  <?php if (!empty($data['agente']['custombg'])) { ?>
  <div class="custom-bg"
    style="background-image: url(<?= media() ?>/images/uploads/<?= $data['agente']['custombg'] ?>);">
  </div>
  <?php } ?>

  <div id="divLoading">
    <div>
      <img src="<?= media(); ?>/images/loading.svg" alt="Loading">
    </div>
  </div>

  <header
    class="header-two <?= $data['page_name'] === 'inicio' ? 'position--absolute' : ''  ?>">
    <!-- HEADER DE RESULTADOS DE BUSQUEDA -->
    <!-- EL DE ANTES: header-bottom-area -->
    <div class="header d-none d-lg-block">
      <div
        class="<?= $data['page_name'] !== 'resultados-busqueda' ? 'container' : '' ?>">
        <div class="row align-items-center ">
          <?php if ($data['page_name'] === 'inicio') { ?>

          <div class="col-lg-2 col-md-12">
            <div class="logo position-relative">
              <a href="<?= base_url() ?>">
                <img class="menu" src="<?= media() ?>/images/logo.png" alt="" />
              </a>
            </div>
          </div>
          <?php } ?>

          <div
            class="<?php if ($data['page_name'] === 'inicio') { ?> col-lg-9 mb-5 <?php } else { ?> col-md-12 <?php } ?> ">
            <div class="main-menu-area ">
              <nav
                class="navigation-menu navigation-menu-white d-flex justify-content-end ">
                <ul
                  class=" <?= !empty($data['agente']['custombg']) ? 'tile py-0 shadow mt-3' : '' ?>">
                  <li>
                    <a href="<?= base_url() ?>"
                      class="<?= $data['page_name'] === 'inicio' ? '' : 'text-dark' ?>"><span>Inicio</span></a>
                  </li>
                  <li>
                    <a href="<?= base_url() ?>"
                      class="<?= $data['page_name'] === 'inicio' ? '' : 'text-dark' ?>"><span>Comercial</span></a>
                  </li>
                  <li>
                    <a href="<?= base_url() ?>"
                      class="<?= $data['page_name'] === 'inicio' ? '' : 'text-dark' ?>"><span>Residencial</span></a>
                  </li>
                  <li>
                    <a href="<?= base_url() ?>"
                      class="<?= $data['page_name'] === 'inicio' ? '' : 'text-dark' ?>"><span>Empleo</span></a>
                  </li>
                  <li>
                    <a href="<?= base_url() ?>"
                      class="<?= $data['page_name'] === 'inicio' ? '' : 'text-dark' ?>"><span>Clasificado</span></a>
                  </li>
                  <li>
                    <?php if (!empty($_SESSION['cliente-login'])) { ?>
                    <a class="btn btn-<?= $data['page_name'] === 'inicio' ? 'dark' : 'danger' ?> px-3 py-2"
                      href="<?= base_url() ?>/perfil">PERFIL</a>
                    <?php } else { ?>
                    <a class="btn btn-<?= $data['page_name'] === 'inicio' ? 'dark' : 'danger' ?> px-3 py-2"
                      onclick="openModal('login-register-form')"
                      href="#!">INICIAR SESION</a>
                    <?php } ?>
                  </li>
                </ul>
              </nav>
            </div>

          </div>
          <div class="col-12 d-block d-lg-none d-flex justify-content-center">
          </div>
        </div>
      </div>
    </div>

    <nav class="navbar navbar-light p-1 d-block d-lg-none bg-info">
      <a class="navbar-brand" href="#">
        <div class="mobile-navigation-icon icon-white d-block text-center"
          id="mobile-menu-trigger">
          <i class='bx bx-menu'></i>
        </div>
      </a>
    </nav>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </header>