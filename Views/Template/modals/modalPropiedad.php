<?php
$propiedad = $data['propiedad'];
$formbuilderjson = json_decode($propiedad['formbuilderjson'], true);
?>
<div class="modal fade" id="modalPropiedad"
  lat="<?= floatval($propiedad['latitud_mapa']) ?  $propiedad['latitud_mapa'] : 18.200178 ?>"
  long="<?= floatval($propiedad['longitud_mapa']) ? $propiedad['longitud_mapa'] : -66.664513 ?>">
  <div  class="modal-dialog modal-xl mb-0 mt-0">
    <div class="modal-content " >
      <div class="modal-body p-0">
        <div class="form-row">
          <div class="col-lg-8">

            <?php if (!empty($propiedad['imagenes'])) { ?>
            <?php if (count($propiedad['imagenes']) === 1) { ?>
            <div class="contenedor-imagenes-masonry"
              style="overflow-y: scroll; ">
              <div class="d-flex align-items-center">
                <img style="width: 100%;" class="img-fluid"
                  src="<?= media() ?>/images/uploads/<?= $propiedad['imagenes'][0]['rutaimagen'] ?>"
                  alt="Imagen propiedad <?= $propiedad['titulo'] ?>">
              </div>
            </div>

            <?php } else { ?>
            <ul class="contenedor-imagenes-masonry">
              <?php foreach ($propiedad['imagenes'] as $key => $imagen) { ?>
              <li class="elemento <?= $key === 0 ? 'prominent' : '' ?>">
                <img
                  src="<?= media() ?>/images/uploads/<?= $imagen['rutaimagen'] ?>"
                  alt="Imagen propiedad <?= $propiedad['titulo'] ?>">
              </li>
              <?php } ?>
            </ul>
            <?php  }
            } ?>
          </div>
          <div class=" col-lg-4 py-2 px-4 border-left">
            <div class="modal-header d-block">
              <div class="d-flex justify-content-between">
                <img style="width: 100px;"
                  src="<?= media() ?>/images/PRSC_Comercial.png" alt="">
                <div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm ml-2 p-0">
                      <i style="font-size: 22px;" class='bx bx-heart'></i>
                    </button>
                  </div>
                  <div class=" btn-group dropleft">
                    <button type="button"
                      class="btn btn-sm ml-2 p-0 dropdown-toggle"
                      data-toggle="dropdown" aria-haspopup="false"
                      aria-expanded="false">
                      <i style="font-size: 22px;" class='bx bxs-share-alt'></i>
                    </button>
                    <div class="dropdown-menu">
                      <button class="dropdown-item">
                        <i class='bx bx-mail-send'></i>
                        Enviar un correo
                      </button>
                      <button class="dropdown-item btn-outline-danger">
                        <i class='bx bxl-facebook'></i>
                        Compartir en facebook
                      </button>
                      <button class="dropdown-item btn-outline-danger">
                        <i class='bx bxl-twitter'></i>
                        Compartir en Twitter
                      </button>

                      <button class="dropdown-item btn-outline-danger">
                        <i class='bx bxl-instagram'></i>
                        Compartir en Instagram
                      </button>

                      <button class="dropdown-item btn-outline-danger">
                        <i class='bx bxl-whatsapp'></i>
                        Compartir en Whatssap
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<!-- SECCION QUE DEBO MOVER: INICIO -->

