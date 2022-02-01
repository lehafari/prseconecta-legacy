<?php
class Supervision extends Controllers
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


    public function Supervision()
    {

        $data['page_tag'] = 'Supervisión - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Supervisión - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'supervision';
        $data['page_functions_js'] = 'supervision.js';
        $data['jquery'] = true;
        $data['selectpicker'] = true;
        $data['datepickerjquery'] = true;
        $data['highcharts'] = true;
        $personaid = intval($_SESSION['userData-cliente']['idpersona']);
        $data['propiedades'] = $this->model->getPropiedades($personaid);
        if (!empty($_GET['listing_id']) and intval($_GET['listing_id'])) {
            $idpropiedad = intval($_GET['listing_id']);
            $anio = date('Y');
            $mes = date('m');
            $data['devicesMes'] = $this->model->selectDevicesMes($anio, $mes, $personaid, $idpropiedad);
            $data['countryMes'] = $this->model->selectCountrysMes($anio, $mes, $personaid, $idpropiedad);
            $data['vistos'] = $this->model->selectVistosMes($anio, $mes, $personaid, $idpropiedad);
            $data['vistosAnio'] = $this->model->selectVistosAnio($anio, $personaid, $idpropiedad);
        }

        $this->views->getView($this, 'supervision', $data);
    }

    public function vistosDispositivos()
    {
        if ($_POST) {
            if (!empty($_POST['idpropiedad']) && !empty($_POST['fecha'])) {
                $idpropiedad = intval($_POST['idpropiedad']);
                $personaid = intval($_SESSION['userData-cliente']['idpersona']);
                if ($idpropiedad) {

                    $grafica = 'vistosDispositivos';
                    $fecha = $_POST['fecha'];
                    $nFecha = str_replace(' ', '', $fecha);
                    $arrFecha = explode('-', $nFecha);

                    $mes = $arrFecha[0];
                    $anio = $arrFecha[1];
                    $vistos = $this->model->selectDevicesMes($anio, $mes, $personaid, $idpropiedad);
                    $vistos['grafica'] = $grafica;
                    $script = getFile('Template/modals/graficas', $vistos);
                    $arrResponse = ['script' => $script, 'datos' => $vistos];
                    echo json_encode($arrResponse);
                }
            }
        }
    }
    public function vistosPaises()
    {
        if ($_POST) {
            if (!empty($_POST['idpropiedad']) && !empty($_POST['fecha'])) {
                $idpropiedad = intval($_POST['idpropiedad']);
                $personaid = intval($_SESSION['userData-cliente']['idpersona']);
                if ($idpropiedad) {

                    $grafica = 'vistosPaises';
                    $fecha = $_POST['fecha'];
                    $nFecha = str_replace(' ', '', $fecha);
                    $arrFecha = explode('-', $nFecha);

                    $mes = $arrFecha[0];
                    $anio = $arrFecha[1];
                    $vistos = $this->model->selectCountrysMes($anio, $mes, $personaid, $idpropiedad);
                    $vistos['grafica'] = $grafica;
                    $script = getFile('Template/modals/graficas', $vistos);
                    $arrResponse = ['script' => $script, 'datos' => $vistos];
                    echo json_encode($arrResponse);
                }
            }
        }
    }

    public function vistosMes()
    {
        if ($_POST) {
            if (!empty($_POST['idpropiedad']) && !empty($_POST['fecha'])) {
                $idpropiedad = intval($_POST['idpropiedad']);
                $personaid = intval($_SESSION['userData-cliente']['idpersona']);
                if ($idpropiedad) {
                    $grafica = 'vistosMes';
                    $fecha = $_POST['fecha'];
                    $nFecha = str_replace(' ', '', $fecha);
                    $arrFecha = explode('-', $nFecha);

                    $mes = $arrFecha[0];
                    $anio = $arrFecha[1];
                    $vistos = $this->model->selectVistosMes($anio, $mes, $personaid, $idpropiedad);
                    $vistos['grafica'] = $grafica;
                    $script = getFile('Template/modals/graficas', $vistos);
                    echo $script;
                }
            }
        }
        die();
    }


    public function vistosAnio()
    {
        if ($_POST) {
            if (!empty($_POST['idpropiedad']) && !empty($_POST['anio'])) {
                $idpropiedad = intval($_POST['idpropiedad']);
                $anio = intval($_POST['anio']);
                if ($idpropiedad && $anio) {
                    $personaid = intval($_SESSION['userData-cliente']['idpersona']);
                    $grafica = 'vistosAnio';
                    $vistos = $this->model->selectVistosAnio($anio, $personaid, $idpropiedad);
                    $vistos['grafica'] = $grafica;
                    $script = getFile('Template/modals/graficas', $vistos);
                    echo $script;
                }
            }
        }
        die();
    }
}