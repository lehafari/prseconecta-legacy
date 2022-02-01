<?php

headerAdmin($data);
$tipos = $data['tipos'];
$tags = !empty($data['etiquetas'])  ? $data['etiquetas'] : [];
$propiedad = $data['propiedad'];
$propiedadEtiquetas = !empty(json_decode($propiedad['etiqueta'], true)) ?  json_decode($propiedad['etiqueta'], true) : [];
getModal('barraProgress', $data);
?>

<style>
.nav-pills .nav-link.active,
.nav-pills .show>.nav-link {
  background-color: #59b3e8;
}
</style>
<section class="home-section">
  <div class="home-content d-block" style="margin: 50px 30px 0px 30px;">
    <h5>
      <ul class="nav nav-pills" id="pills-tab" role="tablist">
        <?php
        $arrHeaderOptions = [
          1 => ['titulo' => 'Descripción & Precio'],
          2 => ['titulo' => 'Detalles'],
          3 => ['titulo' => 'Medio'],
          4 => ['titulo' => 'Localización']
        ];
        $arrHeaderOptionsCount = count($arrHeaderOptions);
        for ($i = 1; $i < ($arrHeaderOptionsCount + 1); $i++) { ?>
        <li class="nav-item border-0" role="presentation">
          <a class="nav-link <?= $i === 1 ? 'active' : '' ?>"
            id="pills-home-tab" data-toggle="pill" href="#step<?= $i ?>"
            role="tab" aria-controls="pills-home"
            aria-selected="true"><span><span
                class="numero-redondo mr-2"><?= $i ?></span>
              <?= $arrHeaderOptions[$i]['titulo'] ?></span>
          </a>
        </li>
        </li>
        <?php } ?>
      </ul>
    </h5>

  </div>

  <form id="formListado" novalidate enctype="multipart/form-data">
    <input type="hidden" name="idpropiedad"
      value="<?= openssl_encrypt($propiedad['idpropiedad'], METHODENCRIPT, KEY) ?>"
      id="idpropiedad">
    <div class="tab-content" id="nav-tabContent">

      <section id="step1" class="tab-pane fade show active" role="tabpanel">
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
                      class="form-control" value="<?= $propiedad['titulo'] ?>"
                      placeholder="Ingrese el Titulo">
                  </div>
                  <div class="form-group">
                    <label for="contenido">Contenido</label>
                    <textarea name="contenido" id="contenido" cols="30"
                      rows="10"
                      class="form-control"><?= $propiedad['contenido'] ?></textarea>
                  </div>
                  <div class="form-group row my-5">
                    <div class="col-lg-5">
                      <label for="tipo">Tipo</label>
                      <select title="Seleccione un tipo" data-size="5"
                        onchange="getSubtipos(this)" name="tipo" id="tipo"
                        class="form-control selectpicker">
                        <?php foreach ($tipos as $tipo) { ?>
                        <option
                          <?= $propiedad['tipoid'] == $tipo['idtipo'] ? 'selected' : null ?>
                          value="<?= $tipo['idtipo'] ?>">
                          <?= $tipo['title'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <?php if (!empty($tags)) { ?>
                    <div class="col-lg-5 mt-4 mt-lg-0">
                      <label for="etiqueta">Añadir una etiqueta
                        (opcional)</label>
                      <select data-actions-box="true" multiple name="etiqueta[]"
                        id="etiqueta" class="form-control selectpicker">
                        <?php foreach ($tags as $tag) { ?>
                        <option
                          <?= in_array($tag['titulotag'], $propiedadEtiquetas) ? 'selected' : null ?>
                          value="<?= $tag['titulotag'] ?>">
                          <?= $tag['titulotag'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <?php } ?>


                    <?php if ($propiedad['subtipoid']) { ?>
                    <div class="col-lg-5 mt-4">
                      <label for="subtipo">Subtipo</label>
                      <select title="Elija un subtipo..." name="subtipo"
                        id="subtipo" class="form-control selectpicker">
                        <?php foreach ($propiedad['valoresTipoSubtipos'] as $subtipo) { ?>
                        <option
                          <?= $propiedad['subtipoid'] == $subtipo['idsubtipo'] ? 'selected' : '' ?>
                          value="<?= $subtipo['idsubtipo'] ?>">
                          <?= $subtipo['titulo'] ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <?php } ?>

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
                    <input onkeyup="controlDecimal(event)"
                      value="<?= formatMoney($propiedad['precio']) ?>"
                      type="text" name="precio" id="precio" class="form-control"
                      placeholder="Ingrese el Precio">
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="app-footer">
          <a href="<?= base_url() ?>/mis-propiedades"
            class="btn btn-outline-info btnBackStep1">
            <i class='bx bx-chevron-left'></i>

            Anterior
          </a>
          <button type="button" onclick="goStep2()"
            class="btn btn-info btnProximoStep2">
            Próximo
            <img class="text-white"
              src="<?= media() ?>/images/chevron-right-solid.svg"
              style="width: 7.5px;" alt="arrow-right">
          </button>
        </div>
      </section>

      <section id="step2" class="tab-pane fade show" role="tabpanel">
        <div class="app-content">
          <div class="row">
            <div class="col-md-12">
              <div class="tile bg-light mb-0 border-bottom-no-radius">
                <h5>Detalles</h5>

              </div>
              <div class="tile rounded-0">
                <div class="tile-body">
                  <div class="" id="divDetalles">
                    <div class="form-row" id="elementosFormBuilder" orden="">
                      <?php
                      $formbuilderjson = json_decode($propiedad['formbuilderjson'], true);
                      $formbuilder = json_decode($propiedad['formbuilderjson'], true);
                      $formulario = getFormBuilder($propiedad['subtipoid']);
                      echo getFile('Template/plantillas/PlantillaFormulariosCrearListados', [
                        'formbuilder' => $formulario,
                        'orden' => $propiedad['subtipo']['ordern_enabled'],
                        'data' => $formbuilderjson
                      ]);
                      ?>
                    </div>

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
                        <?php
                        $contador = 1;
                        if (!empty($propiedad['detallesadicionalesjson'])) {
                          $detallesAdicionales =  json_decode($propiedad['detallesadicionalesjson'], true);
                          if (!empty($detallesAdicionales)) {
                            foreach ($detallesAdicionales as $value) {
                              $titulo = !empty($value[0]) ? $value[0] : '';
                              $valor = !empty($value[1]) ? $value[1] : '';
                        ?>
                        <tr>
                          <td>
                            <input type="text"
                              name="detallesAdicionales[<?= $contador ?>][0]"
                              placeholder="Ej. Ingrese el tipo de construcción"
                              class="form-control" value="<?= $titulo ?>">
                          </td>
                          <td>
                            <input type="text"
                              name="detallesAdicionales[<?= $contador ?>][1]"
                              placeholder="Ingresa el Valor"
                              value="<?= $valor ?>" class="form-control">
                          </td>
                          <td>
                            <button type="button"
                              onclick="deleteDetalleAdicional(this)"
                              class="btn btn-outline-danger btn-block btn-sm">
                              <i class='bx bx-x' style="font-size: 25px;"></i>
                            </button>
                          </td>
                        </tr>
                        <?php $contador++;
                            }
                          }
                        }
                        ?>
                        <script>
                        let contadorDetallesAdicionales = <?= $contador ?>;
                        </script>
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
                    $caracteristicasjson = [];
                    if (!empty($propiedad['caracteristicasjson'])) {
                      $caracteristicasjson =  json_decode($propiedad['caracteristicasjson'], true);
                    }

                    function checkCaracacterstica($caracteristicas, $value2)
                    {
                      foreach ($caracteristicas as $caracteristica) {
                        if ($caracteristica === $value2) {
                          return true;
                        }
                      }

                      return false;
                    }
                    $caracteristicas = $data['characteristics'];
                    $count = count($caracteristicas);
                    for ($i = 0; $i < $count; $i++) {
                      $caracteristica = $caracteristicas[$i]; ?>
                    <div class="col-md-3 col-sm-6 col-12">
                      <div class="animated-checkbox">
                        <label
                          id="caracteristica-<?= $caracteristica['idcheck'] ?>">
                          <input type="checkbox"
                            <?= checkCaracacterstica($caracteristicasjson, $caracteristica['titulo']) ? 'checked' : null ?>
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
          <button type="button" onclick="backStep1()"
            class="btn btn-outline-info btnBackStep2">
            <i class='bx bx-chevron-left'></i>

            Anterior
          </button>
          <button type="button" onclick="goStep3()"
            class="btn btn-info btnProximoStep3">
            Próximo
            <img class="text-white"
              src="<?= media() ?>/images/chevron-right-solid.svg"
              style="width: 7.5px;" alt="arrow-right">
          </button>
        </div>
      </section>

      <section id="step3" class="tab-pane fade show" role="tabpanel">
        <div class="app-content mb-5">
          <div class="row" id="divCheckedPaquetesCrearListado">
            <?= $data['htmlPaquete'] ?>
          </div>
        </div>
        <div class="app-footer">
          <button type="button" onclick="backStep2()"
            class="btn btn-outline-info btnBackStep3">
            <i class='bx bx-chevron-left'></i>
            Anterior
          </button>
          <button type="button" class="btn btn-info btnProximoStep4"
            onclick="goStep4()">
            Próximo
            <img class="text-white"
              src="<?= media() ?>/images/chevron-right-solid.svg"
              style="width: 7.5px;" alt="arrow-right">
          </button>
        </div>
      </section>

      <section id="step4" class="tab-pane fade show" role="tabpanel">
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
                      <input type="text"
                        value="<?= $propiedad['direccion_localizacion'] ?>"
                        name="direccion-localizacion"
                        id="direccion-localizacion" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="codigopostal-localizacion">Código
                        Postal</label>
                      <input type="text"
                        value="<?= $propiedad['codigopostal_localizacion'] ?>"
                        name="codigopostal-localizacion"
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
                        <option
                          <?= $propiedad['areacapital_localizacion'] == $areacapital['nombre'] ? 'selected' : null ?>
                          value="<?= $areacapital['nombre'] ?>">
                          <?= $areacapital['nombre'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="municipal-localizacion">Municipal</label>
                      <select class="selectpicker form-control"
                        data-dropup-auto="false" data-size="5"
                        data-live-search="true" title="Ninguna"
                        name="municipal-localizacion"
                        id="municipal-localizacion">
                        <?php foreach ($data['municipales'] as $municipal) { ?>
                        <option
                          <?= $propiedad['municipal_localizacion'] == $municipal['nombre'] ? 'selected' : '' ?>
                          value="<?= $municipal['nombre'] ?>">
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
                      <p>Arrastra y Suelta la chincheta en el mapa para
                        encontrar
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
                        <input
                          value="<?= !empty($propiedad['latitud_mapa']) ? $propiedad['latitud_mapa'] : '' ?>"
                          type="text" name="latitud-mapa" id="latitud-mapa"
                          class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="longitud-mapa">Longitud</label>
                        <input
                          value="<?= !empty($propiedad['longitud_mapa']) ? $propiedad['longitud_mapa'] : '' ?>"
                          type="text" name="longitud-mapa" id="longitud-mapa"
                          class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="vistacalle-mapa">Vista de calle</label>
                        <select name="vistacalle-mapa" id="vistacalle-mapa"
                          class="selectpicker form-control">
                          <option
                            <?= $propiedad['vistacalle_mapa'] == 1 ? 'selected' : '' ?>
                            value="1">Mostrar</option>
                          <option
                            <?= $propiedad['vistacalle_mapa'] == 0 ? 'selected' : '' ?>
                            value="0">Esconder</option>
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
          <button type="button" onclick="backStep3()"
            class="btn btn-outline-info btnBackStep3">
            <i class='bx bx-chevron-left'></i>
            Anterior
          </button>
          <button type="submit" class="btn btn-info btnProximoStep4">
            Editar Listado
          </button>
        </div>
      </section>
    </div>

  </form>
</section>

<script>
let coord = {
  lat: isNaN(<?= $propiedad['latitud_mapa'] ?>) ? 18.200178 : parseFloat(
    <?= $propiedad['latitud_mapa'] ?>),
  lng: isNaN(parseFloat(<?= $propiedad['longitud_mapa'] ?>)) ? -66.664513 :
    parseFloat(
      <?= $propiedad['longitud_mapa'] ?>)
};
</script>
<?php footerAdmin($data); ?>

<script
  src="https://maps.googleapis.com/maps/api/js?key=<?= KEYGOOGLEMAPS ?>&libraries=places&callback=iniciarMap">
</script>