<?php
$agente = $data['agente'];
$imagen = !empty($agente['imagen']) ? $agente['imagen'] : 'profile-agente.jpg';

?>

<div class="modal fade" id="modal-mensaje-perfil" tabindex="-1"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">
          <img style="width: 50px;"
            src="<?= media() ?>/images/uploads/<?= $imagen ?>"
            alt="Foto de perfil de: <?= $agente['usuario'] ?>">
          <i class='bx bx-user'></i> <?= $agente['usuario'] ?>
        </h5>
        <button type="button" class="close" data-dismiss="modal"
          aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert divAlertMensajeAgente">
          <p class="text-danger">

          </p>
        </div>
        <form id="formMensajePerfil">
          <input type="hidden" name="idagente"
            value="<?= openssl_encrypt($agente['idpersona'], METHODENCRIPT, KEY); ?>">
          <div class="form-group">
            <input type="text" placeholder="Tú nombre" name="name"
              class="form-control">
          </div>
          <div class="form-group">
            <input type="text" placeholder="Teléfono" name="telefono"
              class="form-control">
          </div>
          <div class="form-group">
            <input type="text" placeholder="Correo" name="email"
              class="form-control">
          </div>
          <div class="form-group">
            <textarea class="form-control" name="mensaje"
              rows="4">Hola! <?= $agente['usuario'] ?>, ví tu perfil en PRSECONECTA y quería ver si podría ayudarme</textarea>
          </div>
          <div class="form-group">
            <select name="proposito" class="form-control selectpicker">
              <option value="" class="d-none">Seleccionar</option>
              <option value="Soy un comprador">Soy un comprador</option>
              <option value="Soy un inquilino">Soy un inquilino</option>
              <option value="Soy un Agente">Soy un Agente</option>
              <option value="Otro">Otro</option>
            </select>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox"
              id="checkterminosperfil">
            <label class="form-check-label" for="checkterminosperfil">
              Aceptar <a href="<?= base_url() ?>/Terminos-y-condiciones"
                class="text-info" target="_blank">
                términos y condiciones
              </a>
            </label>
          </div>
          <div class="form-group">
            <button class="btn-danger btn btn-block">Enviar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>