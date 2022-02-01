<?php
headerAdmin($data);
getModal('modalTags', $data);
$tags = $data['tags'];

?>
<div class="row">
  <div class="col-lg-12">
    <div class="tile pb-1">
      <div class="tile-title d-flex align-items-center">
        <i class='bx bxs-cog mr-2'></i>
        <?= $data['page_title'] ?>
      </div>
    </div>
  </div>
</div>
<div class="app-content">
  <div class="row">
    <div class="col-xl-8">
      <div class="row">
        <div class="col-xl-6">
          <a style="font-size: 50px;" class="ahover"
            href="<?= base_url() ?>/settings/pages">
            <div class="tile">
              <div class="tile-body text-center">
                <span style="font-size: 30px;">
                  Go to pages <br>
                </span>
                <i class='bx bxs-file' style="font-size: 50px;"></i>
              </div>
            </div>
          </a>
        </div>

        <div class="col-xl-6">
          <a style="font-size: 50px;" class="ahover"
            href="<?= base_url() ?>/settings/packages">
            <div class="tile">
              <div class="tile-body text-center">


                <span style="font-size: 30px;">
                  Go to packages <br>
                </span>
                <i class='bx bxs-chalkboard' style="font-size: 50px;"></i>

              </div>
            </div>
          </a>
        </div>

        <div class="col-xl-6">
          <a style="font-size: 50px;" class="ahover"
            href="<?= base_url() ?>/settings/areacapital-municipal">
            <div class="tile">
              <div class="tile-body text-center">


                <span style="font-size: 30px;">
                  Área capital / Municipal
                  <br>
                </span>
                <i class='bx bx-map' style="font-size: 50px;"></i>

              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="col-xl-4">
      <div class="tile">
        <div class="tile-body">
          <h4 class="text-center"><i class='bx bxs-purchase-tag-alt'></i> Tags
            <br>
            <button class="btn btn-primary mt-3 btn-block"
              onclick="openModal()">
              Add <i class='bx bxs-plus-circle'></i>
            </button>
          </h4>
        </div>
      </div>

      <div id="divTags" orden="<?= $data['orden']['listgroup1'] ?>">
        <?php foreach ($tags as $tag) { ?>
        <div class="card my-4 sombra-light" data-id="<?= $tag['idtag'] ?>">
          <div class="card-body">
            <span class="handle">
              <i class='bx bx-menu'></i>
            </span>
            <span class="contenido ">
              <?= $tag['titulotag'] ?>
            </span>
            <div class="float-right">
              <span class="cursor-pointer"
                onclick="delInfo(this,<?= $tag['idtag'] ?>)">
                <i class='bx bxs-trash-alt'></i>
              </span>
            </div>
            <div class="float-right">
              <span class="cursor-pointer"
                onclick="editInfo(this,<?= $tag['idtag'] ?>)">
                <i class='bx bxs-edit-alt'></i>
              </span>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<?php footerAdmin($data); ?>