<?php $propiedades = getDestacados();

if (!empty($propiedades)) { ?>


<h4>Destacados</h4>

<div>
  <div class="swiper mySwiper1">
    <div class="swiper-wrapper">
      <?php foreach ($propiedades as $propiedad) {  ?>

      <div class="swiper-slide">
        <div class="ad-content-property card">
          <a class="img-sombra"
            href="<?= base_url() ?>/resultados-busqueda?listing_id=<?= $propiedad['idpropiedad'] ?>">
            <div class="overlay-imagen">
              <div
                class="position-absolute w-100 d-flex justify-content-between pt-3">
                <span class="badge badge-dark text-uppercase h-0"
                  style="line-height: 1.25; max-height: 20px">Destacado</span>
                <img width="45px" src="<?= media() ?>/images/award.svg"
                  alt="Award">
              </div>
              <div class="position-absolute h-100 d-flex align-items-end"
                style="left: -10px">
                <h5 class="mt-auto text-light p-4">
                  <?= $propiedad['titulo'] ?>
                  <br>
                  <?= SMONEY . formatMoney($propiedad['precio']) ?>

                </h5>
              </div>
            </div>
            <img
              src="<?= media() ?>/images/uploads/<?= $propiedad['imagenes'][0]['rutaimagen'] ?>"
              class="card-img-top" alt="Imagen propiedades">
          </a>
        </div>
      </div>

      <?php  }  ?>
    </div>
    <div class="swiper-button-next custom"></div>
    <div class="swiper-button-prev custom"></div>
  </div>

  <div class="swiper-pagination1 d-flex justify-content-center pb-5">
  </div>
</div>

<?php } ?>