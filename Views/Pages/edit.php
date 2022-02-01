<?php 
headerAdmin($data);
getModal('modalLists',$data);
?>

<div class="row">
    <div class="col-md-12">
        <div class="tile pb-1">
            <div class="tile-title d-flex align-items-center">
                <i class='bx bxs-file mr-2'></i>
                <?= $data['page_title'] ?>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="row">
        <div class="col-md-12">
            <div class="tile sombra">
                <div class="tile-body">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="tile sombra">
                <div class="tile-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="tile-title">
                                <h3 class="text-center">Icons</h3>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tile-title">
                                <h3 class="text-center">Create List <button onclick="openModal()" type="button"
                                        class="btn btn-primary mx-auto">Add <i class='bx bx-plus-medical'></i></button>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php footerAdmin($data) ?>