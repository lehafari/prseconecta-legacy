<?php
$userData = $_SESSION['userData-admin'];
headerAdmin($data);
?>



<div class="row">
  <div class="col-md-12">
    <div class="tile pb-1">
      <div class="tile-title d-flex align-items-center">
        <i class='bx bxs-user-circle mr-2'></i>
        <?= $data['page_title'] ?>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xl-3 col-lg-6">
    <div class="tile">
      <div class="tile-body">
        <form id="form-imagen-perfil">
          <div class="photo">
            <div class="prevPhoto">
              <input type="hidden" id="foto_actual" name="foto_actual"
                value="<?= $userData['imagen'] ?>">
              <input type="hidden" id="foto_remove" name="foto_remove"
                value="0">
              <label for="foto">
                <?php if (empty($userData['imagen'])) { ?>
                <img src="<?= media() ?>/images/profile-avatar.png"
                  alt="Imagen">
                <?php } else { ?>
                <img
                  src="<?= media() ?>/images/uploads/<?= $userData['imagen'] ?>"
                  alt="Imágen de: <?= $userData['nombres'] . ' ' . $userData['apellidos'] ?>">
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
              class="btn btn-light w-75 mx-auto mt-3 sombra">
              Update Profile Picture
              <i class='bx bx-upload'></i>
            </button>
            <button type="button"
              class="btn btn-danger delPhoto <?= empty($userData['imagen']) ? 'notBlock' : '' ?> w-75 mx-auto mt-3 sombra">
              Delete Profile Picture
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
        <form id="form-perfil">
          <h3>Personal Data <i class='bx bxs-user-detail'></i></h3>
          <p class="mb-2 " style="font-size: 12px;">Fields with <span
              class="required">*</span> are
            required. </p>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="control-label h5" for="firstname">First Name <span
                  class="required">*</span></label>
              <input class="form-control form-control-sm" id="firstname"
                name="firstname" type="text" placeholder="First Name"
                value="<?= $userData['nombres'] ?>">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label h5" for="lastname">Last Name <span
                  class="required">*</span></label>
              <input class="form-control form-control-sm" id="lastname"
                name="lastname" type="text" placeholder="Last Name"
                value="<?= $userData['apellidos'] ?>">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label h5" for="phone">Phone <i
                  class='bx bx-phone'></i></label>
              <input class="form-control form-control-sm" id="phone"
                name="phone" type="text" placeholder="Phone"
                value="<?= $userData['telefono'] ?>">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label h5" for="email">Email <i
                  class='bx bx-mail-send'></i><span
                  class="required">*</span></label>
              <input class="form-control form-control-sm" id="email"
                name="email" type="text" placeholder="Email"
                value="<?= $userData['email_user'] ?>">
            </div>
            <h4 class="col-md-12">
              Account Role: <?= $userData['nombrerol'] ?>
            </h4>
            <div>
              <button type="submit" class="btn-info btn">Save <i
                  class='bx bxs-save'></i></button>
            </div>
          </div>

        </form>
      </div>
    </div>

    <div class="tile">
      <div class="tile-body">
        <form id="form-change-password">
          <h3>Change Password <i class='bx bxs-lock'></i></h3>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="control-label h5" for="password">Password </label>
              <input class="form-control form-control-sm" id="password"
                name="password" type="password">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label h5" for="passwordconfirm">Confirm
                Password </label>
              <input class="form-control form-control-sm" id="passwordconfirm"
                name="passwordconfirm" type="password">
            </div>
            <div class="col-md-12 mx-auto">
              <button type="submit" class="btn-info btn">Save <i
                  class='bx bxs-save'></i></button>
            </div>
          </div>

        </form>
      </div>
    </div>

    <?php if ($userData['idpersona'] != 1) { ?>
    <div class="tile">
      <div class="tile-body">
        <h3>Delete Account
          <button type="button" onclick="deleteAccount()"
            class="btn btn-danger"><i class='bx bxs-trash-alt'></i> Delete
            Account</button>
        </h3>

      </div>
    </div>
    <?php } ?>
  </div>
</div>

<?php footerAdmin($data); ?>