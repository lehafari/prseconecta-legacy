<?php
headerAdmin($data);
getModal('modalCharacteristics', $data);
?>



<div class="row">
  <div class="col-md-12">
    <div class="tile pb-1">
      <div class="tile-title d-flex align-items-center">
        <i class='bx bxs-check-square mr-2'></i>
        <?= $data['page_title'] ?>

      </div>
    </div>
  </div>
</div>

<div class="app-content">
  <div class="row">
    <div class="col-md-6">
      <div class="alert alert-light">
        <h4 class="text-center">non-add list</h4>
      </div>
      <button onclick="openModal()" class="btn btn-primary btn-block btn-lg">
        Add <i class='bx bx-list-plus'></i></button>

      <div id="list-group-add" class="grupodrag">
        <?php foreach ($data['characteristic']['non-add'] as $nonadd) { ?>
        <div class="card my-4 sombra-light" data-id="<?= $nonadd['idcheck'] ?>">
          <div class="card-body">
            <div class="btn-group">
              <button type="button" class="btn btn-sm ml-2 p-0 dropdown-toggle"
                data-toggle="dropdown" aria-haspopup="false"
                aria-expanded="false">
                <i class='bx bx-dots-vertical'></i>
              </button>
              <div class="dropdown-menu">
                <button onclick="editInfo(this,<?= $nonadd['idcheck'] ?>)"
                  class="dropdown-item"><i class='bx bxs-pencil'></i>
                  Edit
                </button>
                <button onclick="delInfo(this,<?= $nonadd['idcheck'] ?>)"
                  class="dropdown-item btn-outline-danger"><i
                    class='bx bxs-trash'></i>
                  Delete
                </button>
              </div>
            </div>
            <span class="contenido">
              <?= $nonadd['titulo'] ?>
            </span>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
    <div class="col-md-6">
      <div class="alert alert-light">
        <h4 class="text-center">Add list</h4>
      </div>
      <div id="list-group-added" class="grupodrag">
        <?php foreach ($data['characteristic']['add'] as $add) { ?>
        <div class="card my-4 sombra-light" data-id="<?= $add['idcheck'] ?>">
          <div class="card-body">

            <?php if (!empty($_SESSION['permisosMod']['u']) || !empty($_SESSION['permisosMod']['d'])) { ?>
            <div class="btn-group">
              <button type="button" class="btn btn-sm ml-2 p-0 dropdown-toggle"
                data-toggle="dropdown" aria-haspopup="false"
                aria-expanded="false">
                <i class='bx bx-dots-vertical'></i>
              </button>
              <div class="dropdown-menu">
                <button onclick="editInfo(this,<?= $add['idcheck'] ?>)"
                  class="dropdown-item"><i class='bx bxs-pencil'></i>
                  Edit
                </button>
                <button onclick="delInfo(this,<?= $add['idcheck'] ?>)"
                  class="dropdown-item btn-outline-danger"><i
                    class='bx bxs-trash'></i>
                  Delete
                </button>
              </div>
            </div>
            <?php } ?>
            <span class="contenido">
              <?= $add['titulo'] ?>
            </span>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>


<?php footerAdmin($data); ?>

<script>
const listGroupAdd = document.querySelector('#list-group-add')
new Sortable(listGroupAdd, {
  group: {
    name: 'shared',
  },
  animation: 250,
  chosenClass: "seleccionado",
  ghostClass: "fantasma",
  dragClass: "drag",
  easing: "cubic-bezier(0.895, 0.03, 0.685, 0.22)",
  store: {
    set: async (sortable) => {
      const orden = sortable.toArray();
      const url = `${base_url}/characteristics/setOrder`
      $.post(url, {
        status: 1,
        name: 'listgroup1',
        orden: orden.join(',')
      })
    },

    get: (sortable) => {
      const orden = '<?= $data['orden']['listgroup1'] ?>';
      return orden ? orden.split(',') : [];
    }
  }
});
const listGroupAdded = document.querySelector('#list-group-added')

new Sortable(listGroupAdded, {
  group: {
    name: 'shared',
  },
  chosenClass: "seleccionado",
  ghostClass: "fantasma",
  dragClass: "drag",
  animation: 150,

  store: {
    set: (sortable) => {
      const orden = sortable.toArray();
      const url = `${base_url}/characteristics/setOrder`
      $.post(url, {
        status: 2,
        name: 'listgroup2',
        orden: orden.join(',')
      })
    },

    get: (sortable) => {
      const orden = '<?= $data['orden']['listgroup2'] ?>';
      return orden ? orden.split(',') : [];
    }
  }
});
</script>