<?php
$userData = $_SESSION['userData-cliente'];

$extrajson = json_decode($userData['extrajson']);
$socialmedia = json_decode($userData['socialmedia']);
$rutaPerfil = base_url() . '/agentes/agente/' . $userData['rutausuario'];
headerAdmin($data);
?>

<section class="home-section">
  <div class="home-content d-flex justify-content-between">
    <h3>
      <i class="bx bx-user-circle"></i>
      Mi Perfil
    </h3>
    <?php if ($userData['idrol'] == RAGENTES) { ?>
    <a href="<?= $rutaPerfil ?>" target="_blank"
      class="btn btn-info text-white mr-4 sombra-btn font-weight-bold">
      <div class='bx bx-show '></div>
      Ver Perfil Público
    </a>
    <?php } ?>
  </div>


  <div class="app-content">
    <div class="row">
      <div class="col-xl-3 col-lg-6">
        <div class="tile">
          <div class="tile-body">
            <form id="form-imagen-perfil">
              <div class="photo">
                <div class="prevPhoto">
                  <input type="hidden" id="foto_actual" name="foto_actual"
                    value="<?= $userData['imagen'] ?>">
                  <input type="hidden" id="foto_remove" name="foto_remove"
                    value="0">
                  <label for="foto">
                    <?php if (empty($userData['imagen'])) { ?>
                    <img src="<?= media() ?>/images/profile-avatar.png"
                      alt="Imagen">
                    <?php } else { ?>
                    <img
                      src="<?= media() ?>/images/uploads/<?= $userData['imagen'] ?>"
                      alt="Imágen de: <?= $userData['nombres'] . ' ' . $userData['apellidos'] ?>">
                    <?php } ?>
                  </label>
                </div>
                <div class="upimg">
                  <input type="file" name="foto" id="foto">
                </div>
                <div id="form_alert"></div>
              </div>
              <p class="h5 text-center mt-3">(300px x 300px)</p>
              <div class="d-flex flex-column ">
                <button id="btnSubmitPhoto" type="button"
                  class="btn btn-light mx-auto mt-3 sombra">
                  <i class='bx bx-upload'></i>
                  Actualizar Foto de Perfil
                </button>
                <button type="button"
                  class="btn btn-danger delPhoto 
                  <?= empty($userData['imagen']) ? 'notBlock' : '' ?> mx-auto mt-3 sombra">
                  Eliminar foto de Perfil
                  <i class='bx bxs-trash'></i>
                </button>
              </div>

            </form>
          </div>
        </div>
      </div>
      <div class="col-xl-9 col-lg-6">
        <div class="tile">
          <div class="tile-body">
            <p class="mb-3">Campos con <span class="required">*</span> son
              requeridos.
            </p>
            <form id="form-perfil">

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label class="control-label h5" for="username">Nombre de
                    Usuario <span class="required">*</span></label>
                  <input class="form-control" id="username" name="username"
                    type="text" placeholder="Ingresa el nombre de usuario"
                    value="<?= $userData['usuario'] ?>">
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label h5" for="email">Correo <span
                      class="required">*</span></label>
                  <input class="form-control" id="email" name="email"
                    type="text" placeholder="Ingresa tu correo"
                    value="<?= $userData['email_user'] ?>">
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label h5" for="firstname">Nombre <span
                      class="required">*</span></label>
                  <input class="form-control" id="firstname" name="firstname"
                    type="text" placeholder="Ingresa tu nombre"
                    value="<?= $userData['nombres'] ?>">
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label h5" for="lastname">Apellido <span
                      class="required">*</span></label>
                  <input class="form-control" id="lastname" name="lastname"
                    type="text" placeholder="Ingresa tu Apellido"
                    value="<?= $userData['apellidos'] ?>">
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label h5" for="phone">Teléfono </label>
                  <input class="form-control" id="phone" name="phone"
                    type="text" placeholder="Ingresa tu teléfono"
                    value="<?= $userData['telefono'] ?>">
                </div>
                <?php if ($userData['idrol'] == RAGENTES) { ?>

                <div class="form-group col-md-6">
                  <label class="control-label h5" for="mobile">Móvil </label>
                  <input class="form-control" id="mobile" name="extra[mobile]"
                    type="text" placeholder="Ingresa tu teléfono móvil"
                    value="<?= $userData['telefono'] ?>">
                </div>

                <?php } ?>


                <h4 class="col-md-12 pt-2 pb-4">
                  <label for="rol">Tipo usuario</label>
                  <select class="form-control selectpicker" name="rol" id="rol">
                    <option
                      <?= $userData['idrol'] == RCLIENTES ? 'selected' : '' ?>
                      value="<?= RCLIENTES ?>">
                      Cliente</option>
                    <option
                      <?= $userData['idrol'] == RAGENTES ? 'selected' : '' ?>
                      value="<?= RAGENTES ?>">
                      Agente</option>
                  </select>
                </h4>

                <?php if ($userData['idrol'] == RAGENTES) { ?>
                <div class="form-group col-md-6">
                  <label class="control-label h5" for="title">Título /
                    Posición</label>
                  <input class="form-control" id="title"
                    name="extra[titulo_posicion]" type="text"
                    placeholder="Ingresa tu título o posición"
                    value="<?= isset($extrajson->titulo_posicion) ? $extrajson->titulo_posicion : '' ?>">
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label h5" for="licencia">Licencia
                  </label>
                  <input class="form-control" id="licencia"
                    name="extra[licencia]" type="text"
                    placeholder="Ingresa tu Licencia"
                    value="<?= isset($extrajson->licencia) ? $extrajson->licencia : '' ?>">
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label h5" for="whatsapp">WhatsApp
                  </label>
                  <input class="form-control" id="whatsapp"
                    name="extra[whatsapp]" type="text"
                    placeholder="Ingresa tu número de WhatsApp"
                    value="<?= isset($extrajson->whatsapp) ? $extrajson->whatsapp : '' ?>">
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label h5" for="taxnumber">Número de Tax
                  </label>
                  <input class="form-control" id="taxnumber"
                    name="extra[taxnumber]" type="text"
                    placeholder="Ingresa tu número de Tax"
                    value="<?= isset($extrajson->taxnumber) ? $extrajson->taxnumber : '' ?>">
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label h5" for="lenguaje">Lenguaje
                  </label>
                  <input class="form-control" id="lenguaje"
                    name="extra[lenguaje]" type="text"
                    placeholder="English, Español, French"
                    value="<?= isset($extrajson->lenguaje) ? $extrajson->lenguaje : '' ?>">
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label h5" for="faxnumber">Número de Fax
                  </label>
                  <input class="form-control" id="faxnumber"
                    name="extra[faxnumber]" type="text"
                    placeholder="Ingresa tu número de Fax"
                    value="<?= isset($extrajson->faxnumber) ? $extrajson->faxnumber : '' ?>">
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label h5" for="companyname">Nombre de
                    compañía </label>
                  <input class="form-control" id="companyname"
                    name="extra[companyname]" type="text"
                    placeholder="Ingresa el nombre de tu compañía"
                    value="<?= isset($extrajson->companyname) ? $extrajson->companyname : '' ?>">
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label h5" for="address">Dirección
                  </label>
                  <input class="form-control" id="address" name="extra[address]"
                    type="text" placeholder="Ingresa tu dirección"
                    value="<?= isset($extrajson->address) ? $extrajson->address : '' ?>">
                </div>


                <div class="form-group col-md-12">
                  <label class="control-label" for="servicesareas">Areas de
                    servicios </label>
                  <input class="form-control" id="servicesareas"
                    name="extra[servicesareas]" type="text"
                    placeholder="Ingresa tus areas de servicios"
                    value="<?= isset($extrajson->servicesareas) ? $extrajson->servicesareas : '' ?>">
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label h5"
                    for="specialities">Especialidades </label>
                  <input class="form-control" id="specialities"
                    name="extra[specialities]" type="text"
                    placeholder="Ingresa tus especialidades"
                    value="<?= isset($extrajson->specialities) ? $extrajson->specialities : '' ?>">
                </div>

                <div class="form-group col-md-12">
                  <label class="control-label h5" for="aboutme">Sobre mí
                  </label>
                  <textarea name="extra[aboutme]" id="sobremi" cols="30"
                    rows="10"><?= isset($extrajson->aboutme) ? $extrajson->aboutme : '' ?></textarea>
                </div>

                <?php } ?>



                <div class="form-group col-md-12">
                  <button type="submit" class="btn-info btn">
                    <i class='bx bxs-save'></i>
                    Actualizar Perfil </button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
    <?php if ($userData['idrol'] == RAGENTES) { ?>

    <div class="row">
      <div class="col-xl-3 col-lg-6 p-0">
        <h5 class="ml-3">Redes Sociales </h5>
      </div>
      <div class="col-xl-9 col-lg-6">
        <div class="tile">
          <form id="socialmediaform" class="form-row">
            <div class="form-group col-md-6">
              <label class="control-label h5" for="facebook">Facebook </label>
              <input class="form-control" id="facebook" name="facebook"
                placeholder="Ingresa el link de tu facebook" type="url"
                value="<?= isset($socialmedia->facebook) ?  $socialmedia->facebook : '' ?>">
            </div>

            <div class="form-group col-md-6">
              <label class="control-label h5" for="twitter">Twitter </label>
              <input class="form-control" id="twitter" name="twitter"
                placeholder="Ingresa el link de tu twitter" type="url"
                value="<?= isset($socialmedia->twitter) ? $socialmedia->twitter : '' ?>">
            </div>

            <div class="form-group col-md-6">
              <label class="control-label h5" for="linkedin">Linkedin </label>
              <input class="form-control" id="linkedin" name="linkedin"
                placeholder="Ingresa el link de tu Linkedin" type="url"
                value="<?= isset($socialmedia->linkedin) ? $socialmedia->linkedin : '' ?>">
            </div>

            <div class="form-group col-md-6">
              <label class="control-label h5" for="instagram">Instagram </label>
              <input class="form-control" id="instagram" name="instagram"
                placeholder="Ingresa el link de tu Instagram" type="url"
                value="<?= isset($socialmedia->twitter) ? $socialmedia->twitter : '' ?>">
            </div>

            <div class="form-group col-md-6">
              <label class="control-label h5" for="googleplus">Google Plus
              </label>
              <input class="form-control" id="googleplus" name="googleplus"
                placeholder="Ingresa el link de tu Google Plus" type="url"
                value="<?= isset($socialmedia->googleplus) ? $socialmedia->googleplus : '' ?>">
            </div>

            <div class="form-group col-md-6">
              <label class="control-label h5" for="youtube">Youtube </label>
              <input class="form-control" id="youtube" name="youtube"
                placeholder="Ingresa el link de tu Youtube" type="url"
                value="<?= isset($socialmedia->youtube) ? $socialmedia->youtube : '' ?>">
            </div>

            <div class="form-group col-md-6">
              <label class="control-label h5" for="pinterest">Pinterest </label>
              <input class="form-control" id="pinterest" name="pinterest"
                placeholder="Ingresa el link de tu Pinterest" type="url"
                value="<?= isset($socialmedia->pinterest) ? $socialmedia->pinterest : '' ?>">
            </div>

            <div class="form-group col-md-6">
              <label class="control-label h5" for="vimeo">Vimeo </label>
              <input class="form-control" id="vimeo" name="vimeo"
                placeholder="Ingresa el link de tu Vimeo" type="url"
                value="<?= isset($socialmedia->vimeo) ? $socialmedia->vimeo : '' ?>">
            </div>

            <div class="form-group col-md-6">
              <label class="control-label h5" for="skype">Skype </label>
              <input class="form-control" id="skype" name="skype"
                placeholder="Ingresa el link de tu Skype" type="text"
                value="<?= isset($socialmedia->skype) ? $socialmedia->skype : '' ?>">
            </div>

            <div class="form-group col-md-6">
              <label class="control-label h5" for="sitioweb">Sitio web </label>
              <input class="form-control" id="sitioweb" name="sitioweb"
                placeholder="Ingresa el link de tu sitio web" type="url"
                value="<?= isset($socialmedia->sitioweb) ? $socialmedia->sitioweb : '' ?>">
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn-info btn">
                <i class='bx bxs-save'></i>
                Actualizar Redes Sociales </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php } ?>

    <div class="row mt-5">
      <div class="col-xl-3 col-lg-6 p-0">
        <h5 class="ml-3 h7">Cambiar Contraseña </h5>
      </div>
      <div class="col-xl-9 col-lg-6">
        <div class="tile">
          <form id="form-change-password">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="control-label h5" for="password">Contraseña
                </label>
                <input class="form-control form-control-sm" id="password"
                  name="password" type="password">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label h5" for="passwordconfirm">Confirmar
                  Contraseña </label>
                <input class="form-control form-control-sm" id="passwordconfirm"
                  name="passwordconfirm" type="password">
              </div>
              <div class="col-md-12 mx-auto">
                <button type="submit" class="btn-info btn">
                  <i class='bx bxs-save'></i>
                  Actualizar Contraseña
                </button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
    <?php if ($userData['idrol'] == RAGENTES) { ?>

    <div class="row mt-5">
      <div class="col-md-12">
        <div class="tile">


          <div class="tile-body">

            <div class="tile-title">
              <h4>¡Customiza tu perfil! <i class='bx bxs-image'></i></h4>
              <h5>¡Sube una foto para dar inicio a tu Custom background!
              </h5>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="dropzone dropzone-file-area" id="fileUpload">
                  <div class="dz-default dz-message">
                    <h3 class="sbold">Arrastra los archivos aquí
                      para subirlos <i class='bx bx-upload'></i></h3>
                    <span>También puede hacer clic para abrir el explorador de
                      archivos</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php } ?>

    <div class="row mt-5">
      <div class="col-xl-3 col-lg-6 p-0">
        <h5 class="ml-3">Eliminar Cuenta </h5>
      </div>
      <div class="col-xl-9 col-lg-6">
        <div class="tile">
          <div class="tile-body">
            <button type="button" onclick="deleteAccount()"
              class="btn btn-danger"><i class='bx bxs-trash-alt'></i>
              Eliminar Cuenta</button>
          </div>
        </div>

      </div>
    </div>
  </div>


