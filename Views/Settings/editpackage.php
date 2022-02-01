<?php
$package = $data['package'];
$packageInformation = $package['packageinformation'];
$packageInformation = json_decode($packageInformation);
if (!empty($packageInformation)) {
  sort($packageInformation);
}
headerAdmin($data);

?>


<style>
label {
  font-size: 14px !important;
}
</style>
<div class="row">
  <div class="col-md-12">
    <div class="tile pb-1">
      <div class="tile-title d-flex align-items-center">
        <a class="mr-2 bx-fade-left-hover"
          href="<?= base_url() ?>/settings/packages" title="Go to packages">
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
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <form id="formPackage">
            <input type="hidden" name="idpackage"
              value="<?= $package['idpackage'] ?>">
            <div class="row">

              <div class="form-group col-md-12">
                <label for="titulo">Title</label>
                <input type="text" id="titulo" name="titulo"
                  placeholder="Type title" value="<?= $package['title'] ?>"
                  class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-12">
                <label for="packagetype">Package Type</label>
                <select name="packagetype" id="packagetype"
                  class="form-control form-control-sm">
                  <option
                    <?= $package['packagetype'] === 'Free' ? 'selected' : '' ?>
                    value="Free">Free</option>
                  <option
                    <?= $package['packagetype'] === 'Featured' ? 'selected' : '' ?>
                    value="Featured">Featured</option>
                  <option
                    <?= $package['packagetype'] === 'Super Featured' ? 'selected' : '' ?>
                    value="Super Featured">Super Featured</option>
                </select>
              </div>

              <div class="col-md-6 form-group">
                <label for="billingperiod">Billing Period</label>
                <select name="billingperiod" id="billingperiod"
                  class="form-control form-control-sm">
                  <option
                    <?= $package['billingperiod'] === 'Días' ? 'selected' : '' ?>
                    value="Días">Day</option>
                  <option
                    <?= $package['billingperiod'] === 'Semanas' ? 'selected' : '' ?>
                    value="Semanas">Week</option>
                  <option
                    <?= $package['billingperiod'] === 'Meses' ? 'selected' : '' ?>
                    value="Meses">Month</option>
                  <option
                    <?= $package['billingperiod'] === 'Años' ? 'selected' : '' ?>
                    value="Años">Year</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label for="billingfrequency">Billing Frequency</label>
                <input type="number" id="billingfrequency"
                  name="billingfrequency"
                  value="<?= !empty($package['billingfrequency']) ? $package['billingfrequency'] : '' ?>"
                  placeholder="Enter Frequency number"
                  class="form-control form-control-sm">
              </div>
              <div class="col-md-6 form-group">
                <label for="listingsincluded">How many listings are
                  included?</label>
                <input type="text"
                  value="<?= !empty($package['listingsincluded']) ? $package['listingsincluded']  : '' ?>"
                  id="listingsincluded" name="listingsincluded"
                  placeholder="Enter number of listings"
                  class="form-control form-control-sm">
              </div>

              <div class="col-md-6 form-group">
                <label for="featuredlistingsincluded">How many Featured listings
                  are included?</label>
                <input type="text"
                  value="<?= !empty($package['featuredlistingsincluded']) ? $package['featuredlistingsincluded'] : '' ?>"
                  id="featuredlistingsincluded" name="featuredlistingsincluded"
                  placeholder="Enter number of listings"
                  class="form-control form-control-sm">
              </div>


              <div class="col-md-6 form-group">
                <label for="packagepricelistings">Package Price (For
                  Listing)</label>
                <input type="number"
                  value="<?= !empty($package['packagepricelisting']) ?  $package['packagepricelisting'] : ''  ?>"
                  id="packagepricelistings" name="packagepricelistings"
                  placeholder="Enter Price"
                  class="form-control form-control-sm">
              </div>

              <div class="col-md-6 form-group">
                <label for="packagepriceads">Package Price (For ADs)</label>
                <input
                  value="<?= !empty($package['packagepriceads']) ? $package['packagepriceads'] : '' ?>"
                  type="number" id="packagepriceads" name="packagepriceads"
                  placeholder="Enter Price"
                  class="form-control form-control-sm">
              </div>

              <div class="col-md-6 form-group">
                <label for="packagestripeid">Package Stripe id (Example:
                  gold_pack)</label>
                <input type="text" value="<?= $package['package_stripe_id'] ?>"
                  id="packagestripeid" name="packagestripeid"
                  class="form-control form-control-sm">
              </div>

              <div class="col-md-6 form-group">
                <label for="imagesperlisting">How many images are included per
                  listing?</label>
                <input type="number" id="imagesperlisting"
                  name="imagesperlisting"
                  value="<?= !empty($package['imagesperlisting']) ? $package['imagesperlisting'] : '' ?>"
                  class="form-control form-control-sm"
                  placeholder="Enter the number of images">
              </div>

              <div class="col-md-12 form-group">
                <label>Package Information <button id="btnaddpackageinformation"
                    type="button" class="btn btn-primary btn-sm"><i
                      class='bx bx-plus'></i>
                    Add</button></label>
                <div>

                  <div id="listPackageInfo">
                    <?php if (!empty($packageInformation)) {
                      $count = count($packageInformation);
                      for ($i = 0; $i < count($packageInformation); $i++) {
                    ?>
                    <div class="mt-3" data-id="<?= $i ?>">
                      <div class="d-flex">
                        <input type="text" placeholder="Enter Item"
                          class="form-control form-control-sm"
                          value="<?= $packageInformation[$i]->item ?>"
                          name="package-information[<?= $i ?>][item]">


                        <button class="btn-info btn-sm ml-2 handle mb-2"
                          title="Move Item" type="button">
                          <i class='bx bx-menu'></i>
                        </button>
                        <button class="btn-danger btn-sm ml-1 mb-2"
                          title="Delete Item" type="button"
                          onclick="delInfoPackage(this)">
                          <i class='bx bxs-trash'></i>
                        </button>
                      </div>
                      <input type="text" placeholder="Enter Item Value"
                        class="form-control form-control-sm"
                        value="<?= $packageInformation[$i]->item_value ?>"
                        name="package-information[<?= $i ?>][item_value]">
                    </div>
                    <?php }
                    } ?>
                  </div>
                </div>
              </div>
            </div>

            <button class="btn-block btn btn-primary">Update <i
                class='bx bxs-pencil'></i></button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
let indexPackage =
  <?= !empty($packageInformation) ? count($packageInformation) : 0 ?>;
const ordenPackage = "<?= $package['orden'] ?>"
</script>
<?php footerAdmin($data); ?>