<?php if (($_SESSION['permisosMod']['w']) || $_SESSION['permisosMod']['u']) { ?>
<div class="modal fade" id="modalFormUsuario" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal"></h5>
        <button type="button" class="close" data-dismiss="modal"
          aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formUsuarios" class="form-horizontal" name="formUsuarios">
          <input type="hidden" id="idUsuario" name="idUsuario" value="">
          <p class="text-primary">Fields with <span class="required">*</span>
            are required.</p>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="control-label" for="nombre">First Name <span
                  class="required">*</span></label>
              <input class="form-control" id="nombre" name="nombre" type="text"
                placeholder="First Name">
            </div>

            <div class="form-group col-md-6">
              <label class="control-label" for="apellido">Last Name <span
                  class="required">*</span></label>
              <input class="form-control" id="apellido" name="apellido"
                type="text" placeholder="Last Name">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="control-label" for="telefono">Phone</label>
              <input class="form-control" id="telefono" name="telefono"
                type="text" placeholder="Phone">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label" for="email">Email <span
                  class="required">*</span></label>
              <input class="form-control" id="email" name="email" type="email"
                placeholder="Email">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="control-label" for="listRolid">Rol</label>
              <select name="listRolid" data-live-search="true" id="listRolid"
                class="form-control selectpicker">
                <?php foreach ($data['roles'] as $rol) { ?>
                <option value="<?= $rol['idrol'] ?>"><?= $rol['nombrerol'] ?>
                </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label" for="listStatus">Status</label>
              <select name="listStatus" id="listStatus"
                class="form-control selectpicker">
                <option value="1">Active</option>
                <option value="2">Inactive</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="password" class="control-label">Password</label>
              <input type="password" name="password" id="password"
                class="form-control">
            </div>
          </div>
          <div class="tile-footer">
            <button class="btn btn-primary" id="btnActionForm" type="submit">
              <i class='bx bx-pencil iconbtn'></i>
              <span id="btnText">Save</span></button>&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-danger" data-dismiss="modal">
              Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<div class="modal fade" id="modalViewUser" tabindex="-1" role="dialog"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del usuario</h5>
        <button type="button" class="close" data-dismiss="modal"
          aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Firstname:</td>
              <td id="celNombre"></td>
            </tr>
            <tr>
              <td>Lastname:</td>
              <td id="celApellido"></td>
            </tr>
            <tr>
              <td>Phone:</td>
              <td id="celTelefono"></td>
            </tr>
            <tr>
              <td>rol:</td>
              <td id="celTipoUsuario"></td>
            </tr>
            <tr>
              <td>Email (Usuario):</td>
              <td id="celEmail"></td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celEstado"></td>
            </tr>
            <tr>
              <td>Fecha registro:</td>
              <td id="celFechaRegistro"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"
          data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>