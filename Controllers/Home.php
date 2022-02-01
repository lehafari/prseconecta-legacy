<?php

require 'Models/TPropiedades.php';
class Home extends Controllers
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

    public function home()
    {
        $data['page_tag'] = NOMBRE_EMPRESA;
        $data['page_title'] = NOMBRE_EMPRESA;
        $data['page_name'] = 'inicio';
        $data['selectpicker'] = true;
        $data['home'] = getInfoPage(PHOME);
        $data['banner'] = getInfoPage(PBANNER);
        $data['listado-superDestacados'] = $this->getPropiedades(PAQUETE_SUPER_DESTACADO);
        $listado_destacados = $this->getPropiedades(PAQUETE_DESTACADO);
        $listado_destacados = array_chunk($listado_destacados, ceil(count($listado_destacados) / 2));
        $destacados = array();
        $destacados[0] = !empty($listado_destacados[0]) ? $listado_destacados[0] : [];
        $destacados[1] = !empty($listado_destacados[1]) ? $listado_destacados[1] : [];
        $data['listado-destacados'] = $destacados;
        $this->views->getView($this, 'home', $data);
    }

    public function getSubtipos($idtipo)
    {
        $idtipo = intval($idtipo);
        if ($idtipo) {
            $request = $this->getSubtiposT($idtipo);
            echo json_encode($request, JSON_UNESCAPED_UNICODE);
        }
    }
}