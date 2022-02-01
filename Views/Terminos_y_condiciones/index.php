<?php
$page = $data['page'];
headerTienda($data);
?>
<div class="mt-4 mt-lg-0" id="main-wrapper">
  <div class="recent-article-area pb-5 ">
    <div class="container-lg">
      <?php getFormPropertys() ?>
    </div>
  </div>


  <div class="recent-article-area pb-5">
    <div class="container-lg">
      <div class="row">
        <div class="col-md-8">
          <?php if (!empty($page['imagen'])) { ?>
          <div id="banner"
            style="border-radius: 0;min-height: 300px;background-image: url(<?= media() ?>/images/uploads/<?= $page['imagen'] ?>);background-attachment: initial;position: initial;background-position: initial;background-size: 100%;"
            class=" recent-article-area section-space--pb_120 mb-5">
          </div>
          <?php } ?>

          <h2 class="text-center mb-4"><?= $page['titulo'] ?></h2>

          <div>
            <?= $page['contenido'] ?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="w-100" id="wrappermenu">
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

  <div class="recent-article-area py-4">
    <div class="container-lg text-center">
      <a class="btn btn-dark-home" href="<?= base_url() ?>/agentes">
        Buscar Agentes <i class='bx bx-star ml-1'></i>
      </a>
    </div>
  </div>
</div>
<?php footerTienda($data); ?>


<script>
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