<?php 
headerAdmin($data); 
getModal('modalRoles',$data);
?>

<div id="contentAjax"></div>

<div class="row">
    <div class="col-md-12">
        <div class="tile pb-1">
            <div class="tile-title d-flex align-items-center">
                <i class='bx bxs-key mr-2'></i>
                <?= $data['page_title'] ?>
                <?php if($_SESSION['permisosMod']['w'] == 1){ ?>

                <button class="btn btn-dark ml-2 sombra" onclick="openModal()">
                    <i class='bx bx-plus-medical'></i>
                    New Rol
                </button>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="row">
        <div class="col-md-12">
            <div class="tile sombra">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableRoles">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php footerAdmin($data); ?>