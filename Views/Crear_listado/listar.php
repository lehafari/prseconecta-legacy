<?php
headerAdmin($data);
$tipos = $data['tipos'];
$tags = $data['etiquetas'];
$packages = $data['packages'];
getModal('barraProgress', $data);
?>

<section class="home-section">
  <div class="home-content">
    <!-- SECCION no se  -->
    <h3>
      <!-- <i style="font-weight: 100;" class='bx bx-plus-circle'></i>
      Agregar -->
    </h3>

  </div>

  <form id="formListado" novalidate enctype="multipart/form-data">
    <section id="step1" class="mb-4" style="height: 100%;">
      <div class="app-content">
        <div class="row">
          <div class="col-md-12">
            <div class="tile bg-light mb-0 border-bottom-no-radius mb-3">
              <h5>Plan De Listado</h5>
            </div>
            <div class="row justify-content-center">

              <div class="col-lg-12 d-flex justify-content-center">
                <div class="row">

                  <?php foreach ($data['packages'] as $package) {
                    $packageInformation = json_decode($package['packageinformation']); ?>
                  <div class="col-lg-4 justify-content-center d-flex">
                    <label for="check-package-<?= $package['idpackage'] ?>"
                      class="cursor-pointer"
                      onclick="setPackageStep1(this,<?= $package['idpackage'] ?>)">

                      <div class="tile mx-2 card-package"
                        style="min-height: 60vh;">
                        <div class="tile-body">
                          <div class="tile-title mb-0">
                            <h4 class="text-center font-weight-bold">
                              <?= $package['title'] ?>
                              <span class="float-right checked">

                              </span>
                            </h4>



                            <p class="mt-0 text-center">
                              (<?= $package['packagepricelisting'] . SMONEY
                                    . '/' .
                                    $package['billingfrequency'] . ' '
                                    . $package['billingperiod'] ?>)</p>
                          </div>

                          <hr class="mt-0 mb-4">
                          <div class="listadoPaquetes"
                            orden="<?= $package['orden'] ?>">
                            <?php foreach ($packageInformation as $key => $value) { ?>
                            <div class="d-flex mb-3" data-id="<?= $key ?>">
                              <div class="pr-1">
                                <i class='bx bxs-badge-check text-success'></i>
                              </div>
                              <div class="font-weight-bold">
                                <?= $value->item ?>
                                <br>
                                <small>
                                  <?= $value->item_value ?>
                                </small>
                              </div>
                              <br>
                            </div>
                            <?php } ?>
                          </div>

                        </div>
                      </div>
                    </label>
                    <input type="radio" name="package" class="d-none"
                      value="<?= $package['idpackage'] ?>"
                      id="check-package-<?= $package['idpackage'] ?>">
                  </div>
                  <?php } ?>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="app-footer">
        <a href="<?= base_url() ?>/crear-listado" type="button"
          class="btn btn-outline-info btnBackStep1">
          <i class='bx bx-chevron-left'></i>
          Anterior
        </a>
        <button type="button" class="btn btn-info disabled btnProximoStep1">
          Próximo
          <img class="text-white"
            src="<?= media() ?>/images/chevron-right-solid.svg"
            style="width: 7.5px;" alt="arrow-right">
        </button>
      </div>
    </section>

    <section id="step2" style="display:none">
      <div class="app-content">
        <div class="row">
          <div class="col-md-12">
            <div class="tile bg-light mb-0 border-bottom-no-radius">
              <h5>Descripción</h5>
            </div>
            <div class="tile rounded-0">
              <div class="tile-body">
                <div class="form-group">
                  <label for="titulo">Título</label>
                  <input type="text" name="titulo" id="titulo"
                    class="form-control" placeholder="Ingrese el Titulo">
                </div>
                <div class="form-group">
                  <label for="contenido">Contenido</label>
                  <textarea name="contenido" id="contenido" cols="30" rows="10"
                    class="form-control">
                </textarea>
                </div>
                <div class="form-group row my-5">
                  <div class="col-lg-5">
                    <label for="tipo">Tipo</label>
                    <select title="Seleccione un tipo" data-size="5"
                      onchange="getSubtipos(this)" name="tipo" id="tipo"
                      class="form-control selectpicker">
                      <?php foreach ($tipos as $tipo) { ?>
                      <option value="<?= $tipo['idtipo'] ?>">
                        <?= $tipo['title'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-lg-5 mt-4 mt-lg-0">
                    <label for="etiqueta">Añadir una etiqueta (opcional)</label>
                    <select data-actions-box="true" multiple name="etiqueta[]"
                      id="etiqueta" class="form-control selectpicker">
                      <?php foreach ($tags as $tag) { ?>
                      <option value="<?= $tag['titulotag'] ?>">
                        <?= $tag['titulotag'] ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div style="display: none;" class="col-lg-5 mt-4">
                    <label for="subtipo">Subtipo</label>
                    <select title="Elija un subtipo..." name="subtipo"
                      id="subtipo" class="form-control selectpicker">

                    </select>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12 mb-5">
            <div class="tile bg-light mb-0 border-bottom-no-radius">
              <h5>Precio</h5>
            </div>
            <div class="tile rounded-0">
              <div class="tile-body">
                <div class="form-group">
                  <label for="precio">Precio</label>
                  <input onkeyup="controlDecimal(event)" type="text"
                    name="precio" id="precio" class="form-control"
                    placeholder="Ingrese el Precio">
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="app-footer">
        <button type="button" onclick="backStep1()"
          class="btn btn-outline-info btnBackStep1">
          <i class='bx bx-chevron-left'></i>

          Anterior
        </button>
        <button type="button" onclick="goStep3()"
          class="btn btn-info btnProximoStep2">
          Próximo
          <img class="text-white"
            src="<?= media() ?>/images/chevron-right-solid.svg"
            style="width: 7.5px;" alt="arrow-right">
        </button>
      </div>
    </section>

    <section id="step3" style="display:none">
      <div class="app-content">
        <div class="row">
          <div class="col-md-12">
            <div class="tile bg-light mb-0 border-bottom-no-radius">
              <h5>Detalles</h5>

            </div>
            <div class="tile rounded-0">
              <div class="tile-body">
                <div class="form-row" id="divDetalles">

                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="tile bg-light mb-0 border-bottom-no-radius">
              <h5>
                Detalles Adicionales
                <button type="button" class="btn btn-info">
                  Añadir Detalle
                  Adicional
                  <i class='bx bx-plus-medical'></i>
                </button>

              </h5>
            </div>
            <div class="tile rounded-0">
              <div class="tile-body">
                <div class="table-responsive">
                  <table class="table table-lg" id="tableDetallesAdicionales">
                    <thead class="thead-light">
                      <tr>
                        <th style="font-size: 16px;">Titulo</th>
                        <th style="font-size: 16px;">Valor (si/no)</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <input type="text" name="detallesAdicionales[1][0]"
                            placeholder="Ej. Ingrese el tipo de construcción"
                            class="form-control">
                        </td>
                        <td>
                          <input type="text" name="detallesAdicionales[1][1]"
                            placeholder="Ingrese el Valor" class="form-control">
                        </td>
                        <td>
                          <button type="button"
                            onclick="deleteDetalleAdicional(this)"
                            class="btn btn-outline-danger btn-block btn-sm">
                            <i class='bx bx-x' style="font-size: 25px;"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12 mb-4">
            <div class="tile bg-light mb-0 border-bottom-no-radius">
              <h5>Características</h5>
            </div>
            <div class="tile rounded-0">
              <div class="tile-body">
                <div class="row">
                  <?php
                  $caracteristicas = $data['characteristics'];
                  $count = count($caracteristicas);
                  for ($i = 0; $i < $count; $i++) {
                    $caracteristica = $caracteristicas[$i]; ?>
                  <div class="col-md-3 col-sm-6 col-12">
                    <div class="animated-checkbox">
                      <label
                        id="caracteristica-<?= $caracteristica['idcheck'] ?>">
                        <input type="checkbox"
                          name="caracteristicas[<?= $i ?>]<?= $caracteristica['idcheck'] ?>"
                          value="<?= $caracteristica['titulo'] ?>"><span
                          class="label-text">
                          <span
                            class="d-"><?= $caracteristica['titulo'] ?></span>
                        </span>
                      </label>
                    </div>
                  </div>
                  <?php } ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="app-footer">
        <button type="button" onclick="backStep2()"
          class="btn btn-outline-info btnBackStep2">
          <i class='bx bx-chevron-left'></i>

          Anterior
        </button>
        <button type="button" onclick="goStep4()"
          class="btn btn-info btnProximoStep3">
          Próximo
          <img class="text-white"
            src="<?= media() ?>/images/chevron-right-solid.svg"
            style="width: 7.5px;" alt="arrow-right">
        </button>
      </div>
    </section>

    <section id="step4" style="display: none;">
      <div class="app-content mb-5">
        <div class="row" id="divCheckedPaquetesCrearListado">
        </div>
      </div>
      <div class="app-footer">
        <button type="button" onclick="backStep3()"
          class="btn btn-outline-info btnBackStep3">
          <i class='bx bx-chevron-left'></i>
          Anterior
        </button>
        <button type="button" class="btn btn-info btnProximoStep4"
          onclick="goStep5()">
          Próximo
          <img class="text-white"
            src="<?= media() ?>/images/chevron-right-solid.svg"
            style="width: 7.5px;" alt="arrow-right">
        </button>
      </div>
    </section>

    <section id="step5" style="display: none;">
      <div class="app-content mb-5">
        <div class="row">
          <div class="col-md-12 mb-4">
            <div class="tile bg-light mb-0 border-bottom-no-radius">
              <h5>Localización</h5>
            </div>
            <div class="tile rounded-0">
              <div class="tile-body">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <label for="direccion-localizacion">Dirección</label>
                    <input type="text" name="direccion-localizacion"
                      id="direccion-localizacion" class="form-control">
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="codigopostal-localizacion">Código Postal</label>
                    <input type="text" name="codigopostal-localizacion"
                      id="codigopostal-localizacion" class="form-control">
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="areacapital-localizacion">Área de la
                      capital</label>
                    <select class="selectpicker form-control"
                      data-dropup-auto="false" data-size="5"
                      data-live-search="true"
                      title="Ingresa el área de la capital"
                      name="areacapital-localizacion"
                      id="areacapital-localizacion">
                      <?php foreach ($data['areascapitales'] as $areacapital) { ?>
                      <option value="<?= $areacapital['nombre'] ?>">
                        <?= $areacapital['nombre'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="municipal-localizacion">Municipal</label>
                    <select class="selectpicker form-control"
                      data-dropup-auto="false" data-size="5"
                      data-live-search="true" title="Ninguna"
                      name="municipal-localizacion" id="municipal-localizacion">
                      <?php foreach ($data['municipales'] as $municipal) { ?>
                      <option value="<?= $municipal['nombre'] ?>">
                        <?= $municipal['nombre'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12 mb-4">
            <div class="tile bg-light mb-0 border-bottom-no-radius">
              <h5>Mapa</h5>
            </div>
            <div class="tile rounded-0">
              <div class="tile-body">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <p>Arrastra y Suelta la chincheta en el mapa para encontrar
                      la
                      ubicación exacta
                    </p>
                    <div id="map"></div>

                    <button type="button"
                      class="btn btn-info btn-block mt-4">Coloque
                      el pin en la
                      dirección de arriba</button>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="latitud-mapa">Latitud</label>
                      <input type="text" name="latitud-mapa" id="latitud-mapa"
                        class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="longitud-mapa">Longitud</label>
                      <input type="text" name="longitud-mapa" id="longitud-mapa"
                        class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="vistacalle-mapa">Vista de calle</label>
                      <select name="vistacalle-mapa" id="vistacalle-mapa"
                        class="selectpicker form-control">
                        <option value="1">Mostrar</option>
                        <option value="0">Esconder</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="app-footer">
        <button type="button" onclick="backStep4()"
          class="btn btn-outline-info btnBackStep3">
          <i class='bx bx-chevron-left'></i>
          Anterior
        </button>
        <button type="submit" class="btn btn-info btnProximoStep4">
          Publicar Listado
        </button>
      </div>
    </section>
  </form>
</section>

<?php footerAdmin($data); ?>

<script
  src="https://maps.googleapis.com/maps/api/js?key=<?= KEYGOOGLEMAPS ?>&libraries=places&callback=iniciarMap">
</script>