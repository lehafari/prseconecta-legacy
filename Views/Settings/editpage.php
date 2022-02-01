<?php
$page = $data['page'];
headerAdmin($data);
?>



<div class="row">
  <div class="col-md-12">
    <div class="tile pb-1">
      <div class="tile-title d-flex align-items-center">
        <a class="mr-2 bx-fade-left-hover"
          href="<?= base_url() ?>/settings/pages" title="Go to agents">
          <i class='bx bxs-left-arrow-circle text-dark'></i>
        </a>
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
          <div class="text-right">
            <a target="_blank" href="<?= base_url() . '/' . $page['ruta'] ?>"
              class="btn btn-outline-primary mb-4">
              <div class="d-flex justify-content-center align-items-center">
                <span class="mr-2">
                  View
                  Page</span> <i class='bx bxs-show'></i>
              </div>
            </a>
          </div>
          <form id="formEditarPage">
            <input type="hidden" id="foto_actual" name="foto_actual"
              value="<?= $page['imagen'] ?>">
            <input type="hidden" id="foto_remove" name="foto_remove" value="0">
            <input type="hidden" name="idpage" value="<?= $page['idpage'] ?>">
            <div class="form-group">
              <label for="titulo">Title</label>
              <input type="text" id="titulo" name="titulo" placeholder="Title"
                value="<?= $page['titulo'] ?>" class="form-control">
            </div>
            <?php if ($page['idpage'] != PHOME) { ?>
            <div class="form-group">
              <label for="contenido">Content</label>
              <textarea name="contenido" id="contenido"
                placeholder="Content page" cols="30"
                rows="10"><?= $page['contenido'] ?></textarea>
            </div>
            <?php } ?>
            <div class="form-group">
              <input id="archivos" name="file" type="file" class="file"
                data-browse-on-zone-click="true">
            </div>

            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary bx-tada-hover">
                Save <i class='bx bxs-save'></i>
            </div>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php footerAdmin($data); ?>

<script>
const configFileInput = {
  showCaption: false,
  removeIcon: '<i class="bx bxs-trash"></i>',
  removeClass: "btn btn-danger",
  uploadClass: "d-none",
  browseClass: "d-none",
  cancelClass: "d-none",
  allowedFileExtensions: ['jpg', 'png', 'jpeg', 'gif'],
  initialPreviewShowDelete: true,
  fileActionSettings: {
    showRemove: false,
    zoomIcon: '<i class="bx bx-zoom-in"></i>',
  },
  previewZoomButtonIcons: {
    toggleheader: '<i class="bx bx-expand" ></i>',
    fullscreen: '<i class="bx bx-fullscreen"></i>',
    borderless: '<i class="bx bx-expand-alt" ></i>',
    close: '<i class="bx bx-x"></i>'
  },
}

<?php if (!empty($page['imagen'])) :  ?>
configFileInput.initialPreview = [
  "<img src='<?= media() . '/images/uploads/' . $page['imagen'] ?>' class='kv-preview-data file-preview-image'>",
]
configFileInput.initialPreviewConfig = [{
  type: "image",
  caption: "<?= ltrim(substr($page['imagen'], strrpos($page['imagen'], '/')), '/') ?>",
  size: <?= $page['filesize'] ?>,
}]

<?php endif; ?>

$("#archivos").fileinput(configFileInput).on("filebatchselected", function(
  event, files) {

  $("#archivos").fileinput("upload");

});

$('#archivos').on('fileclear', function(e) {
  document.querySelector("#foto_remove").value = 1;
});

$("#archivos").on('change', function() {});
</script>