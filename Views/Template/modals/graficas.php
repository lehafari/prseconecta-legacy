<?php
if ($data['grafica'] == 'vistosDispositivos') {
  $vistosDevices = $data;
?>
<script>
Highcharts.chart('graficaDevices', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'Vistos dispositivos <?= $vistosDevices['mes'] . ' ' . $vistosDevices['anio'] ?>'
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
      <?php foreach ($vistosDevices['vistosDevices'] as $vistos) {
            echo "{name:'" . $vistos['device'] . "', y: " . $vistos['cantidad'] . "},";
          } ?>
    ]
  }]
});
</script>
<?php } ?>

<?php
if ($data['grafica'] == 'vistosPaises') {
  $vistosPaises = $data;
?>
<script>
Highcharts.chart('graficaPaises', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'Vistos paises <?= $vistosPaises['mes'] . ' ' . $vistosPaises['anio'] ?>'
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
      <?php foreach ($vistosPaises['vistosCountrys'] as $vistos) {
            echo "{name:'" . $vistos['country'] . "', y: " . $vistos['cantidad'] . "},";
          } ?>
    ]
  }]
});
</script>
<?php } ?>



<?php if ($data['grafica'] == 'vistosMes') {
  $vistosMes = $data;
?>
<script>
Highcharts.chart('graficaMes', {
  chart: {
    type: 'line'
  },
  title: {
    text: 'Vistos de <?= $vistosMes['mes'] . ' ' . $vistosMes['anio'] ?>'
  },
  xAxis: {
    categories: [
      <?php foreach ($vistosMes['vistos'] as $dia) echo $dia['dia'] . ','; ?>
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
      <?php foreach ($vistosMes['vistos'] as $dia) echo $dia['cantidad'] . ','; ?>
    ]
  }]
});
</script>
<?php } ?>


<?php if ($data['grafica'] == 'vistosAnio') {
  $vistosAnio = $data;

?>
<script>
Highcharts.chart('graficaAnio', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Vistos del año <?= $vistosAnio['anio'] ?>'
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
      <?php foreach ($vistosAnio['meses'] as $mes) { ?>[
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