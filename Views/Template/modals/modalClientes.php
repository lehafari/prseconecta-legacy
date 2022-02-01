<?php if(($_SESSION['permisosMod']['w']) || $_SESSION['permisosMod']['u']){ ?>
<div class="modal fade" id="modalFormClientes" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formClientes" class="form-horizontal" name="formClientes">
                    <input type="hidden" id="idClient" name="idClient" value="">
                    <p class="text-primary">Fields with <span class="required">*</span> are required.</p>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label class="control-label" for="username">Username <span class="required">*</span></label>
                            <input class="form-control form-control-sm" id="username" name="username" type="text" placeholder="Enter Username">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="nombre">First Name <span class="required">*</span></label>
                            <input class="form-control form-control-sm" id="nombre" name="nombre" type="text" placeholder="First Name">
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label" for="apellido">Last Name <span
                                    class="required">*</span></label>
                            <input class="form-control form-control-sm" id="apellido" name="apellido" type="text"
                                placeholder="Last Name">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="telefono">Phone</label>
                            <input class="form-control form-control-sm" id="telefono" name="telefono" type="text" placeholder="Phone">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="email">Email <span class="required">*</span></label>
                            <input class="form-control form-control-sm" id="email" name="email" type="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="listStatus">Status</label>
                            <select name="listStatus" id="listStatus" class="form-control form-control-sm selectpicker">
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password" class="control-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" id="btnActionForm" type="submit">
                            <i class='bx bx-pencil iconbtn'></i>
                            <span id="btnText">Save</span></button>&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>