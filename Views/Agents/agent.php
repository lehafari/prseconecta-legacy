<?php
$agente = $data['agente'];
$extrajson = json_decode($agente['extrajson']);
$socialmedia = json_decode($agente['socialmedia']);
headerAdmin($data);
?>

<style>
h5 {
  padding: 5px 0px;
}
</style>

<div class="row">
  <div class="col-md-12">
    <div class="tile pb-1">
      <div class="tile-title d-flex align-items-center">
        <a class="mr-2 bx-fade-left-hover" href="<?= base_url() ?>/agents"
          title="Go to agents">
          <i class='bx bxs-left-arrow-circle text-dark'></i>
        </a>
        <i class='bx bxs-user-voice mr-2'></i>
        <?= $data['page_title'] ?>

      </div>
    </div>
  </div>
</div>

<div class="app-content">
  <div class="row">
    <div class="col-xl-9 col-lg-6">
      <div class="tile">
        <div class="tile-body">
          <h2 class="pb-3 d-flex justify-content-between">
            <span>
              Personal Data <i class='bx bxs-user-circle'></i></i>
            </span>
            <span>
              <a href="<?= base_url() ?>/agentes/agente/<?= $agente['usuario'] ?>"
                target="_blank" class="btn btn-info font-weight-bold"><i
                  class='bx bxs-user'></i> View Public
                Profile</a>
            </span>
          </h2>
          <h5>
            <span class="font-weight-bold"><i class='bx bx-user'></i> Username:
            </span>
            <?= $agente['usuario'] ?>
          </h5>

          <h5>
            <span class="font-weight-bold"><i class='bx bx-user-plus'></i>
              Date created:
            </span>
            <?= $agente['datecreated'] ?>
          </h5>

          <h5>
            <span class="font-weight-bold"><i class='bx bxs-user-badge'></i>
              Name: </span>
            <?= $agente['nombres'] ?>
          </h5>
          <h5>
            <span class="font-weight-bold"><i class='bx bxs-user-badge'></i>
              Lastname: </span>
            <?= $agente['apellidos'] ?>
          </h5>
          <h5>
            <span class="font-weight-bold"><i class='bx bxs-phone'></i> Phone:
            </span>
            <?= !empty($agente['telefono']) ?  $agente['telefono'] : '' ?>
          </h5>

          <h5>
            <span class="font-weight-bold"><i class='bx bxs-mobile'></i> Mobile:
            </span>
            <?= !empty($extrajson->mobile) ? $extrajson->mobile : '' ?>
          </h5>

          <h5>
            <span class="font-weight-bold"><i class='bx bx-mail-send'></i> Email
              User: </span>
            <?= $agente['email_user'] ?>
          </h5>

          <h5>
            <span class="font-weight-bold"><i class='bx bxs-bookmark'></i>
              Status: </span>
            <?php if ($agente['status'] == 1) { ?>
            <span class="badge badge-dark">Active</span>
            <?php } else { ?>
            <span class="badge badge-danger">Inactive</span>
            <?php } ?>
          </h5>

          <h5>
            <span class="font-weight-bold"> <i class='bx bxs-bullseye'></i>
              Title / Position: </span>
            <?= !empty($extrajson->titulo_posicion) ? $extrajson->titulo_posicion : '' ?>
          </h5>

          <h5>
            <span class="font-weight-bold"><i class='bx bxs-city'></i> Company
              Name: </span>
            <?= !empty($extrajson->titulo_posicion) ? $extrajson->companyname : '' ?>
          </h5>

          <h5>
            <span class="font-weight-bold"> <i class='bx bxs-id-card'></i>
              License: </span>
            <?= !empty($extrajson->licencia) ? $extrajson->licencia : '' ?>
          </h5>

          <h5>
            <span class="font-weight-bold"> <i class='bx bxl-whatsapp'></i>
              WhatsApp: </span>
            <?= !empty($extrajson->whatsapp) ? $extrajson->whatsapp : '' ?>
          </h5>

          <h5>
            <span class="font-weight-bold"> <i class='bx bx-world'></i>
              Language: </span>
            <?= !empty($extrajson->lenguaje) ? $extrajson->lenguaje : '' ?>
          </h5>

          <h5>
            <span class="font-weight-bold"> <i class='bx bx-map'></i> Address:
            </span>
            <?= !empty($extrajson->address) ? $extrajson->address : '' ?>
          </h5>

          <h5>
            <span class="font-weight-bold"> <i class='bx bx-landscape'></i>
              Services Areas: </span>
            <?= !empty($extrajson->servicesareas) ? $extrajson->servicesareas : '' ?>
          </h5>

          <h5>
            <span class="font-weight-bold"><i class='bx bxs-user-detail'></i>
              About:</span>
            <?= !empty($extrajson->aboutme) ? '<br><br>' . $extrajson->aboutme : '' ?>
          </h5>
        </div>
      </div>

      <div class="tile">
        <div class="tile-body">
          <h2 class="pb-3">Social Networks <i
              class='bx bxs-network-chart'></i></i>
          </h2>

          <h5>
            <span class="font-weight-bold"><i
                class='bx bxl-facebook-square'></i> Facebook: <span
                class="font-weight-normal">
                <?= !empty($socialmedia->facebook) ? "<a target='_blank' href='$socialmedia->facebook'>$socialmedia->facebook</a>" : '' ?>
              </span>
            </span>

          </h5>

          <h5>
            <span class="font-weight-bold"><i
                class='bx bxl-twitter'></i>Twitter:
            </span>
            <?= !empty($socialmedia->twitter) ? "<a target='_blank' href='$socialmedia->twitter'>$socialmedia->twitter</a>" : '' ?>
          </h5>

          <h5>
            <span class="font-weight-bold"><i
                class='bx bxl-linkedin-square'></i> Linkedin:
            </span>
            <?= !empty($socialmedia->linkedin) ? "<a target='_blank' href='$socialmedia->linkedin'>$socialmedia->linkedin</a>" : '' ?>
          </h5>

          <h5>
            <span class="font-weight-bold"><i class='bx bxl-instagram-alt'></i>
              Instagram:
            </span>
            <?= !empty($socialmedia->instagram) ? "<a target='_blank' href='$socialmedia->instagram'>$socialmedia->instagram</a>" : '' ?>
          </h5>

          <h5>
            <span class="font-weight-bold"><i class='bx bxl-google-plus'></i>
              Google Plus:
            </span>
            <?= !empty($socialmedia->googleplus) ? "<a target='_blank' href='$socialmedia->googleplus'>$socialmedia->googleplus</a>" : '' ?>
          </h5>

          <h5>
            <span class="font-weight-bold"><i class='bx bxl-youtube'></i>
              Youtube:
            </span>
            <?= !empty($socialmedia->youtube) ? "<a target='_blank' href='$socialmedia->youtube'>$socialmedia->youtube</a>" : '' ?>
          </h5>

          <h5>
            <span class="font-weight-bold"><i class='bx bxl-pinterest'></i>
              Pinterest:
            </span>
            <?= !empty($socialmedia->pinterest) ? "<a target='_blank' href='$socialmedia->pinterest'>$socialmedia->pinterest</a>" : '' ?>
          </h5>

          <h5>
            <span class="font-weight-bold"><i class='bx bxl-vimeo'></i>
              Vimeo:
            </span>
            <?= !empty($socialmedia->vimeo) ? "<a target='_blank' href='$socialmedia->vimeo'>$socialmedia->vimeo</a>" : '' ?>
          </h5>

          <h5>
            <span class="font-weight-bold"><i class='bx bxl-skype'></i>
              Skype:
            </span>
            <?= !empty($socialmedia->skype) ? $socialmedia->skype : '' ?>
          </h5>

          <h5>
            <span class="font-weight-bold"><i class='bx bx-globe'></i>
              Website:
            </span>
            <?= !empty($socialmedia->sitioweb) ? "<a target='_blank' href='$socialmedia->sitioweb'>$socialmedia->sitioweb</a>" : '' ?>
          </h5>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-lg-6">
      <div class="tile">
        <div class="tile-body">
          <div class="photo">
            <div>
              <label for="foto">
                <?php if (empty($agente['imagen'])) { ?>
                <img src="<?= media() ?>/images/profile-avatar.png"
                  alt="Imagen">
                <?php } else { ?>
                <img
                  src="<?= media() ?>/images/uploads/<?= $agente['imagen'] ?>"
                  alt="Imágen de: <?= $agente['nombres'] . ' ' . $agente['apellidos'] ?>">
                <?php } ?>
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php footerAdmin($data); ?>