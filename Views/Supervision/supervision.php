<?php headerAdmin($data); ?>

<section class="home-section">

  <div class="home-content" style="margin: auto 20px;">
    <h3>
      <i class='bx bx-bar-chart-alt-2 mr-2'></i>
      Supervisión
    </h3>

  </div>
  <div class="app-content">
    <div class="row">
      <div class="col-md-6">
        <label for="listado">Filtrar por listado</label>
        <select onchange="onChangeSelect(this)" title="Selecciona una propiedad"
          name="listado" data-live-search="true"
          class="form-control selectpicker" id="listado">
          <?php foreach ($data['propiedades'] as $propiedad) { ?>
          <option
            <?= !empty($_GET['listing_id']) && $_GET['listing_id'] == $propiedad['idpropiedad'] ? 'selected' : '' ?>
            value="<?= $propiedad['idpropiedad'] ?>">
            <?= $propiedad['titulo'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <?php if (!empty($_GET['listing_id'])) { ?>
    <div class="row mt-5">


      <div class="col-lg-6">
        <div class="tile">
          <div class="container-title">
            <h3 class="tile-title">Dispositivos</h3>
            <div class="dflex">
              <input class="date-picker inputDispositivos" autocomplete="off"
                placeholder="Mes y Año">
              <button type="button"
                <?= !empty($_GET['listing_id']) ? "onclick='fntSearchVistosDispositivos({$_GET['listing_id']})'" : ''  ?>
                class="btn btn-info btn-sm">
                <i class='bx bx-search-alt'></i>
              </button>
            </div>
          </div>
          <div class="tile-body">
            <div id="graficaDevices"></div>
            <div id="tableVistosDevices">
              <?php if (!empty($data['devicesMes']['vistosDevices'])) { ?>

              <table class="table-bordered table table-hover">
                <thead>
                  <tr class="table-primary">
                    <th>Dispositivo</th>
                    <th>Vistas</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['devicesMes']['vistosDevices'] as $device) { ?>
                  <tr>
                    <td><?= $device['device'] ?></td>
                    <td><?= $device['cantidad'] ?></td>
                  </tr>
                  <?php } ?>
                </tbody>

              </table>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="tile">
          <div class="container-title">
            <h3 class="tile-title">Paises</h3>
            <div class="dflex">
              <input class="date-picker inputPaises" autocomplete="off"
                placeholder="Mes y Año">
              <button type="button"
                <?= !empty($_GET['listing_id']) ? "onclick='fntSearchVistosPaises({$_GET['listing_id']})'" : ''  ?>
                class="btnVentasMes btn btn-info btn-sm">
                <i class='bx bx-search-alt'></i>
              </button>
            </div>
          </div>
          <div class="tile-body">
            <div id="graficaPaises"></div>
            <div id="divtableVistosCountry">
              <?php if (!empty($data['countryMes']['vistosCountrys'])) { ?>
              <table class="table-bordered table table-hover">
                <thead>
                  <tr class="table-primary">
                    <th>País</th>
                    <th>Vistas</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['countryMes']['vistosCountrys'] as $country) { ?>
                  <tr>
                    <td><?= $country['country'] ?></td>
                    <td><?= $country['cantidad'] ?></td>
                  </tr>
                  <?php } ?>
                </tbody>

              </table>
              <?php } ?>
            </div>

          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="tile">
          <div class="container-title">
            <h3 class="tile-title">Vistas del Mes</h3>
            <div class="dflex">
              <input class="date-picker vistosMes" autocomplete="off"
                placeholder="Mes y Año">
              <button type="button"
                <?= !empty($_GET['listing_id']) ? "onclick='fntSearchVMes({$_GET['listing_id']})'" : ''  ?>
                class="btn btn-info btn-sm">
                <i class='bx bx-search-alt'></i>
              </button>
            </div>
          </div>
          <div class="tile-body">
            <div id="graficaMes"></div>

          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="tile">
          <div class="container-title">
            <h3 class="tile-title">Vistas del Año</h3>
            <div class="dflex">
              <input class="vistosAnio" autocomplete="off" placeholder="Año"
                autocomplete="off" minlength="0" maxlength="4"
                onkeypress="return controlTag(event)">
              <button type="button"
                <?= !empty($_GET['listing_id']) ? "onclick='fntSearchVAnio({$_GET['listing_id']})'" : ''  ?>
                class="btn btn-info btn-sm">
                <i class='bx bx-search-alt'></i>
              </button>
            </div>
          </div>
          <div class="tile-body">
            <div id="graficaAnio"></div>

          </div>
        </div>
      </div>


    </div>

    <?php } else { ?>
    <div class="tile mt-5">
      <div class="tile-body">
        <div class="tile-title">
          <h3 class="text-center">
            Por favor. ¡Escoge una propiedad o si todavia
            no
            tienes agrega una!
          </h3>
          <a href="<?= base_url() ?>/crear-listado"
            class="btn btn-info btn-block">Agregar <i
              class='bx bx-plus-medical'></i></a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</section>





<?php footerAdmin($data); ?>


<?php if (!empty($_GET['listing_id'])) { ?>
<script>
Highcharts.chart('graficaDevices', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'Vistas Dispositivos <?= $data['devicesMes']['mes'] . ' ' . $data['devicesMes']['anio']  ?>'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
      }
    }
  },
  series: [{
    colorByPoint: true,
    data: [
      <?php foreach ($data['devicesMes']['vistosDevices'] as $device) {
            echo "{name:'" . $device['device'] . "', y: " . $device['cantidad'] . "},";
          }  ?>
    ]
  }]
});

