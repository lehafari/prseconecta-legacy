<div class="mobile-menu-overlay" id="mobile-menu-overlay">
  <div class="mobile-menu-overlay__inner">
    <div class="mobile-menu-overlay__header">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-md-6 col-8">
            <div class="logo">
              <a href="<?= base_url() ?>">
                <img src="<?= media() ?>/images/logo.png" class="img-fluid"
                  alt="Logo">
              </a>
            </div>
          </div>
          <div class="col-md-6 col-4">
            <div class="mobile-menu-content text-end">
              <span class="mobile-navigation-close-icon"
                id="mobile-menu-close-trigger"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mobile-menu-overlay__body">
      <nav class="offcanvas-navigation">
        <ul>
          <li>
            <a href="<?= base_url() ?>">Inicio</a>
          </li>
          <li>
            <a href="<?= base_url() ?>">Comercial</a>
          </li>
          <li>
            <a href="<?= base_url() ?>">Residencial</a>
          </li>
          <li>
            <a href="<?= base_url() ?>">Empleo</a>
          </li>
          <li>
            <a href="<?= base_url() ?>">Clasificado</a>
          </li>
          <?php if (empty($_SESSION['login'])) { ?>
          <li>
            <a href="#!" onclick="openModal('login-register-form')"><i
                class='bx bx-user'></i> Iniciar Sesión</a>
          </li>
          <?php } else { ?>
          <li>
            <a href="<?= base_url() ?>/perfil"><i class='bx bx-user'></i>
              Perfil</a>
          </li>
          <?php } ?>


        </ul>
      </nav>
    </div>
  </div>
</div>

<script>
const base_url = '<?= base_url() ?>'
</script>


<script src="<?= media() ?>/js/plugins/jquery.js"></script>
<script src="<?= media() ?>/js/plugins/bootstrap.bundle.js"></script>

<script src="<?= media() ?>/bunzo/assets/js/plugins/lightgallery.min.js">
</script>

<!-- Isotope JS -->
<script src="<?= media() ?>/bunzo/assets/js/plugins/isotope.min.js"></script>

<!-- Masonry JS -->
<script src="<?= media() ?>/bunzo/assets/js/plugins/masonry.min.js"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="<?= media() ?>/bunzo/assets/js/plugins/aos.js"></script>
<script src="<?= media() ?>/js/plugins/sweetalert.min.js"></script>
<script src="<?= media() ?>/js/plugins/bootstrap-select.min.js"></script>
<?php if (!empty($data['rating'])) { ?>
<script src="<?= media() ?>/js/plugins/star-rating.min.js"></script>
<?php } ?>
<?php if (!empty($data['axios'])) { ?>
<script src="<?= media() ?>/js/plugins/axios.js"></script>
<?php } ?>
<script src="<?= media() ?>/bunzo/assets/js/functions.js"></script>
<script src="<?= media() ?>/bunzo/assets/js/scripts.js"></script>
<script src="<?= media() ?>/bunzo/assets/js/main.js"></script>


</body>

</html>