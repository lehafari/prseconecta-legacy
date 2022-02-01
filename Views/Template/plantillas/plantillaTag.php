<?php $idtag = $data['idtag'] ?>

<div class="card my-4 sombra-light" data-id="<?= $idtag ?>">
  <div class="card-body">
    <span class="handle">
      <i class='bx bx-menu'></i>
    </span>
    <span class="contenido ">
      <?= $data['titulotag'] ?>
    </span>
    <div class="float-right">
      <span class="cursor-pointer" onclick="delInfo(this,<?= $idtag ?>)">
        <i class='bx bxs-trash-alt'></i>
      </span>
    </div>
    <div class="float-right">
      <span class="cursor-pointer" onclick="editInfo(this,<?= $idtag ?>)">
        <i class='bx bxs-edit-alt'></i>
      </span>
    </div>
  </div>
</div>