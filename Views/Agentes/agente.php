<?php
headerTienda($data);
$agente = $data['agente'];
$extrajson = json_decode($agente['extrajson']);
$socialmedia = json_decode($agente['socialmedia']);
$imagen = !empty($agente['imagen']) ? $agente['imagen'] : 'profile-agente.jpg';
$fullname = $agente['nombres'] . ' ' . $agente['apellidos'];
$username = $agente['usuario'];
$comentarios = $agente['comentarios'];
getModal('modalMensajePerfil', $data);
?>



<div class="position-fixed top-0 left-0 p-3"
  style="z-index: 5; left: 0; top: 0;">
  <div class="toast" id="toastDelete" role="alert" aria-live="assertive"
    aria-atomic="true">
    <div class="toast-header">
      <i class='bx bxs-check-circle mr-2 icon'></i>
      <strong class="mr-auto">PR-SeConecta</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
        aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body"></div>
  </div>
</div>

<div class="my-5 mt-lg-0 py-5" id="main-wrapper">


  <div class="container-lg">
    <div class="<?= !empty($agente['custombg']) ? 'tile' : '' ?>">
      <div class="<?= !empty($agente['custombg']) ? 'tile-body' : '' ?>">
        <div class="recent-article-area  mb-5 pb-5">
          <div class="container-lg">
            <?php getFormPropertys() ?>
          </div>
        </div>


        <div class="recent-article-area my-5">
          <div class="container-lg">
            <div class="row">

              <div class="col-md-4">
                <div class="container-image-profile mt-4 sombra">

                  <img src="<?= media() ?>/images/uploads/<?= $imagen ?>"
                    alt="Foto de perfil de: <?= $username ?>">
                </div>
              </div>
              <div class="col-md-8">
                <h3 class="container-agente-rating mt-md-0 mt-3">
                  <?= $username ?>
                  <?php if (!empty($agente['promedio-rating'])) { ?>
                  <input id="rating-agente"
                    value="<?= $agente['promedio-rating'] ?>" data-size="sm"
                    class="rating rating-loading" data-show-clear="false"
                    data-show-caption="false">
                  <?php }
                  ?>


                </h3>
                <a href="#reviews" onclick="smoothMovement(event)"
                  class="text-info mt-2">Ver todos los
                  comentarios</a>

                <?php if (!empty($extrajson->titulo_posicion) and !empty($extrajson->companyname)) { ?>

                <p class="my-3">
                  <?= $extrajson->titulo_posicion ?>
                  en: <span
                    class="text-info"><?= $extrajson->companyname ?></span>
                  <br>
                  <hr>
                </p>
                <?php } ?>

                <?php if (!empty($extrajson->licencia)) { ?>
                <h5 class="fs-16 my-3">
                  <span class="font-weight-bold">Licencia de Agente:</span>
                  <?= $extrajson->licencia ?> <br>
                </h5>
                <?php } ?>

                <?php if (!empty($extrajson->taxnumber)) { ?>
                <h5 class="fs-16 my-3">
                  <span class="font-weight-bold">Número de Tax:</span>
                  <?= $extrajson->taxnumber ?> <br>
                </h5>
                <?php } ?>

                <?php if (!empty($extrajson->servicesareas)) { ?>
                <h5 class="fs-16 my-3">
                  <span class="font-weight-bold">Areas de servicio:</span>
                  <?= $extrajson->servicesareas ?> <br>
                </h5>
                <?php } ?>
                <?php if (!empty($extrajson->specialities)) { ?>
                <h5 class="fs-16 my-3">
                  <span class="font-weight-bold">Especialidades:</span>
                  <?= $extrajson->specialities ?> <br>
                </h5>
                <?php } ?>


                <div class="pt-2">
                  <button data-toggle="modal"
                    data-target="#modal-mensaje-perfil"
                    class="btn btn-danger btn-sm">Enviar un mensaje</button>
                  <?php if (!empty($extrajson->mobile)) { ?>
                  <a href="tel:<?= $extrajson->mobile ?>"
                    class="btn btn-outline-danger btn-sm">Llamar</a>
                  <?php } ?>
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="recent-article-area">
          <div class="container-lg">
            <div class="row">
              <div class="col-md-8">
                <div class="<?= !empty($agente['custombg']) ? 'tile' : ''  ?>">
                  <div
                    class="<?= !empty($agente['custombg']) ? 'tile-body' : ''  ?>">
                    <?php if (!empty($extrajson->aboutme)) { ?>
                    <h3 class="pb-4"> Sobre <?= $fullname ?></h3>

                    <div class="pb-4">
                      <?= $extrajson->aboutme ?>
                    </div>
                    <?php } ?>

                    <?php if (!empty($extrajson->lenguaje)) { ?>
                    <i class='bx bx-chat'></i> <b>Lenguajes:</b>
                    <?= $extrajson->lenguaje ?>
                    <?php } ?>

                    <ul class="nav nav-pills pt-4" id="pills-tab"
                      role="tablist">
                      <li class="nav-item border-0 w-50 pr-2"
                        role="presentation">
                        <a class="nav-link active btn btn-info tab"
                          id="pills-propiedades-tab" data-toggle="pill"
                          href="#pills-propiedades" role="tab"
                          aria-controls="pills-propiedades"
                          aria-selected="true">Propiedades</a>
                      </li>
                      <li class="nav-item w-50 pl-2" role="presentation">
                        <a class="nav-link btn btn-info tab" id="reviews"
                          data-toggle="pill" href="#pills-reviews" role="tab"
                          aria-controls="pills-reviews"
                          aria-selected="false">Comentarios</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="tabContent-agent">
                      <div class="tab-pane fade show active"
                        id="pills-propiedades" role="tabpanel"
                        aria-labelledby="pills-propiedades-tab">
                        <div class="container-fluid pt-4">
                          <?php if (!empty($data['propiedadesAgente'])) {
                            foreach ($data['propiedadesAgente'] as $propiedad) {
                              $rutaPropiedad = base_url() . '/resultados-busqueda?listing_id=' . $propiedad['idpropiedad'];
                              $formbuilderjson = json_decode($propiedad['formbuilderjson'], true);
                              $formbuilder = explode(',', $propiedad['subtipo']['top_overview_field']);
                          ?>
                          <div class="ad-content-property card">
                            <?php if (!empty($propiedad['portada'])) { ?>
                            <a class="img-sombra" href="<?= $rutaPropiedad ?>">
                              <div class="overlay-imagen">
                                <div
                                  class="position-absolute h-100 d-flex align-items-end">
                                  <h5 class="mt-auto text-light p-4">
                                    <?= SMONEY . formatMoney($propiedad['precio']) ?>
                                  </h5>
                                </div>
                              </div>
                              <img
                                src="<?= media() ?>/images/uploads/<?= $propiedad['portada'] ?>"
                                class="card-img-top">
                            </a>
                            <?php } ?>
                            <div class="card-body p-2">
                              <a href="<?= $rutaPropiedad ?>" class="d-block">

                                <h5
                                  class="card-title d-flex justify-content-between">
                                  <?= $propiedad['titulo'] ?>

                                  <span
                                    class="badge badge-info d-flex align-items-center">
                                    <p style="font-size: 12.5px;">
                                      <?= $propiedad['tipo'] ?>
                                    </p>
                                  </span>

                                </h5>
                              </a>

                              <?php if (!empty($propiedad['subtipo']['titulo'])) { ?>
                              <h5 class="card-title d-flex align-items-center">
                                <span class="text-danger mr-1">
                                  <i style="font-size: 10px;"
                                    class='bx bxs-circle mb-2'></i>
                                </span>
                                <?= $propiedad['subtipo']['titulo'] ?>
                              </h5>
                              <?php } ?>
                              <p class="direccionCard">
                                <?= $propiedad['direccion_localizacion'] ?>
                              </p>
                              <div class="py-4">
                                <div class="row">
                                  <?php
                                      $i = 0;
                                      foreach ($formbuilder as $value) {
                                        if (!empty($formbuilderjson[$value])) {
                                          $formbuilderActual = $formbuilderjson[$value];
                                      ?>
                                  <div
                                    class="w-33 text-center border-right mx-auto">
                                    <h5 style="font-size: 1px">
                                      <?php if ($i === 0) { ?>
                                        <img style="width: 20px;"
                                        src="<?= media() ?>/images/balance.svg"
                                        alt="Balance">
                                      <?php } else if ($i === 1) { ?>
                                      <img style="width: 20px;"
                                        src="<?= media() ?>/images/chart-up.svg"
                                        alt="Balance">
                                      <?php } ?>
                                      <?= $formbuilderActual[0] ?>
                                    </h5>

                                    <h5 class="font-weight-normal mt-1">
                                      <?= !empty($formbuilderActual[1]) ? $formbuilderActual[1] : 'N/A' ?>
                                    </h5>

                                  </div>
                                  <?php }
                                      } ?>
                                </div>
                              </div>
                            </div>
                            <div class="card-footer p-2">
                              <a href="#" class="text-info">
                                <i class='bx bx-user'></i>
                                <?= $propiedad['email_user'] ?>
                              </a>

                              <span class="text-dark">
                                <i class='bx bx-link'></i>
                                <?= timeago($propiedad['fecha_carga']) ?>
                              </span>
                            </div>
                          </div>
                          <?php }
                          } else { ?>
                          <h3 class="text-center">Este usuario todavía no ha
                            subido
                            propiedades</h3>
                          <?php } ?>

                        </div>
                      </div>
                      <div class="tab-pane fade" id="pills-reviews"
                        role="tabpanel" aria-labelledby="pills-reviews-tab">
                        <div class="container-fluid pt-4">
                          <?php if (empty($_SESSION['cliente-login'])) { ?>
                          <h3 class="text-center">Para poder comentar tienes que
                            haber
                            iniciado sesión</h3>
                          <p class="text-center">¡También puedes calificar al
                            agente!
                          </p>
                          <div class="d-flex justify-content-center">
                            <button class="btn btn-info mx-auto"
                              onclick="openModal('login-register-form')">Iniciar
                              Sesión <i class='bx bx-user'></i></button>
                          </div>
                          <?php } else { ?>
                          <div
                            class="d-flex justify-content-between align-items-center">
                            <span class="h4 mt-2">
                              ¡Comenta sobre este agente!
                            </span>
                            <?php if (!empty($_SESSION['idUser-cliente'])) {
                                if ($_SESSION['idUser-cliente'] != $agente['idpersona']) { ?>
                            <span>
                              <label class="control-label">Calificalo</label>
                              <input id="rating" name="rating"
                                value="<?= !empty($agente['promedio-calificador']) ? $agente['promedio-calificador'] : 0 ?>"
                                class="rating rating-loading"
                                data-show-clear="false"
                                data-show-caption="false">
                            </span>
                            <?php }
                              } ?>
                          </div>

                          <form id="frm-reviews" class="mt-2">
                            <div class="alert divAlertReviews"
                              style="display: none;">
                              <p class="text-danger">

                              </p>
                            </div>
                            <input type="hidden" name="idpersona"
                              value="<?= openssl_encrypt($agente['idpersona'], METHODENCRIPT, KEY); ?>">
                            <div class="form-group">
                              <textarea name="comentario" id="comentario"
                                class="form-control" cols="10"
                                rows="3"></textarea>
                            </div>
                            <div class="form-group">
                              <button class="btn btn-info btn-block"
                                type="submit">Comentar <i
                                  class='bx bxs-chat'></i></button>
                            </div>

                          </form>
                          <?php } ?>

                          <div class="mt-4" id="comentarios">
                            <?php if (!empty($agente['comentarios'])) { ?>
                            <?php foreach ($agente['comentarios'] as $comentario) {
                              ?>
                            <div class="tile">
                              <div class="tile-body">
                                <div class="row">
                                  <div
                                    class="col-sm-2 text-center mb-sm-0 mb-3">
                                    <img
                                      style="width: 75px; border-radius: 75px;"
                                      src="<?= media() ?>/images/uploads/<?= !empty($comentario['imagen']) ? $comentario['imagen'] : 'profile-agente.jpg' ?>"
                                      alt="Imagen de perfil de: <?= $comentario['usuario'] ?>">
                                  </div>
                                  <div class="col-sm-10">
                                    <div class="row">
                                      <div class="col-lg-6">
                                        <h4><?= $comentario['usuario'] ?></h4>

                                      </div>
                                      <div
                                        class="col-lg-6 text-lg-right text-start pr-0">
                                        <span>
                                          <i class='bx bx-link'></i>
                                          <?= timeago($comentario['datecreated']); ?>
                                          <?php if (!empty($_SESSION['idUser-cliente'])) {
                                                if ($_SESSION['idUser-cliente'] == $comentario['idreviewer']) { ?>
                                          <div class="btn-group">
                                            <button type="button"
                                              class="btn btn-sm ml-2 p-0 dropdown-toggle"
                                              data-toggle="dropdown"
                                              aria-haspopup="false"
                                              aria-expanded="false">
                                              <i
                                                class='bx bx-dots-vertical'></i>
                                            </button>
                                            <div class="dropdown-menu">
                                              <button
                                                onclick="editarComentario(event,'<?= openssl_encrypt($comentario['idreview'], METHODENCRIPT, KEY);  ?>',this)"
                                                class="dropdown-item"><i
                                                  class='bx bxs-pencil'></i>
                                                Editar
                                              </button>
                                              <button
                                                onclick="eliminarComentario(event,'<?= openssl_encrypt($comentario['idreview'], METHODENCRIPT, KEY); ?>',this)"
                                                class="dropdown-item btn-outline-danger"><i
                                                  class='bx bxs-trash'></i>
                                                Eliminar
                                              </button>
                                            </div>
                                          </div>
                                          <?php }
                                              } ?>
                                        </span>
                                      </div>
                                      <div class="col-md-12 pt-3">
                                        <?= $comentario['comentario'] ?>
                                      </div>
                                    </div>

                                  </div>
                                </div>

                              </div>
                            </div>
                            <?php }
                            } else { ?>
                            <?php if (!empty($_SESSION['cliente-login'])) { ?>
                            <div id="mensajenohaycomentarios">
                              <h3 class="text-center">Todavia no hay comentarios
                              </h3>
                              <p class="text-center">¡Sé el primero en comentar!
                              </p>
                            </div>
                            <?php } ?>

                            <?php } ?>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-md-4">
                <div style="position: relative;">
                  <h4>Contacto</h4>

                  <div class="my-3">
                    <img src="<?= media() ?>/images/uploads/<?= $imagen ?>"
                      alt="Foto de perfil de: <?= $fullname ?>">
                  </div>

                  <?php if (!empty($extrajson->address)) { ?>
                  <i class='bx bx-map'></i> <span
                    class="font-weight-normal"><?= $extrajson->address ?></span>
                  <?php } ?>

                  <?php if (!empty($agente['telefono'])) { ?>
                  <div class="pt-2 d-flex justify-content-between">
                    <h5>Teléfono:</h5> <span
                      class="font-weight-normal"><?= $agente['telefono'] ?></span>
                  </div>
                  <hr class="mt-0">
                  <?php } ?>

                  <?php if (!empty($extrajson->faxnumber)) { ?>
                  <div class="pt-2 d-flex justify-content-between">
                    <h5>Número de Fax:</h5> <span
                      class="font-weight-normal"><?= $extrajson->faxnumber ?></span>
                  </div>
                  <hr class="mt-0">
                  <?php } ?>


                  <div class="pt-2 d-flex justify-content-between">
                    <h5>Correo:</h5> <span
                      class="font-weight-normal"><?= $agente['email_user'] ?></span>
                  </div>
                  <hr class="mt-0">

                  <?php if (!empty($socialmedia->sitioweb)) { ?>

                  <div class="pt-2 d-flex justify-content-between">
                    <h5>Sitio web:</h5> <span class="font-weight-normal"> <a
                        target="_blank" href="<?= $socialmedia->sitioweb ?>">
                        <?= $socialmedia->sitioweb ?>
                      </a></span>
                  </div>

                  <hr class="mt-0">
                  <?php } ?>

                  <p class="text-lead text-center mb-0">Encuentra a
                    <?= $fullname ?>
                    en:
                  </p>

                  <div class="text-center mb-4">
                    <?php if (!empty($socialmedia->facebook)) { ?>
                    <a target="_blank" class="social facebook"
                      href="<?= $socialmedia->facebook ?>">
                      <i class='bx bxl-facebook-square'></i>
                    </a>
                    <?php } ?>
                    <?php if (!empty($socialmedia->instagram)) { ?>
                    <a target="_blank" class="social instagram"
                      href="<?= $socialmedia->instagram ?>">
                      <i class='bx bxl-instagram-alt'></i>
                    </a>
                    <?php } ?>

                    <?php if (!empty($socialmedia->vimeo)) { ?>
                    <a target="_blank" class="social vimeo"
                      href="<?= $socialmedia->vimeo ?>">
                      <i class='bx bxl-vimeo'></i>
                    </a>
                    <?php } ?>

                    <?php if (!empty($socialmedia->twitter)) { ?>
                    <a target="_blank" class="social twitter"
                      href="<?= $socialmedia->twitter ?>">
                      <i class='bx bxl-twitter'></i>
                    </a>
                    <?php } ?>

                    <?php if (!empty($socialmedia->linkedin)) { ?>
                    <a target="_blank" class="social linkedin"
                      href="<?= $socialmedia->linkedin ?>">
                      <i class='bx bxl-linkedin'></i>
                    </a>
                    <?php } ?>

                    <?php if (!empty($socialmedia->pinterest)) { ?>
                    <a target="_blank" class="social pinterest"
                      href="<?= $socialmedia->pinterest ?>">
                      <i class='bx bxl-pinterest'></i>
                    </a>
                    <?php } ?>

                    <?php if (!empty($socialmedia->sitioweb)) { ?>
                    <a target="_blank" class="social website"
                      href="<?= $socialmedia->sitioweb ?>">
                      <i class='bx bx-world'></i>
                    </a>
                    <?php } ?>
                    <?php if (!empty($socialmedia->googleplus)) { ?>
                    <a target="_blank" class="social googleplus"
                      href="<?= $socialmedia->googleplus ?>">
                      <i class='bx bxl-google-plus'></i>
                    </a>
                    <?php } ?>

                    <?php if (!empty($socialmedia->youtube)) { ?>
                    <a target="_blank" class="social youtube"
                      href="<?= $socialmedia->youtube ?>">
                      <i class='bx bxl-youtube'></i>
                    </a>
                    <?php } ?>

                    <?php if (!empty($socialmedia->skype)) { ?>
                    <a target="_blank" class="social skype"
                      href="<?= $socialmedia->skype ?>">
                      <i class='bx bxl-skype'></i>
                    </a>
                    <?php } ?>

                    <?php if (!empty($extrajson->whatsapp)) { ?>
                    <a target="_blank" class="social whatsapp"
                      href="<?= $extrajson->whatsapp ?>">
                      <i class='bx bxl-whatsapp-square'></i> </a>
                    <?php } ?>
                  </div>
                  <?= getFile('Template/propiedadesDestacadasSwiper') ?>


                  <div>
                    <form>
                      <div class="form-group">
                        <div class="input-group flex-nowrap">
                          <div class="input-group-prepend">
                            <span class="input-group-text"
                              id="addon-wrapping"><i
                                class='bx bx-search'></i></span>
                          </div>
                          <input type="text" class="form-control"
                            placeholder="Buscar agente">
                        </div>
                      </div>

                      <div class="form-group">

                        <select name="categoriasseelect" id="categoriasseelect"
                          class="form-control selectpicker">
                          <option class="d-none" value="">Todas la categorías
                          </option>
                        </select>
                      </div>

                      <div class="form-group">

                        <select name="ciudadesselect" id="ciudadesselect"
                          class="form-control selectpicker">
                          <option class="d-none" value="">Todas las ciudades
                          </option>
                        </select>
                      </div>

                      <div class="form-group">
                        <button class="btn btn-info btn-block shadow">
                          Buscar</button>

                      </div>
                    </form>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="recent-article-area py-4">
          <div class="container-lg text-center">
            <a class="btn btn-dark-home" href="<?= base_url() ?>/agentes">
              Buscar Agentes <i class='bx bx-star ml-1'></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<?php footerTienda($data); ?>


