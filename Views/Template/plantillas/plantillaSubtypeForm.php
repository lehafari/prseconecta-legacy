<?php
$dataSubtipo = $data['subtipo'];
$dataTipo = $data['tipo'];
?>

<div class="row justify-content-center mt-4" id="divTipos">
  <div class="col-md-12 mb-5">
    <div class="titulo text-center">
      <h4 class="text-center nombreTipo mb-3">
        [<?= $dataTipo['title'] ?>]
        [<span class="nameSubtype"><?= $dataSubtipo['titulo'] ?></span>] <br>
      </h4>
      <?php if ($dataTipo['idtipo'] != 1) { ?>
      <span>
        <?php if (!empty($_SESSION['permisosMod']['d'])) { ?>
        <button class="btn btn-danger"
          onclick="deleteSubtype(<?= $dataSubtipo['idsubtipo'] ?>)">
          Delete subtype <i class='bx bxs-trash'></i>
        </button>
        <?php } ?>
        <?php if (!empty($_SESSION['permisosMod']['u'])) { ?>
        <button class="btn btn-info"
          onclick="editSubType(<?= $dataSubtipo['idsubtipo'] ?>)">
          Edit subtype <i class='bx bx-edit-alt'></i>
        </button>
        <?php } ?>
      </span>
      <?php } ?>
    </div>


  </div>
  <div class="col-md-6">
    <h4>
      Field Builder
      <button type="button" onclick="newFormDetailTitle('.frmFielBuilder')"
        class="btn btn-primary btn-sm">
        New <i class='bx bx-plus-medical'></i>
      </button>
    </h4>

    <form class="frmFielBuilder" onsubmit="frmFielBuilder(event)">
      <input type="hidden" name="idsubtipo"
        value="<?= $dataSubtipo['idsubtipo'] ?>">
      <input type="hidden" name="idform">
      <div class="form-group">
        <label for="fieldname">Field Name</label>
        <input type="text" class="form-control form-control-sm" id="fieldname"
          name="fieldname">
      </div>
      <div class="form-group">
        <label for="placeholder">Placeholder</label>
        <input type="text" class="form-control form-control-sm" id="placeholder"
          name="placeholder">
      </div>
      <div class="form-group">
        <label for="tipo">Type</label>
        <select name="tipo" onchange="onChangeSelectFormBuilder(this)"
          class="form-control" id="tipo">
          <option value="text">Text</option>
          <option value="number">Number</option>
          <option value="textarea">Text area</option>
          <option value="select">Select</option>
          <option value="multi-select">Multi Select</option>
        </select>
      </div>

      <div class="form-group">
        <label for="availableForSearches">Make available for searches</label>

        <select name="availableForSearches" id="availableForSearches"
          class="form-control">
          <option value="0">No</option>
          <option value="1">Yes</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Save <i
          class='bx bx-save'></i></button>
    </form>
  </div>
  <div class="col-md-6">
    <h4>
      Detail Titles
      <button type="button" onclick="newFormDetailTitle('.frmTitleBuilder')"
        class="btn btn-primary btn-sm">New <i
          class='bx bx-plus-medical'></i></button>
    </h4>
    <form class="frmTitleBuilder" onsubmit="frmTitleBuilder(event)">
      <input type="hidden" name="idform">
      <input type="hidden" name="idsubtipo"
        value="<?= $dataSubtipo['idsubtipo'] ?>">
      <div class="form-group">
        <label for="titleBuilder">Title</label>
        <input type="text" class="form-control form-control-sm"
          name="titleBuilder" id="titleBuilder">
      </div>
      <button type="submit" class="btn btn-primary">Save <i
          class='bx bx-save'></i></button>
    </form>
  </div>

  <div class="col-md-12 mt-5">
    <h4>
      [<?= $dataTipo['title'] ?>]
      [<span class="nameSubtype"><?= $dataSubtipo['titulo'] ?></span>] Settings
      <br>
    </h4>

    <?php
    $arrayOverviewDetailFields = [
      [
        'titulo' => 'Show/Hide (Top) Overview Fields',
        'name' => 'topOverfield',
        'tabla' => 'top_overview_field'
      ],
      [
        'titulo' => 'Show/Hide (Top Right) Overview Fields',
        'name' => 'topRightOverfield',
        'tabla' => 'top_right_overview_field'
      ],
      [
        'titulo' => 'Show/Hide (Top) Detail Fields',
        'name' => 'topDetailFields',
        'tabla' => 'top_detail_field'
      ],
    ];

    foreach ($arrayOverviewDetailFields as $select) {
      $columna = $dataSubtipo[$select['tabla']];
      $columna = explode(',', $columna);
    ?>

    <div class="form-group mb-5 mt-3">
      <label for="<?= $select['name'] ?>"><?= $select['titulo'] ?></label>
      <select
        onchange="onChangeSelectOverviews(this,{idsubtipo: <?= $dataSubtipo['idsubtipo'] ?>, tabla: '<?= $select['tabla'] ?>' })"
        class="selectpicker form-control" data-dropup-auto="false" data-size="5"
        data-live-search="true" name="<?= $select['name'] ?>"
        id="<?= $select['name'] ?>" multiple>
        <?php foreach ($dataSubtipo['formbuilder'] as $formBuilder) {
            if ($formBuilder['type'] != 'titulo') {
          ?>
        <option
          <?= in_array($formBuilder['idform'], $columna) ? 'selected' : '' ?>
          class="opt-frmBuilder-<?= $formBuilder['idform'] ?>"
          value="<?= $formBuilder['idform'] ?>">
          <?= $formBuilder['field_name'] ?></option>
        <?php }
          } ?>
      </select>
    </div>

    <?php } ?>
  </div>

  <div class="col-md-12 my-4">
    <h4>
      Show/Hide Detail Fields
    </h4>
    <div class="form-row text-center mt-5">
      <div class="col-md-6">
        <h5>Disabled</h5>

      </div>
      <div class="col-md-6">
        <h5>Enabled</h5>
      </div>
    </div>
    <div class="form-row text-center py-2" style="border-top: 2px solid #ccc;">
      <div class="col-md-6" id="list-group-add-form" style="min-height: 100px;">

        <?php foreach ($dataSubtipo['formbuilder'] as $formBuilder) {
          if ($formBuilder['status'] == 2) {   ?>
        <div class="card my-4 sombra-light"
          data-id="<?= $formBuilder['idform'] ?>">
          <div class="card-body p-2" style="text-align: start;">
            <?php if (!empty($_SESSION['permisosMod']['u']) || !empty($_SESSION['permisosMod']['d'])) { ?>
            <div class="btn-group">
              <button type="button" class="btn btn-sm ml-2 p-0 dropdown-toggle"
                data-toggle="dropdown" aria-haspopup="false"
                aria-expanded="false">
                <i class='bx bx-dots-vertical'></i>
              </button>
              <div class="dropdown-menu">
                <?php if (!empty($_SESSION['permisosMod']['u'])) { ?>
                <button
                  onclick="editInfoFormBuilder(this,<?= $formBuilder['idform'] ?>)"
                  class="dropdown-item"><i class='bx bxs-pencil'></i>
                  Edit
                </button>
                <?php } ?>
                <?php if (!empty($_SESSION['permisosMod']['d'])) { ?>
                <button
                  onclick="delInfoFormBuilder(this,<?= $formBuilder['idform'] ?>)"
                  class="dropdown-item btn-outline-danger"><i
                    class='bx bxs-trash'></i>
                  Delete
                </button>
                <?php } ?>
              </div>
            </div>
            <?php } ?>
            <span class="contenido">
              <?= $formBuilder['field_name'] ?>
              <span style="color: #aaaaaa;">[<?= $formBuilder['type'] ?>]</span>
            </span>
          </div>
        </div>
        <?php }
        } ?>
      </div>
      <div class="col-md-6" id="list-group-added" style="min-height: 100px;"
        class="pb-5">
        <?php foreach ($dataSubtipo['formbuilder'] as $formBuilder) {
          if ($formBuilder['status'] == 1) {   ?>
        <div class="card my-4 sombra-light"
          data-id="<?= $formBuilder['idform'] ?>">
          <div class="card-body p-2" style="text-align: start;">
            <?php if (!empty($_SESSION['permisosMod']['u']) || !empty($_SESSION['permisosMod']['d'])) { ?>
            <div class="btn-group">
              <button type="button" class="btn btn-sm ml-2 p-0 dropdown-toggle"
                data-toggle="dropdown" aria-haspopup="false"
                aria-expanded="false">
                <i class='bx bx-dots-vertical'></i>
              </button>
              <div class="dropdown-menu">
                <?php if (!empty($_SESSION['permisosMod']['d'])) { ?>
                <button
                  onclick="editInfoFormBuilder(this,<?= $formBuilder['idform'] ?>)"
                  class="dropdown-item"><i class='bx bxs-pencil'></i>
                  Edit
                </button>
                <?php } ?>
                <?php if (!empty($_SESSION['permisosMod']['d'])) { ?>
                <button
                  onclick="delInfoFormBuilder(this,<?= $formBuilder['idform'] ?>)"
                  class="dropdown-item btn-outline-danger"><i
                    class='bx bxs-trash'></i>
                  Delete
                </button>
                <?php } ?>
              </div>
            </div>
            <?php } ?>
            <span class="contenido">
              <?= $formBuilder['field_name'] ?>
              <span style="color: #aaaaaa;">[<?= $formBuilder['type'] ?>]</span>
            </span>
          </div>
        </div>
        <?php }
        } ?>

      </div>
    </div>
  </div>

</div>

<script>
arrayFormBuilder = [{
  selector: '#list-group-add-form',
  ordenGet: '<?= $dataSubtipo['orden_disabled'] ?>',
  status: 2,
  name: 'orden_disabled',
  idsubtipo: <?= $dataSubtipo['idsubtipo'] ?>
}, {
  selector: '#list-group-added',
  ordenGet: '<?= $dataSubtipo['ordern_enabled'] ?>',
  status: 1,
  name: 'ordern_enabled',
  idsubtipo: <?= $dataSubtipo['idsubtipo'] ?>
}]
arrayFormBuilder.forEach(object => sortableFormBuilder(object))
</script>