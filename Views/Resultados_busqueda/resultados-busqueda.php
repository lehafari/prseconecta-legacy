<?php
headerTienda($data);
$propiedadesGratuitas = $data['propiedades'][0];
$propiedadesDestacadas = $data['propiedades'][1];
$propiedadesSuperDestacadas = $data['propiedades'][2];
if (!empty($data['propiedad'])) {
  getModal('modalPropiedad', $data);
}
function htmlPropiedad1($propiedad)
{
  $rutaPropiedad = base_url() . '/resultados-busqueda?listing_id=' . $propiedad['idpropiedad'];
  $formbuilderjson = json_decode($propiedad['formbuilderjson'], true);
  $formbuilder = explode(',', $propiedad['subtipo']['top_overview_field']);
  ob_start();
?>
<style>
#map {
  height: calc(100vh - 110px);
}

.mapaPropiedad {
  height: 250px;
}

.dropdown-item {
  cursor: pointer;
}

.dropdown-item:hover {
  color: #097fff;
}
</style>
<div class="col">
  <!-- Esta funcion Imprime todas las propiedades -->
  <div class="ad-content-property card"
    onmouseover="handleHoverProperty(<?= $propiedad['idpropiedad'] ?>)">
    <?php if (!empty($propiedad['imagenes'])) { ?>
    <a class="img-sombra" href="<?= $rutaPropiedad ?>">
      <div class="overlay-imagen">
        <div class="position-absolute h-100 d-flex align-items-end">
          <h5 class="mt-auto text-light p-4">
            <?= SMONEY . formatMoney($propiedad['precio']) ?></h5>
        </div>
      </div>
      <img
        src="<?= media() ?>/images/uploads/<?= $propiedad['imagenes'][0]['rutaimagen'] ?>"
        class="card-img-top" alt="Imagen de: <?= $propiedad['titulo'] ?>">
    </a>
    <?php } ?>
    <div class="card-body p-2">
      <h5 class="card-title d-flex justify-content-between">
        <span style="font-size: 14px;">
          <?= $propiedad['titulo'] ?>
        </span>
        <a href="<?= $rutaPropiedad ?>">

          <span class="badge badge-info d-flex align-items-center">
            <p style="font-size: 12.5px;">
              <?= $propiedad['tipo'] ?></p>
          </span>
        </a>

      </h5>
      <?php if (!empty($propiedad['subtipo']['titulo'])) { ?>
      <h5 class="card-title d-flex align-items-center">
        <span
          class="<?= empty($propiedad['subtipo']['titulo']) ? 'text-light' : 'text-danger' ?> mr-1">
          <i style="font-size: 10px;" class='bx bxs-circle mb-2'></i>
        </span>
        <?= $propiedad['subtipo']['titulo'] ?>
      </h5>
      <?php } ?>
      <?php if (!empty($propiedad['direccion_localizacion'])) {  ?>
        <!--DIRECCION DE RESULTADO DE BUSQUEDA -->
      <p class="direccionCard">
        <img style="width: 3%;" src="<?= media() ?>/images/balance.svg" alt="Balance">
        <?= $propiedad['direccion_localizacion'] ?>
      </p>
      <?php } ?>
      <div class="py-4">
        <div class="row">
          <?php
            $i = 0;
            foreach ($formbuilder as $value) {
              if (!empty($formbuilderjson[$value])) {
                $formbuilderActual = $formbuilderjson[$value];
            ?>

          <div class="w-33 text-center border-right mx-auto">
            <h5 style="font-size: 13px">
            
              <?= $formbuilderActual[0] ?>
            </h5>

            <h5 class="font-weight-normal mt-1">
              <?= empty($formbuilderActual[1]) ? 'N/A' : $formbuilderActual[1] ?>
            </h5>
          </div>
          <?php $i++;
              }
            } ?>
        </div>
      </div>
    </div>
    <div class="card-footer p-2">
      <a style="font-size: 12px;"
        href="<?= base_url() ?>/agentes/agente/<?= $propiedad['rutausuario'] ?>"
        class="text-info">
        <div class="d-flex align-items-center">
          <i class='bx bx-user mr-1'></i>
          <?= $propiedad['email_user'] ?>
        </div>

      </a>

      <span class="text-dark">
        <i class='bx bx-link'></i>
        <?= timeago($propiedad['fecha_carga']) ?>
      </span>
    </div>
  </div>
</div>

