<?php headerAdmin($data); ?>

<style>
table.table tr td {
  vertical-align: middle;
}

.swal-button.swal-button--confirm {
  background-color: #dc3545;
}
</style>
<section class="home-section">
  <div style="margin: auto 20px;"
    class="home-content d-sm-flex d-block justify-content-between">
    <h3>
      <i class='bx bxs-star'></i>
      Destacar
    </h3>
  </div>

  <div class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <form id="formsChangeGratuito">
              <input type="hidden" name="idpropiedad"
                value="<?= $data['propiedad']['idpropiedad'] ?>">
              <div class="row justify-content-center">
                <div class="col-lg-12 d-flex justify-content-center">
                  <div class="row">
                    <?php foreach ($data['packages'] as $package) {
                      $packageInformation = json_decode($package['packageinformation']); ?>
                    <div class="col-lg-6 justify-content-center d-flex">
                      <label for="check-package-<?= $package['idpackage'] ?>"
                        class="cursor-pointer"
                        onclick="setPackageStep1(this, <?= $package['idpackage'] ?>)">

                        <div class="tile mx-2 card-package"
                          style="min-height: 60vh;">
                          <div class="tile-body">
                            <div class="tile-title mb-0">
                              <h4 class="text-center font-weight-bold">
                                <?= $package['title'] ?>
                                <span class="float-right checked">
                                </span>
                              </h4>



                              <p class="mt-0 text-center">
                                (<?= $package['packagepriceads'] . SMONEY
                                      . '/' .
                                      $package['billingfrequency'] . ' '
                                      . $package['billingperiod'] ?>)</p>
                            </div>

                            <hr class="mt-0 mb-4">
                            <div class="listadoPaquetes"
                              orden="<?= $package['orden'] ?>">
                              <?php foreach ($packageInformation as $key => $value) { ?>
                              <div class="d-flex mb-3" data-id="<?= $key ?>">
                                <div class="pr-1">
                                  <i
                                    class='bx bxs-badge-check text-success'></i>
                                </div>
                                <div class="font-weight-bold">
                                  <?= $value->item ?>
                                  <br>
                                  <small>
                                    <?= $value->item_value ?>
                                  </small>
                                </div>
                                <br>
                              </div>
                              <?php } ?>
                            </div>

                          </div>
                        </div>
                      </label>
                      <input type="radio" name="package" class="d-none"
                        value="<?= $package['idpackage'] ?>"
                        id="check-package-<?= $package['idpackage'] ?>">
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="app-footer">
    <a href="<?= base_url() ?>/mis-propiedades" type="button"
      class="btn btn-outline-info">
      <i class='bx bx-chevron-left'></i>
      Anterior
    </a>
    <button type="submit" form="formsChangeGratuito"
      class="btn btn-info disabled btnSubmit">
      Próximo
      <img class="text-white"
        src="<?= media() ?>/images/chevron-right-solid.svg"
        style="width: 7.5px;" alt="arrow-right">
    </button>
  </div>
</section>

<?php footerAdmin($data); ?>