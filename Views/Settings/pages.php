<?php
headerAdmin($data);
?>



<div class="row">
  <div class="col-md-12">
    <div class="tile pb-1">
      <div class="tile-title d-flex align-items-center">
        <a class="mr-2 bx-fade-left-hover" href="<?= base_url() ?>/settings"
          title="Go to settings">
          <i class='bx bxs-left-arrow-circle text-dark'></i>
        </a>
        <i class='bx bxs-file mr-2'></i>
        <?= $data['page_title'] ?>
      </div>
    </div>
  </div>
</div>

<div class="app-content">
  <div class="row">
    <div class="col-md-12">
      <div class="tile sombra">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tablePages">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Photo</th>
                  <th>Title</th>
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