<div class="d-flex justify-content-between my-3 ">
                  <h3><?= $propiedad['titulo'] ?></h3>
                  <div>
                    <span class="badge badge-info d-flex align-items-center">
                      <p style="font-size: 15px;">
                        <?= $propiedad['tipo'] ?>
                      </p>
                    </span>
                  </div>
                </div>
                <?php if (!empty($propiedad['subtipo']['titulo'])) { ?>
                <h5 class="card-title d-flex align-items-center mt-1">
                  <span class="mr-1">
                    <i style="font-size: 10px;"
                      class='bx bxs-circle text-danger mb-2'></i>
                  </span>
                  <?= $propiedad['subtipo']['titulo'] ?>
                </h5>
                <?php } ?>

                <div
                  class="d-flex justify-content-between <?= !empty($propiedad['direccion_localizacion']) ? 'pb-4' : '' ?>">
                  <h4><?= SMONEY . formatMoney($propiedad['precio']) ?></h4>
                  <?php $formbuilder = getFormFieldsByIds($propiedad['subtipo']['top_right_overview_field']); ?>
                  <div class="d-flex">
                    <?php $i = 0;
                    $formbuilderCount = count($formbuilder);
                    foreach ($formbuilder as $form) {
                    ?>

                    <h5 class="mx-2"><?= $form['field_name'] ?>: <span class="h6">

                        <?php foreach ($formbuilderjson as $idform => $formUsuario) { ?>

                        <?php if ($form['idform'] == $idform) {
                              if (!empty($formUsuario[1])) {
                                echo $formUsuario[1];
                              } else {
                                echo 'N/A';
                              }
                            ?>

                        <?php }
                          } ?>
                      </span>
                    </h5>

                    <?php
                      echo $formbuilderCount - 1 === $i ? '' : '|';
                      $i++;
                    } ?>

                  </div>
                </div>

                <?php if (!empty($propiedad['direccion_localizacion'])) { ?>
                <p>
                  <img style="width: 20px;"
                    src="<?= media() ?>/images/puerto-rico.svg" alt="puerto-rico">
                  <?= $propiedad['direccion_localizacion'] ?>
                </p>
                <?php } ?>

                <div class="py-2">
                  <?php $formbuilder = getFormFieldsByIds($propiedad['subtipo']['top_overview_field']); ?>
                  <div class="row">
                    <?php foreach ($formbuilder as $form) { ?>

                    <div class="w-33 text-center border-right">
                      <h5>
                        <?= $form['field_name'] ?>
                      </h5>

                      <h5 class="font-weight-normal mt-1">
                        <?php
                          foreach ($formbuilderjson as $idform => $formUsuario) {
                            if ($form['idform'] == $idform) {
                              if (!empty($formUsuario[1])) {
                                echo $formUsuario[1];
                              } else {
                                echo 'N/A';
                              }
                            }
                          } ?>
                      </h5>
                    </div>

                    <?php } ?>
                  </div>
                </div>


