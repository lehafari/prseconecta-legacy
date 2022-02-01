<?php
$cliente = $data['cliente'];
headerAdmin($data);
?>

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
    <div class="col-xl-3 col-lg-6">
      <div class="tile">
        <div class="tile-body">
          <form id="form-imagen-perfil">
            <input type="hidden" name="idcliente"
              value="<?= $cliente['idpersona'] ?>">
            <div class="photo">
              <div class="prevPhoto">
                <input type="hidden" id="foto_actual" name="foto_actual"
                  value="<?= $cliente['imagen'] ?>">
                <input type="hidden" id="foto_remove" name="foto_remove"
                  value="0">
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
              <div class="upimg">
                <input type="file" name="foto" id="foto">
              </div>
              <div id="form_alert"></div>
            </div>
            <p class="h5 text-center mt-3">(300px x 300px)</p>
            <div class="d-flex flex-column ">
              <button id="btnSubmitPhoto" type="button"
                class="btn btn-light mx-auto mt-3 sombra">
                <i class='bx bx-upload'></i>
                Update profile picture
              </button>
              <button type="button" pr="<?= $cliente['idpersona'] ?>"
                class="btn btn-danger delPhoto 
                  <?= empty($cliente['imagen']) ? 'notBlock' : '' ?> mx-auto mt-3 sombra">
                Delete profile picture
                <i class='bx bxs-trash'></i>
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>
    <div class="col-xl-9 col-lg-6">
      <div class="tile">
        <div class="tile-body">

          <div class="tile-title">
            <h4 class="text-center">Personal Data <i
                class='bx bxs-user-detail'></i></h4>
          </div>

          <form id="formClientes">
            <input type="hidden" name="idClient"
              value="<?= $cliente['idpersona'] ?>">
            <p class="mb-0 font-weight-bold ">Fields with <span
                class="required">*</span> are required.
            </p>
            <div class="form-row">
              <div class="form-group col-md-6 mt-2">
                <label class="control-label h5" for="username">Username <span
                    class="required">*</span></label>
                <input class="form-control" id="username" name="username"
                  type="text" placeholder="Enter a username"
                  value="<?= $cliente['usuario'] ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label h5" for="email">Email <i
                    class='bx bx-mail-send'></i><span
                    class="required">*</span></label>
                <input class="form-control" id="email" name="email" type="text"
                  placeholder="Email" value="<?= $cliente['email_user'] ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label h5" for="nombre">Name <span
                    class="required">*</span></label>
                <input class="form-control" id="nombre" name="nombre"
                  type="text" placeholder="Name"
                  value="<?= $cliente['nombres'] ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label h5" for="apellido">Lastname <span
                    class="required">*</span></label>
                <input class="form-control" id="apellido" name="apellido"
                  type="text" placeholder="Lastname"
                  value="<?= $cliente['apellidos'] ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label h5" for="telefono">Phone <i
                    class='bx bx-phone'></i></label>
                <input class="form-control" id="telefono" name="telefono"
                  type="text" placeholder="Phone"
                  value="<?= $cliente['telefono'] ?>">
              </div>

              <h4 class="col-md-6">
                <label for="listStatus">Status</label>
                <select class="form-control selectpicker" name="listStatus"
                  id="listStatus">
                  <option <?= $cliente['status'] == 1 ? 'selected' : '' ?>
                    value="1">Active</option>
                  <option <?= $cliente['status'] == 2 ? 'selected' : '' ?>
                    value="2">Inactive</option>
                </select>
              </h4>

              <div class="form-group col-md-12">
                <button type="submit" class="btn-info btn">
                  <i class='bx bxs-save'></i>
                  Update </button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>


  </div>

  <div class="row mt-5">

    <div class="col-md-12">
      <div class="tile">

        <div class="tile-title">
          <h4 class="text-center mb-4">Change Password <i
              class='bx bxs-lock-alt'></i></h4>

        </div>
        <form id="form-change-password">
          <input type="hidden" name="idClient"
            value="<?= $cliente['idpersona'] ?>">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="control-label h5" for="password">Password
              </label>
              <input class="form-control form-control-sm" id="password"
                name="password" type="password">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label h5" for="confirmPassword">Confirm
                Password </label>
              <input class="form-control form-control-sm" id="confirmPassword"
                name="confirmPassword" type="password">
            </div>
            <div class="col-md-12 text-center">
              <button type="submit" class="btn-info btn">
                <i class='bx bxs-save'></i>
                Update Password
              </button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

  <?php if ($_SESSION['permisosMod']['d'] == 1) { ?>
  <div class="row mt-5">
    <div class="col-md-12 text-right">
      <button type="button" onclick="delInfo(<?= $cliente['idpersona'] ?>,true)"
        class="btn btn-danger ml-auto"><i class='bx bxs-trash-alt'></i>
        Delete Account</button>
    </div>

    <?php } ?>
  </div>

  <?php footerAdmin($data); ?>