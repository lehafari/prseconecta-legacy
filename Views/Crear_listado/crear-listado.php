<?php headerAdmin($data); ?>

<section class="home-section">
  <div class="home-content" style="margin: auto 20px;">
    <h3>
      <i style="font-weight: 100;" class='bx bx-plus-circle'></i>
      Agregar
    </h3>

  </div>

  <div class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="tile bg-light mb-0 border-bottom-no-radius">
          <h3>Tipos de Propiedades</h3>
        </div>
        <div class="tile rounded-0">
          <div class="tile-body">
            <div class="row text-center justify-content-center py-3">
              <div class="col-lg-3">
                <button style="font-size: 20px;"
                  class="btn btn-block py-3 font-weight-bold"
                  onclick="seleccionarListado(this,'listado')">
                  LISTAR
                </button>
              </div>
              <div class="col-lg-3">
                <button style="font-size: 20px;"
                  class="btn btn-block py-3 mt-4 mt-lg-0 font-weight-bold"
                  onclick="seleccionarListado(this,'anunciar')">
                  ANUNCIAR

                </button>
              </div>

            </div>
          </div>

          <div class="tile-footer">
            <p>Selecciona si quieres listar o anunciar</p>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="app-footer d-flex justify-content-end">
    <a href="#" class="btn btn-info disabled" id="btnProximo">
      Próximo
      <img class="text-white"
        src="<?= media() ?>/images/chevron-right-solid.svg"
        style="width: 7.5px;" alt="arrow-right">
    </a>
  </div>


</section>

<?php footerAdmin($data); ?>