<?php return ob_get_clean();
}?>


<!-- INICIO FUNCION DUPLICADA  -->
<?php
function htmlPropiedad($propiedad)
{

  $rutaPropiedad = base_url() . '/resultados-busqueda?listing_id=' . $propiedad['idpropiedad'];
  $formbuilderjson = json_decode($propiedad['formbuilderjson'], true);
  $formbuilder = explode(',', $propiedad['subtipo']['top_overview_field']);
  ob_start();
?>
<style>
#map {
  height: calc(100vh - 110px);
}

.mapaPropiedad {
  height: 250px;
}

.dropdown-item {
  cursor: pointer;
}

.dropdown-item:hover {
  color: #097fff;
}
</style>
<div class="col-xl-6">
  <!-- Esta funcion Imprime todas las propiedades -->
  <div class="ad-content-property card"
    onmouseover="handleHoverProperty(<?= $propiedad['idpropiedad'] ?>)">
    <?php if (!empty($propiedad['imagenes'])) { ?>
    <a class="img-sombra" href="<?= $rutaPropiedad ?>">
      <div class="overlay-imagen">
        <div class="position-absolute h-100 d-flex align-items-end">
          <h5 class="mt-auto text-light p-4">
            <?= SMONEY . formatMoney($propiedad['precio']) ?></h5>
        </div>
      </div>
      <img
        src="<?= media() ?>/images/uploads/<?= $propiedad['imagenes'][0]['rutaimagen'] ?>"
        class="card-img-top" alt="Imagen de: <?= $propiedad['titulo'] ?>">
    </a>
    <?php } ?>
    <div class="card-body p-2">
      <h5 class="card-title d-flex justify-content-between">
        <span style="font-size: 14px;">
          <?= $propiedad['titulo'] ?>
        </span>
        <a href="<?= $rutaPropiedad ?>">

          <span class="badge badge-info d-flex align-items-center">
            <p style="font-size: 12.5px;">
              <?= $propiedad['tipo'] ?></p>
          </span>
        </a>

      </h5>
      <?php if (!empty($propiedad['subtipo']['titulo'])) { ?>
      <h5 class="card-title d-flex align-items-center">
        <span
          class="<?= empty($propiedad['subtipo']['titulo']) ? 'text-light' : 'text-danger' ?> mr-1">
          <i style="font-size: 10px;" class='bx bxs-circle mb-2'></i>
        </span>
        <?= $propiedad['subtipo']['titulo'] ?>
      </h5>
      <?php } ?>
      <?php if (!empty($propiedad['direccion_localizacion'])) {  ?>
        <!--DIRECCION DE RESULTADO DE BUSQUEDA -->
      <p class="direccionCard">
        <img style="width: 3%;" src="<?= media() ?>/images/balance.svg" alt="Balance">
        <?= $propiedad['direccion_localizacion'] ?>
      </p>
      <?php } ?>
      <div class="py-4">
        <div class="row">
          <?php
            $i = 0;
            foreach ($formbuilder as $value) {
              if (!empty($formbuilderjson[$value])) {
                $formbuilderActual = $formbuilderjson[$value];
            ?>

          <div class="w-33 text-center border-right mx-auto">
            <h5 style="font-size: 13px">
            
              <?= $formbuilderActual[0] ?>
            </h5>

            <h5 class="font-weight-normal mt-1">
              <?= empty($formbuilderActual[1]) ? 'N/A' : $formbuilderActual[1] ?>
            </h5>
          </div>
          <?php $i++;
              }
            } ?>
        </div>
      </div>
    </div>
    <div class="card-footer p-2">
      <a style="font-size: 12px;"
        href="<?= base_url() ?>/agentes/agente/<?= $propiedad['rutausuario'] ?>"
        class="text-info">
        <div class="d-flex align-items-center">
          <i class='bx bx-user mr-1'></i>
          <?= $propiedad['email_user'] ?>
        </div>

      </a>

      <span class="text-dark">
        <i class='bx bx-link'></i>
        <?= timeago($propiedad['fecha_carga']) ?>
      </span>
    </div>
  </div>
</div>

<?php return ob_get_clean();
}?>
<!-- FINAL FUNCION DUPLICADA -->



<!-- CONTENEDOR COMPLETO DE TODA LA SECCION -->

