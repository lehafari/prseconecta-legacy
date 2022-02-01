<?php
class Propiedades_favoritas extends Controllers
{
    public function __construct()
    {
        if (empty($_SESSION)) {
            session_set_cookie_params(60 * 60 * 24 * 14);
            session_start();
        }
        if (empty($_SESSION['cliente-login'])) {
            header('location: ' . base_url());
        }
        parent::__construct();
    }


    public function Propiedades_favoritas()
    {

        $data['page_tag'] = 'Favoritos - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Favoritos - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'favoritos';
        $data['page_functions_js'] = 'propertys.js';
        $data['datatable'] = true;
        $data['jquery'] = true;
        $this->views->getView($this, 'favoritos', $data);
    }
}