<div class="card">
  <div class="tile-title mb-1 p-0" id="heading-<?= $data['idtipo'] ?>">
    <h5 class="mb-0">
      <button
        class="btn btn-link btn-block rounded-0 box-shadow-none text-left text-dark"
        id="data-customform-<?= $data['idtipo'] ?>" type="button"
        data-toggle="collapse" data-target="#collapse-<?= $data['idtipo'] ?>"
        aria-expanded="false"
        onclick="editInfoTipo(event,<?= $data['idtipo'] ?>)"
        aria-controls="collapse-<?= $data['idtipo'] ?>">
        <?= $data['title'] ?>
      </button>
    </h5>
  </div>

  <div id="collapse-<?= $data['idtipo'] ?>" class="collapse"
    aria-labelledby="heading-<?= $data['idtipo'] ?>" data-parent="#accordion">
    <div class="tile-body">
      <button class="btn btn-block mt-0 sombra-light"
        onclick="newSubType(<?= $data['idtipo'] ?>)">
        <div class="text-left ml-3">
          <i class='bx bxs-add-to-queue'></i>
          Add subtype
        </div>
      </button>
    </div>
  </div>
</div>