<?php
class Busquedas_guardadas extends Controllers
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


    public function Busquedas_guardadas()
    {

        $data['page_tag'] = 'Búsquedas Guardadas - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Búsquedas Guardadas - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'bqs_guardadas';
        $data['page_functions_js'] = 'propiedades.js';
        $data['datatable'] = true;
        $data['jquery'] = true;
        $this->views->getView($this, 'bqs_guardadas', $data);
    }
}