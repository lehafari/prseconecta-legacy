  <?php

  $valores = empty($data['data']) ? [] : $data['data'];
  function revisarValor($arrayValor, $idform, $type = 'text/plain', $option = '')
  {
    if (!empty($arrayValor)) {
      if ($type === 'text/plain') {
        foreach ($arrayValor as $id => $value) {
          if ($id == $idform) {
            return $value[1];
            break;
          }
        }
      } else if ($type === 'select') {
        foreach ($arrayValor as $id => $value) {
          if ($id == $idform) {
            if ($value[1] === $option) {
              return 'selected';
              break;
            }
          }
        }
      } else if ($type === 'multi-select') {
        foreach ($arrayValor as $id => $value) {
          if ($id == $idform) {
            unset($value[0]);
            sort($value);
            foreach ($value as $v) {
              if ($v === $option) {
                return 'selected';
              }
            }
          }
        }
      }
    }
    return '';
  }
  ?>

  <div class="form-row" id="elementosFormBuilder" orden="<?= $data['orden'] ?>">
    <?php foreach ($data['formbuilder'] as $formulario) { ?>

    <?php if ($formulario['type'] === 'text' || $formulario['type'] === 'number') { ?>
    <div class="col-lg-4 col-md-6 p-2" data-id="<?= $formulario['idform'] ?>">
      <input type="hidden" name="formBuilder[<?= $formulario['idform'] ?>][0]"
        value="<?= $formulario['field_name'] ?>">
      <div class="form-group">

        <label
          for="<?= $formulario['name'] ?>"><?= $formulario['field_name'] ?></label>
        <input type="<?= $formulario['type'] ?>" class="form-control"
          name="formBuilder[<?= $formulario['idform'] ?>][1]"
          id="<?= $formulario['name'] ?>"
          value="<?= revisarValor($valores, $formulario['idform']) ?>"
          placeholder="<?= $formulario['placeholder'] ?>">
      </div>
    </div>


    <?php } else if ($formulario['type'] === 'textarea') { ?>
    <div class="col-lg-12 p-2" data-id="<?= $formulario['idform'] ?>">
      <div class="form-group">
        <input type="hidden" name="formBuilder[<?= $formulario['idform'] ?>][0]"
          value="<?= $formulario['field_name'] ?>">
        <label
          for="<?= $formulario['name'] ?>"><?= $formulario['field_name'] ?></label>
        <textarea class="form-control"
          name="formBuilder[<?= $formulario['idform'] ?>][1]"
          id="<?= $formulario['name'] ?>"
          placeholder="<?= $formulario['placeholder'] ?>" cols="10"
          rows="4"><?= revisarValor($valores, $formulario['idform']) ?></textarea>
      </div>
    </div>


    <?php } else if ($formulario['type'] === 'select' || $formulario['type'] === 'multi-select') { ?>
    <div class="col-lg-4 col-md-6 p-2" data-id="<?= $formulario['idform'] ?>">
      <div class="form-group">
        <input type="hidden" name="formBuilder[<?= $formulario['idform'] ?>][0]"
          value="<?= $formulario['field_name'] ?>">
        <label
          for="<?= $formulario['name'] ?>"><?= $formulario['field_name'] ?></label>
        <select title="<?= $formulario['placeholder'] ?>"
          name="formBuilder[<?= $formulario['idform'] ?>][]"
          id="<?= $formulario['name'] ?>" class="form-control selectpicker"
          <?= $formulario['type'] === 'multi-select' ? 'multiple' : '' ?>>
          <?php $options = explode(',', $formulario['valores']);
              foreach ($options as $option) { ?>
          <option
            <?= revisarValor($valores, $formulario['idform'], $formulario['type'], $option) ?>
            value="<?= $option ?>">
            <?= $option ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <?php } else if ($formulario['type'] === 'titulo') { ?>
    <h3 data-id="<?= $formulario['idform'] ?>" class="col-md-12 my-3">
      <?= $formulario['field_name'] ?></h3>
    <?php } ?>
    <?php
      ?>

    <?php } ?>
  </div>


  <?php if (!empty($data['script'])) { ?>
  <script>
fntSortable(document.querySelector('#elementosFormBuilder'),
  "<?= $data['orden'] ?>");
  </script>
  <?php } ?>