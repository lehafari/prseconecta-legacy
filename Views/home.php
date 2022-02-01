<?php
$home = $data['home'];
$banner = $data['banner'];
headerTienda($data);

?>

<div id="main-wrapper">
  <div class="site-wrapper-reveal">
    <div class="hero-area-two-wrapper">
      <div class="hero-area-two hero-area-overly"
        <?php if (!empty($home['imagen'])) : ?>
        style="background-image: url(<?= media() ?>/images/uploads/<?= $home['imagen'] ?>);"
        <?php endif; ?> ?>>
        <div class="container">
          <div class="col-lg-12">
            <div class="hero-area--two-innter" data-aos="zoom-out-up">
              <div class="row justify-content-center">
                <div class="col-lg-7 mt-md-5">
                  <h1 class="hero-title-small"><?= $home['titulo'] ?></h1>
                  <h3 class="sub-title text-white mt-0 font-weight-normal">
                    Puerto Rico</h3>

                  <p class="sub-sub-title">
                    <i class='bx bxs-check-square'></i>
                    Una parte de los ingresos se destina al fondo de
                    PRSeConecta.
                  </p>

                  <p class="sub-sub-title mb-5">
                    <i class='bx bxs-check-square'></i>
                    Hazlo Súper DESTACADO! Aumenta aún más.
                  </p>
                </div>
                <div class="col-lg-4 my-5" >
                  <div class="card bg-transparent-prseconecta"  >
                    <div class="card-body ">
                      <form id="form-cotizacion" >
                        <div class="mb-3">
                          <label for="tipopropiedad">Tipo de propiedad</label>
                          <select title="Elegir" name="tipopropiedad"
                            data-dropup-auto="false" data-size="5"
                            id="tipopropiedad"
                            class="form-control selectpicker">
                            <?php $tipos = getTipos();
                            foreach ($tipos as $tipo) {
                              if ($tipo['idtipo'] != 1) { ?>
                            <option value="<?= $tipo['idtipo'] ?>">
                              <?= $tipo['title'] ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="tipoestado">Tipo de estado</label>
                          <select title="Elegir" name="tipoestado"
                            data-dropup-auto="false" data-size="5"
                            id="tipoestado" class="form-control selectpicker">
                          </select>
                        </div>

                        <div class="mb-3">
                          <label for="municipal">Municipal</label>
                          <select title="¿Dónde?" name="municipal"
                            data-dropup-auto="false" data-size="5"
                            id="municipal" class="form-control selectpicker">
                            <?php $municipales = getMunicipales();
                            foreach ($municipales as $municipal) { ?>
                            <option value="<?= $municipal['nombre'] ?>">
                              <?= $municipal['nombre'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="area">Área</label>
                          <select title="Ingrese el área" name="area"
                            data-dropup-auto="false" data-size="5" id="area"
                            class="form-control selectpicker">
                            <?php $areascapitales = getAreasCapitales();
                            foreach ($areascapitales as $areacapital) { ?>
                            <option value="<?= $areacapital['nombre'] ?>">
                              <?= $areacapital['nombre'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                    </div>

                    <div class="mb-3">
                      <div class="wrapper-slide">
                        <div class="values">
                          De
                          $<span id="range1">
                            0
                          </span>
                          <span> A </span>

                          $<span id="range2">
                            50.000.000
                          </span>
                        </div>
                        <div class="container-slide">
                          <div class="slider-track"></div>
                          <input type="range" min="0" max="50000000" value="0"
                            id="slider-1" oninput="slideOne()">
                          <input type="range" min="0" max="50000000"
                            value="50000000" id="slider-2" oninput="slideTwo()">
                        </div>
                      </div>

                    </div>

                    <div>
                      <button class="btn-enviar">
                        Buscar
                      </button>
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


  </div>
  <div class="bg-destacados">
    <?php if (!empty($data['listado-superDestacados'])) { ?>

    <div class="swiper swiperDestacados">
      <div class="swiper-wrapper">
        <?php foreach ($data['listado-superDestacados'] as $propiedad) {
            $rutaPropiedad = base_url() . '/resultados-busqueda?listing_id=' . $propiedad['idpropiedad'];
            $formbuilderjson = json_decode($propiedad['formbuilderjson'], true);
            $formbuilder = explode(',', $propiedad['subtipo']['top_overview_field']);
          ?>
        <div class="swiper-slide">
          <div class="ad-property card">
            <?php if (!empty($propiedad['imagenes'])) { ?>
            <a class="img-sombra" href="<?= $rutaPropiedad ?>">
              <div
                class="position-absolute w-100 d-flex justify-content-end pt-3">
                <img width="45px" src="<?= media() ?>/images/award.svg"
                  alt="Award">
              </div>
              <div class="overlay-imagen">
                <div class="position-absolute h-100 d-flex align-items-end">
                  <h5 class="mt-auto text-light p-4">
                    <?= SMONEY . formatMoney($propiedad['precio']) ?></h5>
                </div>
              </div>
              <img
                src="<?= media() ?>/images/uploads/<?= $propiedad['imagenes'][0]['rutaimagen'] ?>"
                class="card-img-top" alt="Listado propiedad">
            </a>
            <?php } ?>
            <div class="card-body p-2">

              <h5
                class="card-title font-weight-normal d-flex justify-content-between">
                <a href="<?= $rutaPropiedad ?>" class="font-weight-bold">

                  <?= $propiedad['titulo'] ?>
                </a>

                <span class="badge badge-info d-flex align-items-center ml-2">
                  <p style="font-size: 12.5px;"><?= $propiedad['tipo'] ?></p>
                </span>

              </h5>
              <h5 class="card-title d-flex align-items-center">
                <span
                  class="<?= empty($propiedad['subtipo']['titulo']) ? 'text-light' : 'text-danger' ?> mr-1">
                  <i style="font-size: 10px;" class='bx bxs-circle mb-2'></i>
                </span>
                <?= $propiedad['subtipo']['titulo'] ?>
              </h5>
              <p style="color: #7b7b7b; font-size: 12.5px">
                <?= empty($propiedad['direccion_localizacion']) ? '<br>' : $propiedad['direccion_localizacion']  ?>
              </p>
              
              <!-- primer SLIDE -->
              <div class="container py-4">
                <div class="row">
                  <?php
                      $i = 0;
                      foreach ($formbuilder as $value) {
                        if (!empty($formbuilderjson[$value])) {
                          $formbuilderActual = $formbuilderjson[$value];
                      ?>
                  <div class="w-33 text-center mx-auto"
                    style="border-right: 1px solid #cccc;">
                    <h5 style="font-size:12px">
                      
                      <?= $formbuilderActual[0] ?>
                    </h5>

                    <h5 class="font-weight-normal mt-1">
                      <?= !empty($formbuilderActual[1]) ? $formbuilderActual[1] : 'N/A' ?>
                    </h5>

                  </div>
                  <?php }
                      } ?>
                </div>
              </div>
            </div>
            <div class="card-footer p-2 d-flex justify-content-between">
              <a style="font-size: 13px;"
                href="<?= base_url() ?>/agentes/agente/<?= $propiedad['rutausuario'] ?>"
                class="text-info font-weight-normal">
                <i class='bx bx-user'></i>
                <?= $propiedad['email_user'] ?>
              </a>

              <span style="font-size: 13px;"
                class="font-weight-normal text-dark">
                <i class='bx bx-link'></i>
                <?= timeago($propiedad['fecha_carga']) ?>
              </span>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="swiper-button-next custom destacados"></div>
      <div class="swiper-button-prev custom destacados"></div>
      <div
        class="swiper-pagination-destacados d-flex justify-content-center mt-4">
      </div>

    </div>
    <?php } ?>


  </div>
</div>

<div class="recent-article-area section-space--pb_120">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title text-center section-border-bottom">
          <img width="50px" class="mt-5" src="<?= media() ?>/images/award.svg"
            alt="Award">
          <h2 class="mt-3 font-weight-bold">
            Super DESTACADO
          </h2>
          <p class="mt-3">
            Además de la visibilidad de un Listado Destacado, se coloca un
            Súper Destacado en este
            control deslizante entre todos los demás lugares premium.
          </p>

          <h3 class="my-5" style="letter-spacing: 10px;">
            PROPIEDADES COMERCIALES
          </h3>
          <ul class="icon-destacado">
            <?php $arrDestacadosPropiedadesComerciales = [
              'Almacenamiento',
              'Desarrollo de la Tierra', 'Oficina & Medico',
              'Garajes de Estacionamiento',
              'Instalaciones de Jubilado',
              'ECO',
              'Apartamentos',
              'Almacenes',
              'Hospitalidad',
              'Venta minorista',
              'Casas móviles',
              'Gasolineras'
            ];
            foreach ($arrDestacadosPropiedadesComerciales as $p) { ?>
            <li>
              <img src="<?= media() ?>/images/arrow-right.svg"
                alt="Arrow Right">
              <p>
                <?= $p ?>
              </p>
            </li>
            <?php } ?>

          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="banner" <?php if (!empty($banner['imagen'])) : ?>
  style="background-image: url(<?= media() ?>/images/uploads/<?= $banner['imagen'] ?>);"
  <?php endif; ?> class="recent-article-area section-space--pb_120 mb-5">
  <div class="overlay d-flex justify-content-center align-items-center">
    <div class="container">
      <div class="contenedor-banner" data-aos="fade-down">
        <div class="row justify-content-end">
          <div class="col-lg-7">
            <div class="section-title border-0 section-border-bottom">
              <h2 class="hero-title-small text-info font-weight--light pl-0">
                <?= $banner['titulo'] ?></h2>
              <h3 class="text-light mt-4 mb-5">Conectando a la gente de Puerto
                Rico</h3>
              <div class="text-light font-weight-normal">
                <?= $banner['contenido'] ?>
              </div>
            </div>
          </div>
          <div class="col-lg-4 text-center">
            <img width="300px" src="<?= media() ?>/images/companialocal.png"
              alt="">
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="recent-article-area p-5">
  <div class="container-md" data-aos="fade-down">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title text-center section-border-bottom">
          <h4 class="my-5" style="letter-spacing: 8px;">
            LISTADOS DESTACADOS
          </h4>

          <div class="swiper mySwiper1">
            <div class="swiper-wrapper">
              <?php foreach ($data['listado-destacados'][0] as $propiedad) {
                $rutaPropiedad = base_url() . '/resultados-busqueda?listing_id=' . $propiedad['idpropiedad'];
                $formbuilderjson = json_decode($propiedad['formbuilderjson'], true);
                $formbuilder = explode(',', $propiedad['subtipo']['top_overview_field']);
              ?>
              <div class="swiper-slide">
                <div class="ad-content-property card">
                  <?php if (!empty($propiedad['imagenes'])) { ?>
                  <a class="img-sombra" href="<?= $rutaPropiedad ?>">
                    <div class="overlay-imagen">
                      <div
                        class="position-absolute h-100 d-flex align-items-end">
                        <h5 class="mt-auto text-light p-4">
                          <?= SMONEY . formatMoney($propiedad['precio']) ?></h5>
                      </div>
                    </div>
                    <img
                      src="<?= media() ?>/images/uploads/<?= $propiedad['imagenes'][0]['rutaimagen'] ?>"
                      class="card-img-top"
                      alt="Imagen propiedad de: <?= $propiedad['titulo'] ?>">
                  </a>
                  <?php } ?>
                  <div class="card-body p-2">
                    <h5 class="card-title d-flex justify-content-between">
                      <?= $propiedad['titulo'] ?>
                      <a href="<?= $rutaPropiedad ?>">

                        <span
                          class="badge badge-info d-flex align-items-center">
                          <p style="font-size: 12.5px;">
                            <?= $propiedad['tipo'] ?></p>
                        </span>
                      </a>

                    </h5>
                    <h5 class="card-title d-flex align-items-center">
                      <span
                        class="<?= empty($propiedad['subtipo']['titulo']) ? 'text-light' : 'text-danger' ?> mr-1">
                        <i style="font-size: 10px;"
                          class='bx bxs-circle mb-2'></i>
                      </span>
                      <?= $propiedad['subtipo']['titulo'] ?>
                    </h5>
                    <p class="direccionCard">
                      <?= !empty($propiedad['direccion_localizacion']) ? $propiedad['direccion_localizacion'] : '<br>' ?>
                    </p>

                    <!--PENULTIMO SLIDER -->
                    <div class="py-4">
                      <div class="row">
                        <?php
                          $i = 0;
                          foreach ($formbuilder as $value) {
                            if (!empty($formbuilderjson[$value])) {
                              $formbuilderActual = $formbuilderjson[$value];
                          ?>
                        <div  class="w-33 text-center border-right mx-auto">
                          <h5  style="font-size:12px">
                            <!-- ICONOS DEL PENULTIMO SLIDER -->
                            <?= $formbuilderActual[0] ?>
                          </h5>
                            <!--en este h5 estaba la negrita DEL PENULTIMO SLIDER -->
                          <h5 class="font-weight-normal mt-1"> 
                            <?= empty($formbuilderActual[1]) ? 'N/A' : $formbuilderActual[1] ?>
                          </h5>

                        </div>

                        <?php $i++;
                            }
                          } ?>

                      </div>
                    </div>
                  </div>
                  <div class="card-footer p-2">
                    <a href="<?= base_url() ?>/agentes/agente/<?= $propiedad['rutausuario'] ?>"
                      class="text-info">
                      <i class='bx bx-user'></i>
                      <?= $propiedad['email_user'] ?>
                    </a>

                    <span class="text-dark">
                      <i class='bx bx-link'></i>
                      <?= timeago($propiedad['fecha_carga']) ?>
                    </span>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
          <div class="swiper-pagination1 pb-5"></div>


          <div class="swiper mySwiper2">
            <div class="swiper-wrapper">
              <?php foreach ($data['listado-destacados'][1] as $propiedad) {
                $rutaPropiedad = base_url() . '/resultados-busqueda?listing_id=' . $propiedad['idpropiedad'];
                $formbuilderjson = json_decode($propiedad['formbuilderjson'], true);
                $formbuilder = explode(',', $propiedad['subtipo']['top_overview_field']);
              ?>

              <div class="swiper-slide">
                <div class="ad-content-property card">
                  <?php if (!empty($propiedad['imagenes'])) { ?>
                  <a class="img-sombra" href="<?= $rutaPropiedad ?>">
                    <div class="overlay-imagen">
                      <div
                        class="position-absolute h-100 d-flex align-items-end">
                        <h5 class="mt-auto text-light p-4">
                          <?= SMONEY . formatMoney($propiedad['precio']) ?></h5>
                      </div>
                    </div>
                    <img
                      src="<?= media() ?>/images/uploads/<?= $propiedad['imagenes'][0]['rutaimagen'] ?>"
                      class="card-img-top"
                      alt="Imagen de: <?= $propiedad['titulo'] ?>">
                  </a>
                  <?php } ?>
                  <div class="card-body p-2">
                    <h5 class="card-title d-flex justify-content-between">
                      <span style="font-size: 14px;">
                        <?= $propiedad['titulo'] ?>
                      </span>
                      <a href="<?= $rutaPropiedad ?>">

                        <span
                          class="badge badge-info d-flex align-items-center">
                          <p style="font-size: 12.5px;">
                            <?= $propiedad['tipo'] ?></p>
                        </span>
                      </a>

                    </h5>
                    <h5 class="card-title d-flex align-items-center">
                      <span
                        class="<?= empty($propiedad['subtipo']['titulo']) ? 'text-light' : 'text-danger' ?> mr-1">
                        <i style="font-size: 10px;"
                          class='bx bxs-circle mb-2'></i>
                      </span>
                      <?= $propiedad['subtipo']['titulo'] ?>
                    </h5>
                    <p class="direccionCard">
                      <?= !empty($propiedad['direccion_localizacion']) ? $propiedad['direccion_localizacion'] : '<br>' ?>

                    </p>
                    <!--ULTIMO SLIDER -->
                    <div class="py-4">
                      <div class="row">
                        <?php
                          $i = 0;
                          foreach ($formbuilder as $value) {
                            if (!empty($formbuilderjson[$value])) {
                              $formbuilderActual = $formbuilderjson[$value];
                          ?>
                        <div class="w-33 text-center border-right mx-auto">
                          <h5 style="font-size:12px">
                            <!-- ICONOS DEL ULTIMO SLIDER -->
                            <?= $formbuilderActual[0] ?>
                          </h5>

                          <h5 class="font-weight-normal mt-1">
                            <?= empty($formbuilderActual[1]) ? 'N/A' : $formbuilderActual[1] ?>
                          </h5>
                        </div>
                        <?php }
                          } ?>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer p-2">
                    <a style="font-size: 12px;"
                      href="<?= base_url() ?>/agentes/agente/<?= $propiedad['rutausuario'] ?>"
                      class="text-info">
                      <div class="d-flex align-items-center">
                        <i class='bx bx-user mr-1'></i>
                        <?= $propiedad['email_user'] ?>
                      </div>

                    </a>

                    <span class="text-dark">
                      <i class='bx bx-link'></i>
                      <?= timeago($propiedad['fecha_carga']) ?>
                    </span>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>

          <div class="swiper-pagination2"></div>

        </div>
      </div>
    </div>
  </div>
</div>

<a class="btn btn-dark-home" href="<?= base_url() ?>/agentes">
  Buscar Agentes <i class='bx bx-star ml-1'></i>
</a>
</div>


<?php footerTienda($data) ?>

<script>
const configSwipers = {
  slidesPerView: 1,
  spaceBetween: 40,
  speed: 750,
  pagination: {
    clickable: true,
  },
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  breakpoints: {


    1000: {
      slidesPerView: 3
    },
    700: {
      slidesPerView: 2
    },
  }
}
configSwipers.pagination.el = ".swiper-pagination1"
const swiper1 = new Swiper(".mySwiper1", configSwipers);
configSwipers.pagination.el = ".swiper-pagination2"
const swiper2 = new Swiper(".mySwiper2", configSwipers);

const configSwiperDestacados = {
  slidesPerView: 1,
  spaceBetween: 40,
  speed: 750,
  pagination: {
    el: ".swiper-pagination-destacados",
    clickable: true,
  },
  loop: true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  breakpoints: {
    975: {
      slidesPerView: 2
    },
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
}

const swiperDestacados = new Swiper(".swiperDestacados",
  configSwiperDestacados);
</script>