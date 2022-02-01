<?php
headerAdmin($data);
getModal('modalCustomsForms', $data);

?>



<div class="app-content p-3">
  <div class="row">
    <div class="col-md-12">
      <div class="tile p-0 border-bottom-no-radius my-0 mb-5">
        <div class="tile-title px-3 py-3 mb-0 d-flex align-items-center">
          <i class='bx bxs-layout mr-2'></i>
          Custom Forms
          <button class="btn btn-primary sombra-light ml-2"
            onclick="openModal()">
            <i class='bx bxs-plus-circle'></i> Add new Custom Form
          </button>
        </div>
        <hr class="my-0">
        <div class="d-flex">
          <div class="accordion" style="width: 20%" id="accordion">
            <?php foreach ($data['customsforms'] as $ctmForm) { ?>

            <div class="card">
              <div class="tile-title mb-1 p-0"
                id="heading-<?= $ctmForm['idtipo'] ?>">
                <h5 class="mb-0">
                  <button
                    class="btn btn-link btn-block rounded-0 box-shadow-none text-left text-dark"
                    id="data-customform-<?= $ctmForm['idtipo'] ?>" type="button"
                    data-toggle="collapse"
                    data-target="#collapse-<?= $ctmForm['idtipo'] ?>"
                    aria-expanded="false"
                    onclick="editInfoTipo(event,<?= $ctmForm['idtipo'] ?>)"
                    aria-controls="collapse-<?= $ctmForm['idtipo'] ?>">
                    <?= $ctmForm['title'] ?>
                  </button>
                </h5>
              </div>

              <div id="collapse-<?= $ctmForm['idtipo'] ?>" class="collapse"
                aria-labelledby="heading-<?= $ctmForm['idtipo'] ?>"
                data-parent="#accordion">
                <div class="tile-body">
                  <?php if ($ctmForm['idtipo'] != 1) { ?>
                  <button class="btn btn-block mt-0 sombra-light border-top"
                    onclick="newSubType(<?= $ctmForm['idtipo'] ?>)">
                    <div class="text-left ml-2">
                      <i class='bx bxs-add-to-queue'></i>
                      Add subtype
                    </div>
                  </button>
                  <?php } ?>
                  <?php foreach ($ctmForm['subtipos'] as $subtipo) { ?>
                  <button
                    class="btn btn-block btn-danger mt-0 rounded-0 sombra-light border-top"
                    onclick="getSubType(<?= $subtipo['idsubtipo'] ?>)"
                    id="tipo-subtipo-<?= $subtipo['idsubtipo'] ?>">
                    <div class="text-left ml-4">
                      <?= $subtipo['titulo'] ?>
                    </div>
                  </button>
                  <?php } ?>
                </div>
              </div>
            </div>
            <?php } ?>

          </div>

          <div style="width: 80%;">
            <div class="divLoader">
              <i class='bx bx-loader bx-spin'></i>
            </div>
            <div>

              <div class="row justify-content-center mt-5 instrucciones"
                id="divTipos" style="display: none;">
                <div class="col-md-8">
                  <h4 class="text-center nombreTipo mb-5">Tipo</h4>
                  <div id="opcionesTipo" class="d-flex justify-content-between">
                    <div class="widget-small info coloured-icon">
                      <i class='icon bx bxs-edit'></i>
                      <div class="info">
                        <h4 class="font-weight-bold">Edit Type </h4>
                      </div>
                    </div>
                    <div class="widget-small danger coloured-icon">
                      <i class='icon bx bxs-trash'></i>
                      <div class="info">

                        <h4 class="font-weight-bold">Delete Type </h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="divSubtipos" style="display: none;">

              </div>
            </div>

          </div>
        </div>
      </div>


    </div>
  </div>
</div>

<?php footerAdmin($data); ?>