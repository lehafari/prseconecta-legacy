<?php headerAdmin($data); ?>
<section class="home-section">
  <div style="margin: auto 20px;" class="home-content d-sm-flex d-block justify-content-between">
    <h3 class="text-primary font-weight-bold ml-4" style="user-select: none;">
      STRIPE PAGO
    </h3>
  </div>

  <div class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body text-center">
            <h1 class="text-primary font-weight-bold ml-4" style="user-select: none;">
              PAGO EXITOSO
            </h1>
            <?php if (!empty($data['error'])) {
              $e = $data['error'] ?>

              <h1>Ha ocurrido un error con su pago</h1>
              <h5>
                Tipo de error: <?= $e->getError()->type ?>
              </h5>
              <h5>
                Codigo de error: <?= $e->getError()->code ?>
              </h5>
              <h5>
                Mensaje de error: <?= $e->getError()->message ?>
              </h5>
              <a href="<?= base_url() ?>/mis-propiedades" class="btn btn-primary btn-block btn-lg mt-4">Volver a mis
                propiedades</a>
            <?php } else { ?>
              <h4>Su pago ha sido procesado con éxito y ahora su propiedad está al
                dia,
                La propiedad cambiará de estado dentro de 31 días a no pagado, por
                favor esté pendiente.
              </h4>

              <a href="<?= base_url() ?>/mis-propiedades" class="btn btn-primary btn-block btn-lg mt-4">Volver a mis
                propiedades</a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php footerAdmin($data); ?>