<!-- SECCION QUE DEBO MOVER: FIN -->

            <div class="d-flex modal-box-nav ">
              <span class="modal-box-nav-icon left" style="margin-left:-2px;">
                <i class='bx bx-chevron-left '></i>
              </span>
              <div>
                <a href="#general" data-id-modal-box-nav="1"
                  class="active" style="font-size: 12px;">General</a>
              </div>
              <div>
                <a data-id-modal-box-nav="2" href="#detalles">Detalles</a>
              </div>

              <div>
                <a data-id-modal-box-nav="3"
                  href="#caracteristicas"style="font-size: 12px;">Caracteristicas</a>
              </div>

              <div>
                <a data-id-modal-box-nav="4" href="#contacto"style="font-size: 12px;">Contacto</a>
              </div>
              <span class="modal-box-nav-icon right">
                <i class='bx bx-chevron-right'></i>
              </span>
            </div>

            <div id="detallesPropiedad"
              style="overflow-y: scroll; height: 425px">
              <!-- En este punto se encuentra la seccion general -->
              <section id="general" class="my-3 mr-3">
                <!-- Inicio de la nueva seccion -->

               

                <!-- Fin de la nueva seccion -->
                <div class="mapaPropiedad"></div>
                <div class="d-flex justify-content-end align-items-center mt-4">
                  <div>
                    <span>
                      <i style="color: #08c0ff; font-size: 20px; vertical-align: middle;"
                        class='bx bxs-show'></i>
                      Vistos: <?= $propiedad['vistas'] + 1 ?>
                    </span>
                    <span style="color: #ccc;">
                      |
                    </span>
                    <span>
                      <i style="color: #08c0ff; font-size: 20px; vertical-align: middle;"
                        class='bx bxs-calendar'></i> Publicado hace 4 meses
                    </span>
                  </div>
                </div>
              </section>
              <section id="detalles" class="mr-3">
                <div class="modal-header p-1">
                  <h3 style="font-size: 16px">
                    <i class='bx bxs-info-circle'></i>
                    Detalles
                  </h3>
                </div>

                <?php
                if (!empty($formbuilderjson) && !empty($propiedad['subtipo']['top_detail_field'])) { ?>
                <div class="row pt-3 pb-5">
                  <?php $formbuilder = getFormFieldsByIds($propiedad['subtipo']['top_detail_field']);
                    foreach ($formbuilder as $form) { ?>
                  <div class="col-md-6 ">
                    <div class="d-flex">
                      <div class="p-1"><i style="font-size:10px;"
                          class="bx bxs-circle text-info"></i> </div>
                          <!--CAMBIO DE PAGINA 3 ATENTO -->
                      <div class="flex-grow-1 p-1 sp-box-item ">
                        <h5 class="m-0 text-black mb-1 font-weight-semi-bold">
                          <?= $form['field_name'] ?>
                          <br>
                          <?php foreach ($formbuilderjson as $idform => $formUsuario) { ?>

                          <?php if ($form['idform'] == $idform) {
                                  if (!empty($formUsuario[1])) {
                                    echo $formUsuario[1];
                                  } else {
                                    echo '<span style="font-weight: 500;">N/A</span>';
                                  }
                                ?>

                          <?php } ?>

                          <?php } ?>
                        </h5>
                      </div>
                    </div>
                  </div>
                  <?php  }
                    ?>
                </div>
                <?php } ?>



              </section>
              <section id="caracteristicas" class="mr-3">
                <div class="modal-header p-1">
                  <h3 style="font-size: 17px">
                    <i class='bx bx-list-ol'></i>
                    Caracteristicas
                  </h3>
                </div>
                <?php $caracteristicas = json_decode($propiedad['caracteristicasjson'], true);
                if (!empty($caracteristicas)) { ?>
                <div class="pt-3 pb-5">
                  <div class="row">
                    <?php foreach ($caracteristicas as $c) { ?>
                    <div class="col-md-6">
                      <div class="d-flex">
                        <div class="p-1"><i style="font-size:10px;"
                            class="bx bxs-circle text-info"></i> </div>
                        <div class="flex-grow-1 p-1 sp-box-item">
                          <p class="m-0 text-black mb-1 font-weight-semi-bold">
                            <?= $c ?>
                          </p>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
                <?php } ?>

              </section>
              <section id="contacto" class="mr-3">
                <div class="modal-header p-1">
                  <h3 style="font-size: 17px">
                    <i class='bx bx-mail-send'></i>
                    Contacto
                  </h3>
                </div>

                <?php if (!empty($propiedad['agente'])) {
                  $agente = $propiedad['agente'];
                  $imagen = !empty($agente['imagen']) ? $agente['imagen'] : 'profile-agente.jpg';
                ?>
                <div class="my-4 d-flex">

                  <!--Imagen del cliente en Post de propiedad -->

                  <div class="agent-image" style="box-shadow: none; border: 0.5px solid; ">
                    <span class="rounded">
                      <img src="<?= media() ?>/images/uploads/<?= $imagen ?>"
                        alt="Imagen de perfil de: <?= $agente['usuario'] ?>">
                    </span>
                  </div>
                  <ul>
                    <li>
                      <i class='bx bx-user'></i> <?= $agente['email_user'] ?>
                    </li>
                    <li>
                      <i class='bx bx-phone'></i> <?= $agente['telefono'] ?>
                    </li>
                    <?php if ($agente['rolid'] == RAGENTES) { ?>
                    <li>
                      <a href="<?= base_url() ?>" class="text-info">Ver
                        listados</a>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
                <form id="formMensajePerfil">
                  <input type="hidden" name="idagente"
                    value="<?= $agente['idpersona'] ?>">
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
                  <div class="form-group d-flex justify-content-center">
                    <button class="btn-info btn"><i class='bx bxl-telegram'></i>
                      Enviar Mensaje</button>
                  </div>
                </form>
                <?php } ?>


              </section>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>