</section>

<?php footerAdmin($data); ?>
<?php if ($userData['idrol'] == RAGENTES) { ?>
<script>
Dropzone.autoDiscover = false;
var fileList = new Array;
const myDropzone = $("#fileUpload").dropzone({
  maxFilesize: 5,
  url: base_url + "/perfil/changeCustomBg",
  method: "POST",
  addRemoveLinks: true,
  uploadMultiple: 1,
  parallelUploads: 1,
  maxFiles: 1,
  acceptedFiles: 'image/*',
  dictMaxFilesExceeded: "Maximum upload limit reached",
  dictInvalidFileType: "upload only JPG/PNG",
  dictRemoveFile: "Borrar archivo",

  success: function(file, response) {
    file.previewElement.classList.add("dz-success");

    const respuesta = JSON.parse(response)

    const {
      status,
      msg
    } = respuesta

    if (status) {
      swal("Perfil", msg, 'success')
      if (document.getElementById('deletefilewhenupdate')) {
        $('#deletefilewhenupdate').remove();
      }
      return true;
    } else {
      swal("Perfil", msg, 'error')
    }
  },
  maxfilesexceeded: async function(files) {
    this.removeAllFiles();
    this.addFile(files);
  },
  error: function(file, response) {
    file.previewElement.classList.add("dz-error");
  },
  init: function() {
    thisDropzone = this;

    <?php if (!empty($userData['custombg'])) :
          $filesize = 0;
          $path = 'Assets/images/uploads/' . $userData['custombg'];
          if (file_exists($path)) {
            $filesize = filesize($path);
          }
        ?>

    const mockFile = {
      name: 'background.jpg',
      size: "<?= $filesize ?>"
    };
    this.emit("addedfile", mockFile);

    const drpzone = this.emit("thumbnail", mockFile,
      "<?= media() ?>/images/uploads/<?= $userData['custombg'] ?>");

    const element = drpzone.element.children[1]
    element.id = 'deletefilewhenupdate';
    const progress = $(element).find('.dz-progress').remove();
    <?php endif; ?>

    this.on("error", function(file, response) {
      swal(
        "",
        "Ha ocurrido un error..., por favor verifica tu conexión a internet y vuelve a subir las imágen de su custom background",
        "error"
      );
    });

    this.on("addedfile", function(event) {
      while (this.files.length > this.options.maxFiles) {
        this.removeFile(this.files[0]);
      }
    });
    this.on("removedfile", function(file) {
      if (!this.files.length) {
        const path = base_url + '/perfil/delCustomBg'
        const json = {
          action: 'delete'
        }
        $.post(path, json).done(data => {
          const respuesta = JSON.parse(data)

          if (respuesta.status) {
            swal('Perfil', respuesta.msg, 'success')
          } else {
            swal('', respuesta.msg, 'error')
          }
        })
      }
    });
  },


});
</script>

<?php } ?>