<div class="card my-2 sombra" data-id="<?= $data['idcheck'] ?>">
  <div class="card-body">
    <div class="btn-group">
      <button type="button" class="btn btn-sm ml-2 p-0 dropdown-toggle"
        data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
        <i class='bx bx-dots-vertical'></i>
      </button>
      <div class="dropdown-menu">
        <button onclick="editInfo(this,<?= $data['idcheck'] ?>)"
          class="dropdown-item"><i class='bx bxs-pencil'></i>
          Edit
        </button>
        <button onclick="delInfo(this,<?= $data['idcheck'] ?>)"
          class="dropdown-item btn-outline-danger"><i class='bx bxs-trash'></i>
          Delete
        </button>
      </div>
    </div>
    <?= $data['titulo'] ?>
  </div>
</div>