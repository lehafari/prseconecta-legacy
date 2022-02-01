<?php
class Characteristics extends Controllers
{
  public function __construct()
  {
    if (empty($_SESSION)) {
      session_set_cookie_params(60 * 60 * 24 * 14);
      session_start();
    }
    if (empty($_SESSION['admin-login'])) {
      header('location: ' . base_url() . '/admin-login');
    }
    getPermisos(MPROPERTYS);
    parent::__construct();
  }

  public function Characteristics()
  {
    if (empty($_SESSION['permisosMod']['r'])) {
      header('Location: ' . base_url() . '/dashboard');
    }
    $data['page_tag'] = 'Characteristics - ' . NOMBRE_EMPRESA;
    $data['page_title'] = 'Characteristics - ' . NOMBRE_EMPRESA;
    $data['page_name'] = 'characteristics';
    $data['dashboard-dark'] = true;
    $data['sortable'] = true;
    $data['jquery'] = true;
    $data['page_functions_js'] = 'propertys/characteristics.js';
    $data['characteristic'] = $this->model->getCharacteristics();
    $data['orden'] = $this->model->getOrden();
    $this->views->getView($this, 'characteristics', $data);
  }

  public function getcaracteristica($idcaracteristica)
  {
    if (!empty($_SESSION['permisosMod']['r'])) {
      $idcaracteristica = intval($idcaracteristica);
      $data = $this->model->getCharacteristic($idcaracteristica);
      if (empty($data)) {
        $arrResponse = ['status' => false, 'msg' => 'Data not found'];
      } else {
        $arrResponse = ['status' => true, 'msg' => 'ok', 'data' => $data];
      }

      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
  }

  public function insert()
  {
    if ($_POST) {
      $request = '';
      if (!empty($_SESSION['permisosMod']['w'])) {
        $title = strClean($_POST['title']);
        $request = $this->model->insertCharacteristics($title);
      }

      if ($request > 0) {
        $data = $this->model->getCharacteristic($request);
        $html = getFile('Template/plantillas/plantillacharacteristic', $data);
        $arrResponse = ['status' => true, 'msg' => 'Data saved correctly', 'html' => $html];
      } else {
        $arrResponse = ['status' => false, 'msg' => 'An error ocurred...'];
      }

      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
  }

  public function edit()
  {
    if ($_POST) {
      $request = '';
      if (!empty($_SESSION['permisosMod']['u'])) {
        $title = strClean($_POST['title']);
        $idcaracteristica = strClean($_POST['idcaracteristica']);
        $request = $this->model->editCharacteristic($idcaracteristica, $title);
      }

      if ($request > 0) {
        $arrResponse = ['status' => true, 'msg' => 'Data updated correctly'];
      } else {
        $arrResponse = ['status' => false, 'msg' => 'An error ocurred...'];
      }

      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
  }

  public function delcharacteristic()
  {
    if ($_POST) {
      if ($_SESSION['permisosMod']['d'] == 1) {
        $idcaracteristica = intval($_POST['idcaracteristica']);
        $requestDelete = $this->model->deletecaracteristica($idcaracteristica);
        if ($requestDelete == 'ok') {
          $arrResponse = ['status' => true, 'msg' => 'Characteristic has been deleted.'];
        } else {
          $arrResponse = ['status' => false, 'msg' => 'Failed to delete agent.'];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      }
    }
    die();
  }

  public function setOrder()
  {
    if ($_POST) {
      $idtabla = 1;
      $column = strClean($_POST['name']);
      $orden = strClean($_POST['orden']);
      $status = intval($_POST['status']);
      $this->model->setOrdenCheck($idtabla, $column, $orden, $status);
    }
  }
}