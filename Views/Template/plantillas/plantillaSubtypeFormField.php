<div class="card my-4 sombra-light" data-id="<?= $data['idform'] ?>">
  <div class="card-body p-2" style="text-align: start;">
    <?php if (!empty($_SESSION['permisosMod']['u']) || !empty($_SESSION['permisosMod']['d'])) { ?>
    <div class="btn-group">
      <button type="button" class="btn btn-sm ml-2 p-0 dropdown-toggle"
        data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
        <i class='bx bx-dots-vertical'></i>
      </button>
      <div class="dropdown-menu">
        <?php if (!empty($_SESSION['permisosMod']['u'])) { ?>
        <button onclick="editInfoFormBuilder(this,<?= $data['idform'] ?>)"
          class="dropdown-item"><i class='bx bxs-pencil'></i>
          Edit
        </button>
        <?php } ?>
        <?php if (!empty($_SESSION['permisosMod']['d'])) { ?>

        <button onclick="delInfoFormBuilder(this,<?= $data['idform'] ?>)"
          class="dropdown-item btn-outline-danger"><i class='bx bxs-trash'></i>
          Delete
        </button>
        <?php } ?>
      </div>
    </div>
    <?php } ?>
    <span class="contenido">
      <?= $data['field_name'] ?>
      <span style="color: #aaaaaa;">[<?= $data['type'] ?>]</span>
    </span>
  </div>
</div>