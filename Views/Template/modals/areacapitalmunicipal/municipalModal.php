<div class="modal fade" id="municipalModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal"></h5>
        <button type="button" class="close" data-dismiss="modal"
          aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formMunicipal" class="form-horizontal" name="formMunicipal">
          <input type="hidden" id="idmunicipal" name="idmunicipal">
          <div class="form-group">
            <label for="tituloMunicipal">Title</label>
            <input type="text" id="tituloMunicipal" class="form-control"
              name="tituloMunicipal" placeholder="Ingresar Nombre municipal">
          </div>
          <div class="tile-footer">
            <button class="btn btn-primary box-shadow-none" id="btnActionForm"
              type="submit">
              <i class='bx bx-pencil iconbtn'></i>
              <span id="btnText">Save</span></button>&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-danger box-shadow-none"
              data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>