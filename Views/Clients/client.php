<?php
$cliente = $data['cliente'];
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
        <a class="mr-2 bx-fade-left-hover" href="<?= base_url() ?>/clients"
          title="Go to clients">
          <i class='bx bxs-left-arrow-circle text-dark'></i>
        </a>
        <i class='bx bxs-user-pin mr-2'></i>
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

          <h5>
            <span class="font-weight-bold"><i class='bx bx-user'></i> Username:
            </span>
            <?= $cliente['usuario'] ?>
          </h5>


          <h5>
            <span class="font-weight-bold"><i class='bx bx-user-plus'></i> Date
              created:
            </span>
            <?= $cliente['datecreated'] ?>
          </h5>

          <h5>
            <span class="font-weight-bold"><i class='bx bxs-user-badge'></i>
              Name: </span>
            <?= $cliente['nombres'] ?>
          </h5>
          <h5>
            <span class="font-weight-bold"><i class='bx bxs-user-badge'></i>
              Lastname: </span>
            <?= $cliente['apellidos'] ?>
          </h5>
          <h5>
            <span class="font-weight-bold"><i class='bx bxs-phone'></i> Phone:
            </span>
            <?= !empty($cliente['telefono']) ?  $cliente['telefono'] : "Didn't put a phone number" ?>
          </h5>

          <h5>
            <span class="font-weight-bold"><i class='bx bx-mail-send'></i> Email
              User: </span>
            <?= $cliente['email_user'] ?>
          </h5>

          <h5>
            <span class="font-weight-bold"><i class='bx bxs-bookmark'></i>
              Status: </span>
            <?php if ($cliente['status'] == 1) { ?>
            <span class="badge badge-dark">Active</span>
            <?php } else { ?>
            <span class="badge badge-danger">Inactive</span>
            <?php } ?>
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
                <?php if (empty($cliente['imagen'])) { ?>
                <img src="<?= media() ?>/images/profile-avatar.png"
                  alt="Imagen">
                <?php } else { ?>
                <img
                  src="<?= media() ?>/images/uploads/<?= $cliente['imagen'] ?>"
                  alt="Imágen de: <?= $cliente['nombres'] . ' ' . $cliente['apellidos'] ?>">
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