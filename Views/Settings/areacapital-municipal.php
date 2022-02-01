<?php
headerAdmin($data);
getModal('areacapitalmunicipal/areacapitalModal', $data);
getModal('areacapitalmunicipal/municipalModal', $data);
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
    <div class="col-lg-6">
      <div class="tile mb-0 bg-primary" style="
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
      ">
        <h4 class="text-light">Area
          capital</h4>
      </div>
      <div class="tile" style="
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      ">
        <div class="tile-body">
          <button onclick="openModalAreacapitual()"
            class="btn btn-primary box-shadow-none mb-4">
            <i class='bx bx-plus-medical'></i>
            Add Area
            capital
          </button>
          <div class="table-responsive">
            <table class="table table-hover table-bordered"
              id="tableAreaCapital">
              <thead>
                <tr>
                  <th>#</th>
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
    <div class="col-lg-6">
      <div class="tile mb-0 bg-danger" style="
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
      ">
        <h4 class="text-light">Municipal</h4>
      </div>
      <div class="tile" style="
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      ">
        <div class="tile-body">
          <div class="d-flex justify-content-end">
            <button onclick="openModalMunicipal()"
              class="btn btn-danger box-shadow-none mb-4">
              Add Municipal
              <i class='bx bx-plus-medical'></i>
            </button>
          </div>
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tableMunicipal">
              <thead>
                <tr>
                  <th>#</th>
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