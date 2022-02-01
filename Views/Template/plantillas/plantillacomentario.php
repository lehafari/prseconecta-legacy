<div class="tile">
  <div class="tile-body">
    <div class="row">
      <div class="col-sm-2 text-center mb-sm-0 mb-3">
        <img style="width: 75px; border-radius: 75px;"
          src="<?= media() ?>/images/uploads/<?= !empty($data['imagen']) ? $data['imagen'] : 'profile-agente.jpg' ?>"
          alt="Imagen de perfil de: <?= $data['usuario'] ?>">
      </div>
      <div class="col-sm-10">
        <div class="row">
          <div class="col-lg-6">
            <h4><?= $data['usuario'] ?></h4>

          </div>
          <div class="col-lg-6 text-lg-right text-start pr-0">
            <span>
              <i class='bx bx-link'></i>
              <?= timeago($data['datecreated']); ?>
              <?php if (!empty($_SESSION['idUser-cliente'])) {
                if ($_SESSION['idUser-cliente'] == $data['idreviewer']) { ?>
              <div class="btn-group">
                <button type="button"
                  class="btn btn-sm ml-2 p-0 dropdown-toggle"
                  data-toggle="dropdown" aria-haspopup="false"
                  aria-expanded="false">
                  <i class='bx bx-dots-vertical'></i>
                </button>
                <div class="dropdown-menu">
                  <button
                    onclick="editarComentario(event,'<?= openssl_encrypt($data['idreview'], METHODENCRIPT, KEY);  ?>',this)"
                    class="dropdown-item"><i class='bx bxs-pencil'></i> Editar
                  </button>
                  <button
                    onclick="eliminarComentario(event,'<?= openssl_encrypt($data['idreview'], METHODENCRIPT, KEY); ?>',this)"
                    class="dropdown-item btn-outline-danger"><i
                      class='bx bxs-trash'></i> Eliminar
                  </button>
                </div>
              </div>
              <?php }
              } ?>
            </span>
          </div>
          <div class="col-md-12 pt-3">
            <?= $data['comentario'] ?>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>