<script>
$("#rating").rating({
  emptyStar: '<i class="bx bx-star"></i>',
  filledStar: "<i class='bx bxs-star' ></i>",
});

$('#rating').on('rating:change', function(event, value, caption) {
  const idagente =
    '<?= openssl_encrypt($agente['idpersona'], METHODENCRIPT, KEY); ?>'
  const url = base_url + '/agentes/rating';
  let formData = new FormData();
  formData.append('idpersona', idagente);
  formData.append('value', value);

  $.post(url, {
    idpersona: idagente,
    value
  }).done(response => {
    const respuesta = JSON.parse(response);
    if (respuesta.status) {
      showToast("Calificado correctamente.", "success")
    } else {
      showToast(respuesta.msg, "error")
      if (respuesta.reload) {
        window.location.reload();
      }
    }

  })
});

$("#rating-agente").rating({
  hoverEnabled: false,
  size: 'sm',
  emptyStar: '<i class="bx bx-star"></i>',
  filledStar: "<i class='bx bxs-star' ></i>",
  disabled: true
});
const configSwipers = {
  slidesPerView: 1,
  spaceBetween: 40,
  speed: 750,
  pagination: {
    clickable: true,
  },
  /*         autoplay: {
              delay: 2000,
              disableOnInteraction: false,
          }, */
  pagination: {
    el: ".swiper-pagination1"
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
}
configSwipers.pagination.el = ".swiper-pagination1"
const swiper1 = new Swiper(".mySwiper1", configSwipers);
</script>