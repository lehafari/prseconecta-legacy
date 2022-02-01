<?php
headerTienda($data);
$agentes = $data['agentes'];
$pagina = $data['paginacion']['pagina'];
$total_paginas = $data['paginacion']['total_paginas'];

?>
<div class="mt-4 mt-lg-0" id="main-wrapper">
  <div class="recent-article-area pb-5 ">
    <div class="container-lg">
      <?php getFormPropertys() ?>
    </div>
  </div>

  <div class="recent-article-area">
    <div class="container-lg">
      <div class="row">
        <div class="col-md-8">
          <?php if (!empty($agentes)) {
            $i = 1; ?>



          <?php $count = count($agentes);
            for ($index = 0; $index < $count; $index++) {
              $agente = $agentes[$index];
              $fotoperfil = !empty($agente['imagen']) ? $agente['imagen'] : 'profile-agente.jpg';
              $fullname = strtok($agente['nombres'], ' ')  . ' ' . strtok($agente['apellidos'], ' ');
              $urlFoto = media() . '/images/uploads/' . $fotoperfil;
              $urlPerfil = base_url() . '/agentes/agente/' . $agente['rutausuario'];
              $usuario = $agente['usuario'];
              $extrajson = json_decode($agente['extrajson']);
              $socialmedia = json_decode($agente['socialmedia']);
            ?>

          <div class="card border-0 <?= $i !== 1 ? 'mt-5' : null ?>">
            <div class="card-body p-0">
              <div class="row">
                <div class="col-md-4">
                  <div class="sombra">
                    <a href="<?= $urlPerfil ?>">
                      <img src="<?= $urlFoto ?>"
                        alt="Foto de perfil de: <?= $fullname ?>">
                    </a>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="card-title">
                    <h4 class="container-agente-rating">
                      <a href="<?= $urlPerfil ?>">
                        <?= $agente['usuario'] ?>
                      </a>

                      <?php if (!empty($agente['promedio-rating'])) { ?>
                      <input id="rating-agente"
                        value="<?= $agente['promedio-rating'] ?>" data-size="sm"
                        class="rating rating-loading rating-input"
                        data-show-clear="false" data-show-caption="false">
                      <?php } ?>
                    </h4>

                    <?php if (!empty($extrajson->titulo_posicion) and !empty($extrajson->companyname)) { ?>

                    <p class="mt-1 mb-2">
                      <?= $extrajson->titulo_posicion ?>
                      en: <span
                        class="text-info"><?= $extrajson->companyname ?></span>
                      <br>
                    </p>
                    <?php } ?>
                    <div class="mt-2">
                      <?php if (!empty($agente['telefono'])) { ?>
                      <h5 class="font-weight-normal my-0"><span
                          class="font-weight-bold">Oficina:</span>
                        <?= $agente['telefono'] ?></h5>
                      <hr class="mt-0 mb-2">
                      <?php } ?>
                      <?php if (!empty($extrajson->mobile)) { ?>
                      <h5 class="font-weight-normal my-0"><span
                          class="font-weight-bold">Móvil:</span>
                        <?= $extrajson->mobile ?></h5>
                      <hr class="mt-0 mb-2">
                      <?php } ?>
                      <h5 class="font-weight-normal"><span
                          class="font-weight-bold">Correo:</span>
                        <?= $agente['email_user'] ?></h5>
                      <hr class="mt-0 mb-2">
                      <?php if (!empty($extrajson->faxnumber)) { ?>
                      <h5 class="font-weight-normal my-0"><span
                          class="font-weight-bold">Fax:</span>
                        <?= $extrajson->faxnumber ?></h5>
                      <hr class="mt-0 mb-2">
                      <?php } ?>


                    </div>

                    <div class="d-flex justify-content-between">
                      <div class="d-lfex justify-content-start flex-column">
                        <?php if (!empty($socialmedia->facebook)) { ?>
                        <a target="_blank" class="social facebook"
                          href="<?= $socialmedia->facebook ?>">
                          <i class='bx bxl-facebook-square'></i>
                        </a>
                        <?php } ?>
                        <?php if (!empty($socialmedia->instagram)) { ?>
                        <a target="_blank" class="social instagram"
                          href="<?= $socialmedia->instagram ?>">
                          <i class='bx bxl-instagram-alt'></i>
                        </a>
                        <?php } ?>

                        <?php if (!empty($socialmedia->vimeo)) { ?>
                        <a target="_blank" class="social vimeo"
                          href="<?= $socialmedia->vimeo ?>">
                          <i class='bx bxl-vimeo'></i>
                        </a>
                        <?php } ?>

                        <?php if (!empty($socialmedia->twitter)) { ?>
                        <a target="_blank" class="social twitter"
                          href="<?= $socialmedia->twitter ?>">
                          <i class='bx bxl-twitter'></i>
                        </a>
                        <?php } ?>

                        <?php if (!empty($socialmedia->linkedin)) { ?>
                        <a target="_blank" class="social linkedin"
                          href="<?= $socialmedia->linkedin ?>">
                          <i class='bx bxl-linkedin'></i>
                        </a>
                        <?php } ?>

                        <?php if (!empty($socialmedia->pinterest)) { ?>
                        <a target="_blank" class="social pinterest"
                          href="<?= $socialmedia->pinterest ?>">
                          <i class='bx bxl-pinterest'></i>
                        </a>
                        <?php } ?>

                        <?php if (!empty($socialmedia->sitioweb)) { ?>
                        <a target="_blank" class="social website"
                          href="<?= $socialmedia->sitioweb ?>">
                          <i class='bx bx-world'></i>
                        </a>
                        <?php } ?>
                        <?php if (!empty($socialmedia->googleplus)) { ?>
                        <a target="_blank" class="social googleplus"
                          href="<?= $socialmedia->googleplus ?>">
                          <i class='bx bxl-google-plus'></i>
                        </a>
                        <?php } ?>

                        <?php if (!empty($socialmedia->youtube)) { ?>
                        <a target="_blank" class="social youtube"
                          href="<?= $socialmedia->youtube ?>">
                          <i class='bx bxl-youtube'></i>
                        </a>
                        <?php } ?>

                        <?php if (!empty($socialmedia->skype)) { ?>
                        <a target="_blank" class="social skype"
                          href="<?= $socialmedia->skype ?>">
                          <i class='bx bxl-skype'></i>
                        </a>
                        <?php } ?>

                        <?php if (!empty($extrajson->whatsapp)) { ?>
                        <a target="_blank" class="social whatsapp"
                          href="<?= $extrajson->whatsapp ?>">
                          <i class='bx bxl-whatsapp-square'></i> </a>
                        <?php } ?>

                      </div>
                      <a style="font-size: 14px;"
                        href="<?= base_url() ?>/agentes/agente/<?= $usuario ?>"
                        class="text-info">Ver Propiedades</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php $i++;
            } ?>


          <?php } ?>

          <div class="blog-details-wrapper py-4">
            <div class="container-lg">
              <nav class="overflow-auto">
                <ul class="pagination">

                  <?php if ($pagina != 1) { ?>
                  <li class="page-item"><a
                      href="<?= base_url() ?>/agentes/page/<?= 1; ?>"
                      class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a
                      href="<?= base_url() ?>/agentes/page/<?= $pagina - 1; ?>"
                      class="page-link" href="#"><i
                        class='bx bx-chevron-left'></i></a>
                  </li>
                  <?php } ?>

                  <?php
                  $primera = ($pagina - 3) > 1 ? $pagina - 3 : 1;
                  $ultima = ($pagina + 4) < $total_paginas ? $pagina + 4 : $total_paginas;
                  ?>

                  <?php if ($primera != 1) { ?>
                  <li class="page-item"><a class="page-link"
                      href="<?= base_url() ?>/agentes/page/1">1</a></li>
                  <li class="page-item disabled"><a class="page-link">...</a>
                  </li>
                  <?php } ?>
                  <?php for ($i = $primera; $i <= $ultima; $i++) {
                    if ($i == $pagina) { ?>
                  <li class="page-item active"><a class="page-link"
                      onclick="event.preventDefault()" href=""><?= $i ?></a>
                  </li>
                  <?php } else { ?>
                  <li class="page-item"><a class="page-link"
                      href="<?= base_url() ?>/agentes/page/<?= $i ?>"><?= $i ?></a>
                  </li>
                  <?php }
                  }
                  if ($ultima != $total_paginas) { ?>

                  <li class="page-item disabled"><a class="page-link">...</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link"
                      href="<?= base_url() ?>/agentes/page/<?= $total_paginas ?>"><?= $total_paginas ?></a>
                  </li>
                  <?php }
                  if ($pagina != $total_paginas) { ?>
                  <li class="page-item">
                    <a class="page-link"
                      href="<?= base_url() ?>/agentes/page/<?= $pagina + 1; ?>">
                      <i class='bx bx-chevron-right'></i>
                    </a>
                  </li>

                  <li class="page-item">
                    <a class="page-link"
                      href="<?= base_url() ?>/agentes/page/<?= $total_paginas; ?>">
                      &raquo; </a>
                  </li>

                  <?php } ?>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class=" w-100" id="wrappermenu">
            <div class="menu">
              <?= getFile('Template/propiedadesDestacadasSwiper') ?>


              <div>
                <form>
                  <div class="form-group">
                    <div class="input-group flex-nowrap">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping"><i
                            class='bx bx-search'></i></span>
                      </div>
                      <input type="text" class="form-control"
                        placeholder="Buscar agente">
                    </div>
                  </div>

                  <div class="form-group">

                    <select name="categoriasseelect" id="categoriasseelect"
                      class="form-control selectpicker">
                      <option class="d-none" value="">Todas la categorías
                      </option>
                    </select>
                  </div>

                  <div class="form-group">

                    <select name="ciudadesselect" id="ciudadesselect"
                      class="form-control selectpicker">
                      <option class="d-none" value="">Todas las ciudades
                      </option>
                    </select>
                  </div>

                  <div class="form-group">
                    <button class="btn btn-info btn-block shadow">
                      Buscar</button>

                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<?php footerTienda($data); ?>


<script>
$(".rating-input").rating({
  hoverEnabled: false,
  size: 'sm',
  emptyStar: '<i class="bx bx-star"></i>',
  filledStar: "<i class='bx bxs-star' ></i>",
  disabled: true
});
const configSwipers = {
  slidesPerView: 1,
  spaceBetween: 40,
  speed: 750,
  loop: true,
  pagination: {
    clickable: true,
  },
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination1"
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
}
configSwipers.pagination.el = ".swiper-pagination1"
const swiper1 = new Swiper(".mySwiper1", configSwipers);
</script>