<?php if (($_SESSION['permisosMod']['w']) || $_SESSION['permisosMod']['u']) { ?>
<div class="modal fade" id="modalFormCustomsForms" tabindex="-1"
  aria-hidden="true">
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
        <form id="frmCustomForm" class="form-horizontal" name="frmCustomForm">
          <input type="hidden" id="idForm" name="idForm" value="">
          <div class="form-group">
            <label for="titulo">Title</label>
            <input type="text" class="form-control" name="titulo" id="titulo">
          </div>
          <div class="tile-footer">
            <button class="btn btn-primary" id="btnActionForm" type="submit">
              <i class='bx bx-pencil iconbtn'></i>
              <span id="btnText">Save</span></button>&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-danger"
              data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>