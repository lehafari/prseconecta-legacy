<?php

class Terminos_y_condiciones extends Controllers
{
  public function __construct()
  {
    if (empty($_SESSION)) {
      session_set_cookie_params(60 * 60 * 24 * 14);
      session_start();
    }
    parent::__construct();
  }

  public function Terminos_y_condiciones()
  {
    $page = getInfoPage(3);
    $data['page'] = $page;
    $data['page_tag'] = $page['titulo'] . ' - ' . NOMBRE_EMPRESA;
    $data['page_title'] = $page['titulo'] . ' - ' . NOMBRE_EMPRESA;
    $data['page_name'] = 'Terminos y condiciones';
    $this->views->getView($this, 'index', $data);
  }
}