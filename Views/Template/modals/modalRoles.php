<div class="modal fade" id="modalFormRol" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Rol</h5>
        <button type="button" class="close" data-dismiss="modal"
          aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formRol" name="formRol">
          <input type="hidden" id="idRol" name="idRol" value="">
          <div class="form-group">
            <label id="nombre" class="control-label">Nombre</label>
            <input class="form-control" id="nombre" name="nombre" type="text"
              placeholder="Nombre del rol">
          </div>
          <div class="form-group">
            <label for="descripcion" class="control-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion"
              rows="2" placeholder="Descripcion del Rol"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleSelect1">Estado</label>
            <select class="form-control" id="listStatus" name="listStatus">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
          </div>
          <div class="tile-footer">
            <button class="btn btn-primary" id="btnActionForm" type="submit">

              <i class='bx bx-pencil iconbtn'></i>
              <span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
            <a class="btn btn-danger " href="#" data-dismiss="modal">

              Cancel
              <i class='bx bx-x-circle'></i>
            </a>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>