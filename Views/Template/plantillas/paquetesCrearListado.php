<?php
$paquete = $data;

$idpaquete = 1;
if (!empty($paquete)) {
  $idpaquete = $paquete['idpackage'];
}
$valores = !empty($paquete['valores']) ? $paquete['valores'] : [];
$paqueteRegular = 1;
$paqueteDestacado = 2;
$paqueteSuperDestacado = 3;

if ($idpaquete == $paqueteSuperDestacado) {
  $maxFiles = 25;
} else if ($idpaquete ==  $paqueteDestacado) {
  $maxFiles = 10;
} else {
  $maxFiles = 3;
}
?>


<div class="col-md-12">


  <div class="tile bg-light mb-0 border-bottom-no-radius">
    <h5>Imágenes</h5>
  </div>

  <div class="tile rounded-0">
    <div class="tile-body">
      <div class="form-group">
        <div class="dropzone dropzone-file-area" id="fileUpload">
          <div class="dz-default dz-message">
            <h3 class="sbold">Arrastra las imágenes de la propiedad aqui
              para subirlos <i class='bx bx-upload'></i></h3>
            <span>También puede hacer clic para abrir el explorador de
              archivos</span>
          </div>
        </div>
      </div>
      <p class="font-weight-bold">Por favor espere hasta que se hayan subido
        completamente las imágenes.
      </p>
      <p class="text-danger" style="display: none;" id="msgFileUpload">
        <b>El número máximo de imágenes en este paquete es de
          <?= $maxFiles ?></b>
      </p>
      <?php if (!empty($valores['imagenes'])) { ?>
      <div id="containerImages">
        <?php foreach ($valores['imagenes'] as $imagen) { ?>
        <div id="div<?= $imagen['id'] ?>">
          <div class="prevImage">
            <img
              src="<?= media() ?>/images/uploads/<?= $imagen['rutaimagen'] ?>"></img>
          </div>
          <button type="button" class="btnDeleteImage"
            onclick="fntDelItemImagen('#div<?= $imagen['id'] ?>')"
            imgname="<?= $imagen['id'] ?>"><i class='bx bxs-trash'></i>
          </button>
        </div>
        <?php } ?>
      </div>
      <?php } ?>

    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="tile bg-light mb-0 border-bottom-no-radius">
    <h5>Vídeo</h5>
  </div>
  <div class="tile rounded-0">
    <?php if (
      $idpaquete == $paqueteDestacado
      || $idpaquete == $paqueteSuperDestacado
    ) { ?>
    <div class="form-group">
      <label for="">URL del vídeo</label>
      <input type="url"
        value="<?= !empty($valores['videoLink']) ? $valores['videoLink'] : null ?>"
        name="videoLink" class="form-control"
        placeholder="Se admiten YouTube, Vimeo, archivos SWF & archivos MOV">
      <small class="text-muted">Por ejemplo:
        https://www.youtube.com/watch?v=49d3Gn41IaA</small>
    </div>
    <?php } ?>
    <div class="form-group">
      <input
        value="<?= !empty($valores['audioVideoLink']) ? $valores['audioVideoLink'] : null ?>"
        type="url" name="audioVideoLink" class="form-control"
        placeholder="Mp4, OGG & Webm Video Link are supporte">
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="tile bg-light mb-0 border-bottom-no-radius">
    <h5>Documentos de propiedad</h5>
  </div>
  <div class="tile rounded-0">
    <p>Puedes adjuntar archivos PDF, imágenes de mapas u otros documentos.
    </p>
    <label for="btnFilePdfDocumentos" style="font-size: 16px !important;"
      class="btn btn-info">
      <input type="file" accept="application/pdf" name="btnFilePdfDocumentos"
        style="display: none;" id="btnFilePdfDocumentos">
      Seleccionar archivo adjunto
    </label>

    <?php if (!empty($valores['documentoPdf'])) { ?>
    <div class="mt-3">
      <a target="_blank"
        href="<?= media() ?>/images/uploads/<?= $valores['documentoPdf'] ?>"
        class="btn btn btn-danger">Ver documento PDF <i
          class='bx bxs-file-pdf'></i></a>
    </div>
    <?php } ?>
  </div>
</div>


<?php if ($idpaquete == $paqueteSuperDestacado) { ?>
<div class="col-md-12">
  <div class="tile bg-light mb-0 border-bottom-no-radius">
    <h5>
      <label for="tour360Link">Tour Virtual 360</label>
    </h5>
  </div>
  <div class="tile rounded-0">
    <div class="form-group">
      <textarea name="tour360Link" class="form-control"
        placeholder="Ingresa el iframe / código de inserción del recorrido virtual"
        id="tour360Link" cols="30"
        rows="10"><?= !empty($valores['tour360link']) ? $valores['tour360link'] : null  ?></textarea>
    </div>
  </div>
</div>
<?php } ?>


<script>
<?php if (empty($valores)) { ?>
renderFileInput(<?= $maxFiles ?>);

<?php } else { ?>
document.addEventListener('DOMContentLoaded', function() {
  renderFileInput(<?= $maxFiles . ',' . $valores['idpropiedad'] ?>)
});
<?php } ?>
</script>