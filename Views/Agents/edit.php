<?php
$agente = $data['agente'];
$idagente = $agente['idpersona'];
$extrajson = json_decode($agente['extrajson']);
$socialmedia = json_decode($agente['socialmedia']);
headerAdmin($data);
?>

<div class="row">
  <div class="col-md-12">
    <div class="tile pb-1">
      <div class="tile-title d-flex align-items-center">
        <a class="mr-2 bx-fade-left-hover" href="<?= base_url() ?>/agents"
          title="Go to agents">
          <i class='bx bxs-left-arrow-circle text-dark'></i>
        </a>
        <i class='bx bxs-user-voice mr-2'></i>
        <?= $data['page_title'] ?>

      </div>
    </div>
  </div>
</div>


<div class="app-content">
  <div class="row">
    <div class="col-xl-3 col-lg-6">
      <div class="tile">
        <div class="tile-body">
          <form id="form-imagen-perfil">
            <input type="hidden" name="idpersona" value="<?= $idagente ?>">
            <div class="photo">
              <div class="prevPhoto">
                <input type="hidden" id="foto_actual" name="foto_actual"
                  value="<?= $agente['imagen'] ?>">
                <input type="hidden" id="foto_remove" name="foto_remove"
                  value="0">
                <label for="foto">
                  <?php if (empty($agente['imagen'])) { ?>
                  <img src="<?= media() ?>/images/profile-avatar.png"
                    alt="Imagen">
                  <?php } else { ?>
                  <img
                    src="<?= media() ?>/images/uploads/<?= $agente['imagen'] ?>"
                    alt="Imágen de: <?= $agente['nombres'] . ' ' . $agente['apellidos'] ?>">
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
                Update profile picture
              </button>
              <button type="button"
                class="btn btn-danger delPhoto 
                  <?= empty($agente['imagen']) ? 'notBlock' : '' ?> mx-auto mt-3 sombra"
                pr="<?= $idagente ?>">
                Delete profile picture
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
          <div class="tile-title">
            <h4 class="d-flex justify-content-between">
              <span>
                Personal Data <i class='bx bxs-user-circle'></i>
              </span>
              <span>
                <a target="_blank"
                  href="<?= base_url() ?>/agentes/agente/<?= $agente['usuario'] ?>"
                  class="btn btn-info font-weight-bold"><i
                    class='bx bx-show'></i> View Public Profile</a>
              </span>
            </h4>
            <?php if ($_SESSION['permisosMod']['d'] == 1) { ?>

            <button type="button" onclick="delInfo(<?= $idagente ?>,true)"
              class="btn btn-danger"><i class='bx bxs-trash-alt'></i>
              Delete Account
            </button>
            <?php } ?>
          </div>
          <form id="formAgentes">
            <input type="hidden" name="idAgent" value="<?= $idagente ?>">
            <p class="mb-0 font-weight-bold ">Fields with <span
                class="required">*</span> are required.
            </p>
            <div class="form-row">
              <div class="form-group col-md-6 mt-2">
                <label class="control-label h5" for="username">Username <span
                    class="required">*</span></label>
                <input class="form-control" id="username" name="username"
                  type="text" placeholder="Please enter username"
                  value="<?= $agente['usuario'] ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label h5" for="email">Email <i
                    class='bx bx-mail-send'></i><span
                    class="required">*</span></label>
                <input class="form-control" id="email" name="email" type="text"
                  placeholder="Please enter agent email"
                  value="<?= $agente['email_user'] ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label h5" for="nombre">Firstname <span
                    class="required">*</span></label>
                <input class="form-control" id="nombre" name="nombre"
                  type="text" placeholder="Type agent Firstname"
                  value="<?= $agente['nombres'] ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label h5" for="apellido">Lastname <span
                    class="required">*</span></label>
                <input class="form-control" id="apellido" name="apellido"
                  type="text" placeholder="Type agent Lastname"
                  value="<?= $agente['apellidos'] ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label h5" for="telefono">Phone <i
                    class='bx bx-phone'></i></label>
                <input class="form-control" id="telefono" name="telefono"
                  type="text" placeholder="Type agent phone"
                  value="<?= $agente['telefono'] ?>">
              </div>

              <div class="form-group col-md-6">
                <label class="control-label h5" for="mobile">Mobile <i
                    class='bx bxs-mobile'></i></label>
                <input class="form-control" id="mobile" name="extra[mobile]"
                  type="text" placeholder="Type agent mobile"
                  value="<?= !empty($extrajson->mobile) ? $extrajson->mobile : '' ?>">
              </div>

              <div class="form-group col-md-6">
                <label class="control-label h5" for="title">Title /
                  Position</label>
                <input class="form-control" id="title"
                  name="extra[titulo_posicion]" type="text"
                  placeholder="Enter title or position"
                  value="<?= !empty($extrajson->titulo_posicion) ? $extrajson->titulo_posicion : '' ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label h5" for="licencia">License
                </label>
                <input class="form-control" id="licencia" name="extra[licencia]"
                  type="text" placeholder="Enter License"
                  value="<?= !empty($extrajson->licencia) ? $extrajson->licencia : '' ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label h5" for="whatsapp">WhatsApp
                </label>
                <input class="form-control" id="whatsapp" name="extra[whatsapp]"
                  type="text" placeholder="Enter WhatsApp Number"
                  value="<?= !empty($extrajson->whatsapp) ? $extrajson->whatsapp : '' ?>">
              </div>

              <div class="form-group col-md-6">
                <label class="control-label h5" for="taxnumber">Tax Number
                </label>
                <input class="form-control" id="taxnumber"
                  name="extra[taxnumber]" type="text"
                  placeholder="Enter Tax Number"
                  value="<?= !empty($extrajson->taxnumber) ? $extrajson->taxnumber : '' ?>">
              </div>

              <div class="form-group col-md-6">
                <label class="control-label h5" for="lenguaje">Lenguage
                </label>
                <input class="form-control" id="lenguaje" name="extra[lenguaje]"
                  type="text" placeholder="English, Español, French"
                  value="<?= !empty($extrajson->lenguaje) ? $extrajson->lenguaje : '' ?>">
              </div>

              <div class="form-group col-md-6">
                <label class="control-label h5" for="faxnumber">Fax number
                </label>
                <input class="form-control" id="faxnumber"
                  name="extra[faxnumber]" type="text"
                  placeholder="Enter Fax Number"
                  value="<?= !empty($extrajson->faxnumber) ? $extrajson->faxnumber : '' ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label h5" for="companyname">Company name
                </label>
                <input class="form-control" id="companyname"
                  name="extra[companyname]" type="text"
                  placeholder="Enter Company Name"
                  value="<?= !empty($extrajson->companyname) ? $extrajson->companyname : '' ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label h5" for="address">Address
                </label>
                <input class="form-control" id="address" name="extra[address]"
                  type="text" placeholder="Enter address"
                  value="<?= !empty($extrajson->address) ? $extrajson->address : '' ?>">
              </div>

              <div class="form-group col-md-6">
                <label class="control-label h5" for="listStatus">Status
                </label>
                <select name="listStatus" id="listStatus" class="form-control">
                  <option <?= $agente['status'] == 1 ? 'selected' : '' ?>
                    value="1">Active</option>
                  <option <?= $agente['status'] == 2 ? 'selected' : '' ?>
                    value="2">Inactive</option>
                </select>
              </div>


              <div class="form-group col-md-12">
                <label class="control-label" for="servicesareas">Services areas
                </label>
                <input class="form-control" id="servicesareas"
                  name="extra[servicesareas]" type="text"
                  placeholder="Enter services areas"
                  value="<?= !empty($extrajson->servicesareas) ? $extrajson->servicesareas : '' ?>">
              </div>
              <div class="form-group col-md-12">
                <label class="control-label h5" for="specialities">Specialities
                </label>
                <input class="form-control" id="specialities"
                  name="extra[specialities]" type="text"
                  placeholder="Enter specialities"
                  value="<?= !empty($extrajson->specialities) ? $extrajson->specialities : '' ?>">
              </div>

              <div class="form-group col-md-12">
                <label class="control-label h5" for="aboutme">Sobre mí
                </label>
                <textarea name="extra[aboutme]" id="sobremi" cols="30"
                  rows="10"><?= !empty($extrajson->aboutme) ? $extrajson->aboutme : '' ?></textarea>
              </div>




              <div class="form-group col-md-12">
                <button type="submit" class="btn-info btn">
                  <i class='bx bxs-save'></i>
                  Update </button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class=".col-md-12">
      <div class="tile">
        <div class="title-title p-4">
          <h4 class="text-center">Social Networks <i
              class='bx bxs-network-chart'></i> </h4>
        </div>
        <form id="socialmediaform" class="form-row">
          <input type="hidden" name="idpersona" value="<?= $idagente ?>">
          <div class="form-group col-md-6">
            <label class="control-label h5" for="facebook">Facebook </label>
            <input class="form-control" id="facebook" name="facebook"
              placeholder="Enter Facebook link" type="url"
              value="<?= !empty($socialmedia->facebook) ?  $socialmedia->facebook : '' ?>">
          </div>

          <div class="form-group col-md-6">
            <label class="control-label h5" for="twitter">Twitter </label>
            <input class="form-control" id="twitter" name="twitter"
              placeholder="Enter Twitter link" type="url"
              value="<?= !empty($socialmedia->twitter) ? $socialmedia->twitter : '' ?>">
          </div>

          <div class="form-group col-md-6">
            <label class="control-label h5" for="linkedin">Linkedin </label>
            <input class="form-control" id="linkedin" name="linkedin"
              placeholder="Enter Linkedin link" type="url"
              value="<?= !empty($socialmedia->linkedin) ? $socialmedia->linkedin : '' ?>">
          </div>

          <div class="form-group col-md-6">
            <label class="control-label h5" for="instagram">Instagram </label>
            <input class="form-control" id="instagram" name="instagram"
              placeholder="Enter Instagram link" type="url"
              value="<?= !empty($socialmedia->twitter) ? $socialmedia->twitter : '' ?>">
          </div>

          <div class="form-group col-md-6">
            <label class="control-label h5" for="googleplus">Google Plus
            </label>
            <input class="form-control" id="googleplus" name="googleplus"
              placeholder="Enter Google Plus link" type="url"
              value="<?= !empty($socialmedia->googleplus) ? $socialmedia->googleplus : '' ?>">
          </div>

          <div class="form-group col-md-6">
            <label class="control-label h5" for="youtube">Youtube </label>
            <input class="form-control" id="youtube" name="youtube"
              placeholder="Enter Youtube link" type="url"
              value="<?= !empty($socialmedia->youtube) ? $socialmedia->youtube : '' ?>">
          </div>

          <div class="form-group col-md-6">
            <label class="control-label h5" for="pinterest">Pinterest </label>
            <input class="form-control" id="pinterest" name="pinterest"
              placeholder="Enter Pinterest link" type="url"
              value="<?= !empty($socialmedia->pinterest) ? $socialmedia->pinterest : '' ?>">
          </div>

          <div class="form-group col-md-6">
            <label class="control-label h5" for="vimeo">Vimeo </label>
            <input class="form-control" id="vimeo" name="vimeo"
              placeholder="Enter Vimeo link" type="url"
              value="<?= !empty($socialmedia->vimeo) ? $socialmedia->vimeo : '' ?>">
          </div>

          <div class="form-group col-md-6">
            <label class="control-label h5" for="skype">Skype </label>
            <input class="form-control" id="skype" name="skype"
              placeholder="Enter the skype ID" type="text"
              value="<?= !empty($socialmedia->skype) ? $socialmedia->skype : '' ?>">
          </div>

          <div class="form-group col-md-6">
            <label class="control-label h5" for="sitioweb">Sitio web </label>
            <input class="form-control" id="sitioweb" name="sitioweb"
              placeholder="Enter website link" type="url"
              value="<?= !empty($socialmedia->sitioweb) ? $socialmedia->sitioweb : '' ?>">
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn-info btn">
              <i class='bx bxs-save'></i>
              Update Social Networks </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-md-12">
      <div class="tile">


        <div class="tile-body">

          <div class="tile-title">
            <h4>Custom Background <i class='bx bxs-image'></i></h4>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="dropzone dropzone-file-area" id="fileUpload">
                <div class="dz-default dz-message  bx-tada-hover">
                  <h3 class="sbold">Drag files here to upload <i
                      class='bx bx-upload'></i></h3>
                  <span>You can also click to open file explorer</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-title pb-4">
          <h4 class="text-center">Change Password <i class='bx bxs-lock'></i>
          </h4>

        </div>
        <form id="form-change-password">
          <input type="hidden" name="idpersona" value="<?= $idagente ?>">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="control-label h5" for="password">Password
              </label>
              <input class="form-control form-control-sm" id="password"
                name="password" type="password">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label h5" for="confirmPassword">Confirm
                Password </label>
              <input class="form-control form-control-sm" id="confirmPassword"
                name="confirmPassword" type="password">
            </div>
            <div class="col-md-12 mx-auto">
              <button type="submit" class="btn-info btn">
                <i class='bx bxs-save'></i>
                Update Password
              </button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="tile-title mb-5">
            <h4 class="text-center">All Reviews <i class='bx bxs-chat'></i></h4>
          </div>
          <?php if (!empty($agente['comentarios'])) {
            foreach ($agente['comentarios'] as $comentario) { ?>
          <div class="tile">
            <div class="tile-body">
              <div class="row">
                <div class="col-sm-2 text-center mb-sm-0 mb-3">
                  <img style="width: 75px; border-radius: 75px;"
                    src="<?= media() ?>/images/uploads/<?= !empty($comentario['imagen']) ? $comentario['imagen'] : 'profile-agente.jpg' ?>"
                    alt="Imagen de perfil de: <?= $comentario['usuario'] ?>">
                </div>
                <div class="col-sm-10">
                  <div class="row">
                    <div class="col-lg-6">
                      <h4><?= $comentario['usuario'] ?>
                      </h4>

                    </div>
                    <div class="col-lg-6 text-lg-right text-start pr-0">
                      <span>
                        <i class='bx bx-link'></i>
                        <?= timeago($comentario['datecreated']); ?>
                        <div class="btn-group">
                          <button type="button"
                            class="btn btn-sm ml-2 p-0 dropdown-toggle"
                            data-toggle="dropdown" aria-haspopup="false"
                            aria-expanded="false">
                            <i class='bx bx-dots-vertical'></i>
                          </button>
                          <div class="dropdown-menu">
                            <button
                              onclick="editarComentario(event,'<?= openssl_encrypt($comentario['idreview'], METHODENCRIPT, KEY);  ?>',this)"
                              class="dropdown-item"><i
                                class='bx bxs-pencil'></i>
                              Edit
                            </button>
                            <button
                              onclick="eliminarComentario(event,'<?= openssl_encrypt($comentario['idreview'], METHODENCRIPT, KEY); ?>',this)"
                              class="dropdown-item btn-outline-danger"><i
                                class='bx bxs-trash'></i>
                              Delete
                            </button>
                          </div>
                        </div>
                      </span>
                    </div>
                    <div class="col-md-12 pt-3">
                      <p>
                        <?= $comentario['comentario'] ?>
                      </p>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
          <?php }
          } else { ?>
          <h4 class="text-center">There aren't reviews </h4>
          <?php } ?>

        </div>
      </div>
    </div>
  </div>

</div>


<?php footerAdmin($data); ?>
<script>
Dropzone.autoDiscover = false;
var fileList = new Array;
const myDropzone = $("#fileUpload").dropzone({
  maxFilesize: 1,
  url: base_url + "/agents/changeCustomBg",
  method: "POST",
  addRemoveLinks: true,
  uploadMultiple: 1,
  parallelUploads: 1,
  maxFiles: 1,
  acceptedFiles: 'image/*',
  dictMaxFilesExceeded: "Maximum upload limit reached",
  dictInvalidFileType: "upload only JPG/PNG",

  success: function(file, response) {
    file.previewElement.classList.add("dz-success");

    const respuesta = JSON.parse(response)

    const {
      status,
      msg
    } = respuesta

    if (status) {
      swal("Agent", msg, 'success')
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

    this.on("sending", function(file, xhr, formdata) {
      formdata.append("idpersona",
        "<?= $agente['idpersona'] ?>");
    });

    <?php if (!empty($agente['custombg'])) :
        $filesize = 0;
        $path = 'Assets/images/uploads/' . $agente['custombg'];
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
      "<?= media() ?>/images/uploads/<?= $agente['custombg'] ?>"
    );

    const element = drpzone.element.children[1]
    element.id = 'deletefilewhenupdate';
    const progress = $(element).find('.dz-progress').remove();
    <?php endif; ?>



    this.on("addedfile", function(event) {
      while (this.files.length > this.options.maxFiles) {
        this.removeFile(this.files[0]);
      }
    });
    this.on("removedfile", function(file) {
      if (!this.files.length) {
        const path = base_url + '/agents/delCustomBg'
        const json = {
          action: 'delete',
          idpersona: '<?= $agente['idpersona'] ?>'
        }
        $.post(path, json).done(data => {
          const respuesta = JSON.parse(data)

          if (respuesta.status) {
            swal('Agent', respuesta.msg, 'success')
          } else {
            swal('', respuesta.msg, 'error')
          }
        })
      }
    });
  },


});
</script>