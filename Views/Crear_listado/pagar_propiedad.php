<?php

headerAdmin($data);
$propiedad = $data['propiedad'];
$precio = $propiedad['listing_type'] === 'Listar' ? $propiedad['packagepricelisting'] : $propiedad['packagepriceads'];
$precio = intval($precio);
?>
<style>
.stripe-button-el {
  display: none;
}
</style>
<section class="home-section">
  <div class="home-content" style="margin: auto 20px;">
    <h3>
      <i class='bx bx-wallet'></i>
      Pagar Listado
    </h3>

  </div>

  <div class="app-content">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="tile pb-5 px-4">
          <div class="tile-body">
            <div class="tile-title font-weight-bold mb-0">
              Pagar Listado (<?= $propiedad['titulo'] ?>)
            </div>
            <hr>
            <div class="form-row my-4">
              <div class="col-6">
                <div class="d-flex align-items-center">
                  <i style="font-size: 20px;"
                    class='bx bxs-check-circle text-success mr-2'></i>
                  <?= $propiedad['nombrepaquete'] ?> Fee
                </div>
              </div>
              <div class="col-6">
                <p class="text-right ">
                  <b><?= SMONEY . $precio ?></b>
                  <br>
                  Precio total:
                  <b><?= SMONEY . $precio ?></b>
                </p>
              </div>
            </div>
            <div class="tile-title font-weight-bold">
              Método de pago
            </div>
            <div class="form-check">
              <input class="form-check-input" style="cursor: pointer;"
                type="radio" name="exampleRadios" id="exampleRadios1"
                value="option1" checked>
              <label class="form-check-label w-100" style="cursor: pointer;"
                for="exampleRadios1">
                <div class="form-row">
                  <div class="col-6">
                    <b>Stripe</b>
                  </div>
                  <div class="col-6 text-right">
                    <img src="<?= media() ?>/images/payment_cards.png"
                      style="width: 200px;" alt="cards payment">
                  </div>
                </div>
              </label>
            </div>
            <div class="tile-footer mt-4">
              <div class="form-row justify-content-center">
                <div class="col-md-8">
                  <button class="btn btn-info btn-block btn-lg"
                    id="btnCompletePayment">Completar
                    Pago</button>
                  <form action="<?= base_url() ?>/crear-listado/procesarpago"
                    method="POST">
                    <input type="hidden" name="propiedadID"
                      value="<?= $propiedad['idpropiedad'] ?>">
                    <input type="hidden" name="pay_ammount"
                      value="<?= $precio ?>">
                    <input type="hidden" name="idpackage"
                      value="<?= $propiedad['idpackage'] ?>">
                    <script src="https://checkout.stripe.com/checkout.js"
                      class="stripe-button"
                      data-key="<?= STRIPE_PUBLISHABLE_KEY; ?>"
                      data-image="<?= media() ?>/images/Stripe_logo.PRSECONECTA.png"
                      data-email="svea.rico@gmail.com" data-zip-code="true"
                      data-name="<?= $propiedad['nombrepaquete'] ?>"
                      data-label="Completar pago" data-billing-address="true"
                      data-amount="<?= $precio * 100 ?>" data-currency="USD"
                      data-locale="es_PR">
                    </script>
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
</section>

<?php footerAdmin($data); ?>

<script>
document.querySelector('#btnCompletePayment').addEventListener('click',
  () => document.querySelector('.stripe-button-el').click())
</script>