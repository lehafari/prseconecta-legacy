<?php

require 'Models/TPropiedades.php';
class Resultados_busqueda extends Controllers
{
  use TPropiedades;
  public function __construct()
  {
    if (empty($_SESSION)) {
      session_set_cookie_params(60 * 60 * 24 * 14);
      session_start();
    }
    parent::__construct();
  }

  public function Resultados_busqueda()
  {
    $data['page_tag'] = NOMBRE_EMPRESA;
    $data['page_title'] = NOMBRE_EMPRESA;
    $data['page_name'] = 'resultados-busqueda';
    $propiedadesSuperDestacadas = $this->getPropiedades(PAQUETE_SUPER_DESTACADO);
    $propiedadesDestacadas = $this->getPropiedades(PAQUETE_DESTACADO);
    $propiedadesGratuitas = $this->getPropiedades(PAQUETE_REGULAR_GRATUITO);
    $propiedades = [$propiedadesGratuitas, $propiedadesDestacadas, $propiedadesSuperDestacadas];
    $data['propiedades'] = $propiedades;

    $data['propiedad'] = [];
    if (!empty($_GET['listing_id'])) {
      $listing_id = intval($_GET['listing_id']);
      $propiedad = $this->getPropiedad($listing_id);
      if (!empty($propiedad)) {
        $data['propiedad'] = $propiedad;
        $dispositivo = getDispositivo();
        $paisVisitante = getPaisVisitante();
        $browser = getBrowser();
        $this->insertarVistaPropiedad($propiedad['idpropiedad'], $dispositivo, $paisVisitante, $browser);
      }
    }
    $this->views->getView($this, 'resultados-busqueda', $data);
  }
}