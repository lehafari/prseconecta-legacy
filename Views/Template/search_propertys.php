<form>
  <div class="row">
    <div class="col-md-4">
      <div class="input-group flex-nowrap">
        <div class="input-group-prepend">
          <span class="input-group-text" id="addon-wrapping"><i
              class='bx bx-search'></i></span>
        </div>
        <input type="text" class="form-control"
          placeholder="Escriba palabras clave">
      </div>
    </div>
    <?php
    $arraySelects = [
      [
        'name' => 'municipal',
        'placeholder' => 'Tds. Municipales',
        'valores' => ['key' => 'nombre', 'data' => getMunicipales()]
      ],
      [
        'name' => 'area',
        'placeholder' => 'Tds. Areas',
        'valores' => ['key' => 'nombre', 'data' => getAreasCapitales()]
      ]
    ];

    ?>


    <div class="col-md-8">
      <div class="row">
        <div class="col-md-12 mt-md-0 mt-3">
          <div class="row">
            <?php foreach ($arraySelects as $select) { ?>
            <div class="col-md-4">
              <select name="<?= $select['name'] ?>" data-dropup-auto="false"
                data-size="5" id="<?= $select['name'] ?>"
                title="<?= $select['placeholder'] ?>"
                class="form-control selectpicker">
                <?php if (!empty($select['valores']['data'])) {
                    $key = $select['valores']['key'];
                    foreach ($select['valores']['data'] as $option) { ?>
                <option value="<?= $option[$key] ?>"><?= $option[$key] ?>
                </option>
                <?php }
                  } ?>
              </select>
            </div>
            <?php } ?>

            <div class="col-md-4">
              <select name="tipopropiedad" data-dropup-auto="false"
                data-size="5" id="tipopropiedad" title="Tds. Tipos"
                class="form-control selectpicker">
                <?php $tipos = getTipos();
                foreach ($tipos as $tipo) {
                  if ($tipo['idtipo'] != 1) { ?>
                <option value="<?= $tipo['title'] ?>">
                  <?= $tipo['title'] ?></option>
                <?php }
                } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-6 px-5 mt-4">
          <select name="tipoestado" title="Tds. Estados" id="tipoestado"
            class="form-control selectpicker">
          </select>
        </div>

        <div class="col-md-6 px-5 mt-4">
          <button class="btn btn-info btn-block"> Buscar</button>
        </div>
      </div>
    </div>
  </div>
</form>