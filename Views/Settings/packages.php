<?php headerAdmin($data); ?>

<style>
p {
  font-size: 14px;
  text-align: center;
}
</style>
<div class="row">
  <div class="col-md-12">
    <div class="tile pb-1">
      <div class="tile-title d-flex align-items-center">
        <a class="mr-2 bx-fade-left-hover" href="<?= base_url() ?>/settings"
          title="Go to settings">
          <i class='bx bxs-left-arrow-circle text-dark'></i>
        </a>
        <i class='bx bxs-chalkboard mr-2'></i>
        <?= $data['page_title'] ?>
      </div>
    </div>
  </div>
</div>
<div class="app-content">
  <div class="row">
    <?php foreach ($data['packages'] as $package) {
      $packageInformation = json_decode($package['packageinformation']); ?>
    <div class="col-lg-4">
      <a href="<?= base_url() ?>/settings/editpackage/<?= $package['idpackage'] ?>"
        class="text-dark">
        <div class="tile" style="min-height: 60vh;">
          <div class="tile-body">
            <div class="tile-title">
              <h4 class="text-center font-weight-bold"><?= $package['title'] ?>
              </h4>
              <p class="mb-0">Listing:
                (<?= $package['packagepricelisting'] . SMONEY
                      . '/' . $package['billingfrequency'] . ' '
                      . $package['billingperiod'] ?>)</p>
              <p class="mt-0">Ads:
                (<?= $package['packagepriceads'] . SMONEY
                      . '/' .
                      $package['billingfrequency'] . ' '
                      . $package['billingperiod'] ?>)</p>
            </div>
            <div class="listadoPaquetes" orden="<?= $package['orden'] ?>">
              <?php foreach ($packageInformation as $key => $value) { ?>
              <div class="d-flex mb-3" data-id="<?= $key ?>">
                <div class="pr-1">
                  <i class='bx bxs-badge-check text-success'></i>
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
      </a>
    </div>
    <?php } ?>
  </div>
</div>
<?php footerAdmin($data); ?>

<script>
const listadoPaquetes = document.querySelectorAll('.listadoPaquetes');
listadoPaquetes.forEach(paquete => {
  new Sortable(paquete, {
    disabled: true,
    store: {
      get: (sortable) => {
        const orden = paquete.getAttribute('orden')
        return orden ? orden.split(",") : [];
      },
    },
  });
})
</script>