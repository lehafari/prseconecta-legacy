<?php headerAdmin($data); ?>

<style>
table.table tr td {
  vertical-align: middle;
}
</style>

<div class="row">
  <div class="col-md-12">
    <div class="tile pb-1">
      <div class="tile-title d-flex align-items-center">
        <i class='bx bxs-buildings mr-2'></i>
        <?= $data['page_title'] ?>
      </div>
    </div>
  </div>
</div>

<div class="app-content">
  <div class="row">
    <div class="col-md-12">
      <div class="tile sombra-light">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tablePropertys">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Thumbnail</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Price</th>
                  <th class="text-center">Package</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<?php footerAdmin($data); ?>