Highcharts.chart('graficaPaises', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'Vistas paises <?= $data['countryMes']['mes'] . ' ' . $data['countryMes']['anio'] ?>'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
      }
    }
  },
  series: [{
    colorByPoint: true,
    data: [
      <?php foreach ($data['countryMes']['vistosCountrys'] as $visto)  echo "{name:'" . $visto['country'] . "', y: " . $visto['cantidad'] . "},"; ?>
    ]
  }]
});

Highcharts.chart('graficaMes', {
  chart: {
    type: 'line'
  },
  title: {
    text: 'Vistas de <?= $data['vistos']['mes'] . ' ' . $data['vistos']['anio'] ?>'
  },
  xAxis: {
    categories: [
      <?php foreach ($data['vistos']['vistos'] as $dia) echo $dia['dia'] . ','; ?>
    ]
  },
  yAxis: {
    title: {
      text: ''
    }
  },
  plotOptions: {
    line: {
      dataLabels: {
        enabled: true
      },
      enableMouseTracking: false
    }
  },
  series: [{
    name: '',
    data: [
      <?php
          foreach ($data['vistos']['vistos'] as $dia) {
            echo $dia['cantidad'] . ',';
          }

          ?>
    ]
  }]
});

Highcharts.chart('graficaAnio', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Vistos del año <?= $data['vistosAnio']['anio'] ?>'
  },
  subtitle: {
    text: 'Estadística de vistos por mes'
  },
  xAxis: {
    type: 'category',
    labels: {
      rotation: -45,
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: ''
    }
  },
  legend: {
    enabled: false
  },
  tooltip: {
    pointFormat: 'Vistos del mes: <b>{point.y:.1f}</b>'
  },
  series: [{
    name: 'Population',
    data: [
      <?php foreach ($data['vistosAnio']['meses'] as $mes) { ?>[
        '<?= $mes['mes'] ?>', <?= $mes['visto'] ?>],
      <?php } ?>
    ],
    dataLabels: {
      enabled: true,
      rotation: -90,
      color: '#FFFFFF',
      align: 'right',
      format: '{point.y:.1f}',
      y: 10,
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  }]
});
</script>
<?php } ?>