<div class="mt-1 mt-lg-" id="main-wrapper" >
  <div class="recent-article-area" style="overflow-x: hidden;">
    <div class="form-row">
      <div class="col-lg-6"
        style="height: calc(100vh - 110px); max-height: calc(100vh - 110px);">
        <div id="map"></div>
        <div style="display: none">
          <div class="controls zoom-control">
            <a href="#" class="zoom-control-in" title="Zoom In"><i
                class='bx bx-plus-medical'></i>
            </a>
            <a href="#" class="zoom-control-out" title="Zoom Out">
              <i class='bx bx-minus'></i>
            </a>
          </div>


          <div class="controls maptype-control maptype-control-is-map">
            <ul class="dropdown-menu dropdown-map">
              <li class="dropdown-item" data-maptye="roadmap">
                <span>Mapa vial</span>
              </li>
              <li class="dropdown-item" data-maptye="satellite">
                <span>Satélite</span>
              </li>
              <li class="dropdown-item" data-maptye="hybrid">
                <span>Hibrido</span>
              </li>
              <li class="dropdown-item" data-maptye="terrain">
                <span>Terreno</span>
              </li>
            </ul>
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
              <i class='bx bx-info-circle'></i>
              <span>Ver</span>
            </a>

            <!-- BOTONES DEL MAPA -->

            <!-- <a href="#" class="maptype-control-map">
              <i class='bx bx-chevron-left'
                style="font-size: 17.5px; vertical-align:middle;"></i>
              <span style="vertical-align:middle;">
                Anterior
              </span>

            </a> -->
            <!-- <a href="#" class="maptype-control-satellite">
              Siguiente
              <i class='bx bxs-chevron-right'></i>
            </a> -->


          </div>
          <div class="controls fullscreen-control">
            <a href="#" title="Toggle Fullscreen">
              <i class='bx bx-expand-alt'></i> Pantalla completa
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-6"
      style="overflow-y: scroll; height: calc(100vh - 110px);">
      <!-- AQUI EMPIEZAN LOS BOTONES -->
      <button type="button" class="btn btn-primary  sombra-btn font-weight-bold" data-bs-toggle="modal" data-bs-target="#FilterModal">
        Filtro
      </button>
        <div class="row">
          <!-- Modal -->
          <div class="modal fade" id="FilterModal" tabindex="-1" aria-labelledby="Modaltitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="Modaltitle">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <!-- Aqui empieza el contenido del modal -->
                  <div class="row">

                  <div class="col-xl-3 col-lg-6 mt-lg-0 mt-3">
                      <select name="municipal" data-dropup-auto="false" data-size="5"
                        id="municipal" title="Tds. Tipos"
                        class="form-control selectpicker">
                        <?php $tipos = getTipos();
                        foreach ($tipos as $tipo) {
                          if ($tipo['idtipo'] != 1) { ?>
                        <option value="<?= $tipo['title'] ?>">
                          <?= $tipo['title'] ?>
                        </option>
                        <?php }
                        } ?>
                      </select>
                    </div>

                    <div class="col-xl-3 col-lg-6 mt-lg-0 mt-3">
                      <select name="municipal" data-dropup-auto="false" data-size="5"
                        id="municipal" title="Tds. Municipales"
                        class="form-control selectpicker">
                      </select>
                    </div>

                    <div class="col-xl-3 col-lg-6 mt-lg-3 mt-xl-0 mt-3">
                      <select name="municipal" data-dropup-auto="false" data-size="5"
                        id="municipal" title="Tds. Municipales"
                        class="form-control selectpicker">
                        <?php $municipales = getMunicipales();
                        foreach ($municipales as $municipal) { ?>
                        <option value="<?= $municipal['nombre'] ?>">
                          <?= $municipal['nombre'] ?>
                        </option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="col-xl-3 col-lg-6 mt-lg-3 mt-xl-0 mt-3">
                      <select name="area" data-dropup-auto="false" data-size="5" id="area"
                        title="Tds. Areas" class="form-control selectpicker">
                        <?php $areascapitales = getAreasCapitales();
                        foreach ($areascapitales as $areascapital) { ?>
                        <option value="<?= $areascapital['nombre'] ?>">
                          <?= $areascapital['nombre'] ?>
                        </option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="col-md-12 my-4">
                      <div class="wrapper-slide">
                        <div class="values text-dark">
                          Rango de precio de:
                          $<span id="range1">0</span>
                          <span> A </span>

                          $<span id="range2">50.000.000</span>
                        </div>
                        <div class="container-slide">
                          <div class="slider-track"></div>
                          <input type="range" min="0" max="50000000" value="0"
                            id="slider-1" oninput="slideOne()">
                          <input type="range" min="0" max="50000000" value="50000000"
                            id="slider-2" oninput="slideTwo()">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <button class="btn box-shadow-none" type="button"
                        data-bs-toggle="collapse" data-toggle="collapse"
                        data-target="#collapseExample" aria-expanded="false"
                        aria-controls="collapseExample">
                        <i class='bx bx-message-square-add'></i> Otras caracteristicas
                      </button>
                      <div class="collapse" id="collapseExample">
                        <div class="row">
                          <?php
                          $caracteristicas = getCaracteristicas();
                          $caracteristicasjson = [];
                          /*                 if (!empty($propiedad['caracteristicasjson'])) {
                            $caracteristicasjson =  json_decode($propiedad['caracteristicasjson'], true);
                          } */

                          function checkCaracacterstica($caracteristicas, $value2)
                          {
                            foreach ($caracteristicas as $caracteristica) {
                              if ($caracteristica === $value2) {
                                return true;
                              }
                            }
                            return false;
                          }
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
                                  <span class="d-"><?= $caracteristica['titulo'] ?></span>
                                </span>
                              </label>
                            </div>
                          </div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-12 mt-4">
                      <div class="d-flex">

                        <div class="w-50 px-3">
                          <button type="button" class="btn btn-block btn-light"> Guardar
                            Busqueda <i class='bx bxs-bell-ring'></i> </button>
                        </div>
                        <div class="w-50 px-3">
                          <button type="submit"
                            class="btn btn-block btn-info">Buscar</button>
                        </div>
                      </div>
                    </div>

                  </div>

                  <!-- FIN DEL BODY DEL MODAL -->

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>

          <!-- AQUI EMPIEZAN LAS PROPIEDADES DESTACADAS -->
          <?php if (!empty($propiedadesDestacadas)) { ?>
          <div class="col-md-12 border-bottom">
            <div class="form-row">
              <h4 class="text-center col-md-12 mt-4">Super Destacadas</h4>
              <?php foreach ($propiedadesSuperDestacadas as $propiedad) {
                  echo htmlPropiedad1($propiedad);
                } ?>
              <hr>

            </div>
          </div>
          <?php } ?>
            <!-- OLAOLA TESTE DE DONDE ESTOy -->
          <?php if (!empty($propiedadesDestacadas)) { ?>
          <div class="col-md-12">
            <div class="form-row">
              <h4 class="text-center col-md-12 mt-4">Destacadas</h4>
              <?php foreach ($propiedadesDestacadas as $propiedad) {
                  echo htmlPropiedad($propiedad);
                } ?>


            </div>
          </div>
          <?php } ?>

          <?php if (!empty($propiedadesGratuitas)) { ?>
          <div class="col-md-12">
            <div class="form-row">
              <h4 class="text-center col-md-12">No destacadas</h4>
              <?php foreach ($propiedadesGratuitas as $propiedad) {
                  echo htmlPropiedad($propiedad);
                } ?>
            </div>
          </div>
          <?php } ?>

        </div>
      </div>
    </div>
  </div>
</div>
<script>
<?php if (
    !empty($data['propiedad'])
    && !empty($propiedad['latitud_mapa'])
    && !empty($propiedad['longitud_mapa'])
    && floatval($propiedad['latitud_mapa'])
    && floatval($propiedad['longitud_mapa'])
  ) {
    $propiedad = $data['propiedad'];
  ?>
let coord = {
  lat: parseFloat(<?= $propiedad['latitud_mapa'] ?>) === NaN ? 0 : parseFloat(
    <?= $propiedad['latitud_mapa'] ?>),
  lng: parseFloat(<?= $propiedad['longitud_mapa'] ?>) === NaN ? 0 :
    parseFloat(<?= $propiedad['longitud_mapa'] ?>),
};

let textTileMaps = [
  '<h5><?= $propiedad['titulo'] ?></h5>',
];
<?php } else { ?>
let coord = {
  lat: 18.200178,
  lng: -66.664513,
};
let textTileMaps;
<?php } ?>
</script>
<?php footerTienda($data); ?>


<script
  src="https://maps.googleapis.com/maps/api/js?key=<?= KEYGOOGLEMAPS ?>&libraries=places&callback=iniciarMap">
</script>