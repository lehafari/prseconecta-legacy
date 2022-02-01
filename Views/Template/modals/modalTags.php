<div class="modal fade" id="modalTags" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header headerUpdate">
        <h5 class="modal-title" id="titleModal">Add</h5>
        <button type="button" class="close" data-dismiss="modal"
          aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmTags">
          <input type="hidden" name="idtag" value="" id="idtag">
          <div class="form-group">
            <input type="text" name="title" class="form-control"
              placeholder="Title Tag">
          </div>
          <div class="tile-footer d-flex justify-content-end">
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