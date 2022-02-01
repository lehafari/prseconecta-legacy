<?php

class SupervisionModel extends Mysql
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getPropiedades(int $idpersona)
  {
    $sql = "SELECT idpropiedad, titulo
            FROM propiedades
            WHERE status = 1 AND personaid = $idpersona 
            ORDER BY idpropiedad DESC";
    $request = $this->select_all($sql);
    return $request;
  }

  public function selectVistosMes(string $anio, string $mes, int $idpersona, int $idpropiedad)
  {
    $totalVistos = 0;
    $arrVistos = array();
    $dias = cal_days_in_month(CAL_GREGORIAN, $mes, $anio);
    $n_dia = 1;
    for ($i = 0; $i <  $dias; $i++) {
      $date = date_create($anio . '-' . $mes . '-' . $n_dia);
      $fechaVenta = date_format($date, 'Y-m-d');
      $sql = "SELECT DAY(visto.fecha) AS dia, count(visto.idpropiedad) AS cantidad
                    FROM vistospropiedades visto 
                    INNER JOIN propiedades pro
                    ON pro.idpropiedad = visto.idpropiedad
                    WHERE DATE(visto.fecha) = '$fechaVenta' 
                    AND pro.idpropiedad = $idpropiedad 
                    AND pro.personaid = $idpersona";
      $vistoDia = $this->select($sql);
      $vistoDia['dia'] = $n_dia;
      $totalVistos += $vistoDia['cantidad'] ? 0 : $vistoDia['cantidad'];
      array_push($arrVistos, $vistoDia);
      $n_dia++;
    }
    $meses = Meses();
    $arrData = array('anio' => $anio, 'mes' => $meses[$mes - 1], 'total' => $totalVistos, 'vistos' => $arrVistos);
    return $arrData;
  }

  public function selectDevicesMes(string $anio, string $mes, int $idpersona, int $idpropiedad)
  {
    $sql = "SELECT visto.id, visto.device , COUNT(visto.idpropiedad) AS cantidad 
    FROM vistospropiedades visto 
    INNER JOIN propiedades pro
    ON pro.idpropiedad = visto.idpropiedad
    WHERE MONTH(visto.fecha) = $mes
    AND YEAR(visto.fecha) = $anio
    AND pro.idpropiedad = $idpropiedad
    AND pro.personaid = $idpersona
    GROUP BY visto.device";
    $vistos = $this->select_all($sql);
    $meses = Meses();
    $arrData = array('anio' => $anio, 'mes' => $meses[$mes - 1], 'vistosDevices' => $vistos);
    return $arrData;
  }

  public function selectCountrysMes(string $anio, string $mes, int $idpersona, int $idpropiedad)
  {
    $sql = "SELECT visto.id, visto.country , COUNT(visto.idpropiedad) AS cantidad 
    FROM vistospropiedades visto 
    INNER JOIN propiedades pro
    ON pro.idpropiedad = visto.idpropiedad
    WHERE MONTH(visto.fecha) = $mes
    AND YEAR(visto.fecha) = $anio
    AND pro.idpropiedad = $idpropiedad
    AND pro.personaid = $idpersona
    GROUP BY visto.country";
    $vistos = $this->select_all($sql);
    $meses = Meses();
    $arrData = array('anio' => $anio, 'mes' => $meses[$mes - 1], 'vistosCountrys' => $vistos);
    return $arrData;
  }


  public function selectVistosAnio(int $anio, int $idpersona, int $idpropiedad)
  {
    $arrMVistos = array();
    $arrMeses = Meses();
    for ($i = 1; $i <= 12; $i++) {
      $arrData = array('anio' => '', 'no_mes' => '', 'mes' => '', 'visto' => '');
      $sql = "SELECT $anio AS anio, $i AS mes, COUNT(*) AS visto
                    FROM vistospropiedades visto 
                    INNER JOIN propiedades pro
                    ON pro.idpropiedad = visto.idpropiedad
                    WHERE MONTH(visto.fecha) = $i AND YEAR(visto.fecha) = $anio 
                    AND pro.personaid = $idpersona
                    AND visto.idpropiedad = $idpropiedad
                    GROUP BY MONTH(fecha)";
      $vistosMes = $this->select($sql);
      $arrData['mes'] = $arrMeses[$i - 1];
      if (empty($vistosMes)) {
        $arrData['anio'] = $anio;
        $arrData['no_mes'] = $i;
        $arrData['visto'] = 0;
      } else {
        $arrData['anioo'] = $vistosMes['anio'];
        $arrData['no_mes'] = $vistosMes['mes'];
        $arrData['visto'] = $vistosMes['visto'];
      }
      array_push($arrMVistos, $arrData);
    }
    $arrVentas = array('anio' => $anio, 'meses' => $arrMVistos);
    return $arrVentas;
  }
}