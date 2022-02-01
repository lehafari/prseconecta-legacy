<?php
class Customs_forms extends Controllers
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


    public function Customs_forms()
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() . '/dashboard');
        }
        $data['page_tag'] = 'Custom Forms - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Custom Forms - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'customsforms';
        $data['page_functions_js'] = 'propertys/customsforms.js';
        $data['dashboard-dark'] = true;
        $data['jquery'] = true;
        $data['selectpicker'] = true;
        $data['customsforms'] = $this->model->getCustomsForms();
        $data['swal'] = true;
        $data['sortable'] = true;
        $this->views->getView($this, 'customforms', $data);
    }

    /* CRUD TYPE */

    public function newCustomForm()
    {
        if ($_POST) {
            $titulo = strClean($_POST['titulo']);
            $request = '';
            if (!empty($_SESSION['permisosMod']['w'])) {
                $request = $this->model->insertCustomForm($titulo);
            }

            if ($request > 0) {
                $data = $this->model->getCustomForm($request);
                $html = getFile('Template/plantillas/plantillaCustomForm', $data);
                $arrResponse = ['status' => true, 'msg' => 'Data saved correctly', 'html' => $html];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'An error has ocurred...'];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function editCustomForm()
    {
        if ($_POST) {
            $titulo = strClean($_POST['titulo']);
            $idcustomform = intval($_POST['idForm']);
            $request = '';

            if (!empty($_SESSION['permisosMod']['u'])) {
                $request = $this->model->updateCustomForm($titulo, $idcustomform);
            }

            if ($request > 0) {
                $arrResponse = ['status' => true, 'msg' => 'Data updated correctly',];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'An error has ocurred...'];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function delCustomForm()
    {
        if ($_POST) {
            if (!empty($_SESSION['permisosMod']['w'])) {
                $idCustomForm = intval($_POST['idCustomForm']);

                if ($idCustomForm > 0) {
                    $request = $this->model->delCustomForm($idCustomForm);

                    if ($request > 0) {
                        $arrResponse = ['status' => true, 'msg' => 'Data deleted correctly'];
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'An error has ocurred...'];
                    }
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }
        }
        die();
    }

    public function getCustomForm($idCustomForm)
    {
        if (!empty($_SESSION['permisosMod']['r'])) {
            $idCustomForm = intval($idCustomForm);
            if ($idCustomForm > 0) {
                $request = $this->model->getCustomForm($idCustomForm);
                if (!empty($request)) {
                    $arrResponse = ['status' => true, 'msg' => 'Usuario encontrado', 'data' => $request];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Usuario no encontrado',];
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }

    /* CRUD SUBTYPE */

    public function getSubtype($idsubtipo)
    {
        if (!empty($_SESSION['permisosMod']['r'])) {
            $idsubtipo = intval($idsubtipo);
            if ($idsubtipo > 0) {
                $request = $this->model->getSubtype($idsubtipo);
                if (!empty($request['subtipo'])) {
                    $html = getFile('Template/plantillas/plantillaSubtypeForm', $request);
                    $arrResponse = ['status' => true, 'msg' => 'ok', 'html' => $html];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Data not found'];
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function setSubType()
    {
        if ($_POST) {
            $title = strClean($_POST['subtype']);
            $idtipo = !empty($_POST['idtipo']) ? intval($_POST['idtipo']) : 0;
            $idsubtipo = !empty($_POST['idsubtipo']) ? intval($_POST['idsubtipo']) : 0;
            $request = '';

            if ($idsubtipo) {
                if (!empty($_SESSION['permisosMod']['u'])) {
                    $request = $this->model->editSubtype($title, $idsubtipo);
                }
            } else {
                if (!empty($_SESSION['permisosMod']['w'])) {
                    $request = $this->model->insertSubType($title, $idtipo);
                }
            }
            if ($request > 0) {
                if ($idsubtipo) {
                    $arrResponse = ['status' => true, 'msg' => 'Data updated correctly'];
                } else {
                    $data = ['idtipo' => $idtipo, 'titulo' => $title, 'idsubtipo' => $request];
                    $html = getFile('Template/plantillas/plantillaCustomFormSubtipo', $data);
                    $arrResponse = ['status' => true, 'msg' => 'Data saved correctly', 'html' => $html];
                }
            } else {
                $arrResponse = ['status' => false, 'msg' => 'An error has ocurred...'];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }

        die();
    }

    public function delSubtype()
    {
        if ($_POST) {
            if (!empty($_SESSION['permisosMod']['w'])) {
                $idsubtipo = intval($_POST['idsubtipo']);

                if ($idsubtipo > 0) {
                    $request = $this->model->delSubTipo($idsubtipo);

                    if ($request > 0) {
                        $arrResponse = ['status' => true, 'msg' => 'Data deleted correctly'];
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'An error has ocurred...'];
                    }
                    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                }
            }
        }
        die();
    }

    public function setTitleSubtype()
    {
        if ($_POST) {
            $idsubtipo = intval($_POST['idsubtipo']);
            $idform = intval($_POST['idform']);
            $titulo = strClean($_POST['titleBuilder']);
            $availableSearch = 0;
            $name = '';
            $placeholder = '';
            $type = 'titulo';
            $values = '';
            if ($idform) {
                $request = $this->model->updateFieldBuilder(
                    $idsubtipo,
                    $idform,
                    $titulo,
                    $name,
                    $availableSearch,
                    $placeholder,
                    $type,
                    $values
                );
            } else {
                $request = $this->model->insertFieldBuilder(
                    $idsubtipo,
                    $titulo,
                    $name,
                    $availableSearch,
                    $placeholder,
                    $type,
                    $values
                );
            }

            if ($request > 0) {
                if ($idform) {
                    $arrResponse = ['status' => true, 'msg' => 'Data updated correctly', 'idFormBuilder' => $idform,];
                } else {
                    $data = ['idform' => $request, 'field_name' => $titulo, 'type' => $type];
                    $html = getFile('Template/plantillas/plantillaSubtypeFormField', $data);
                    $arrResponse = ['status' => true, 'msg' => 'Data saved correctly', 'idFormBuilder' => $request, 'htmlCard' => $html];
                }
            } else {
                $arrResponse = ['status' => false, 'msg' => 'An error has ocurred...'];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function setFieldBuilder()
    {
        if ($_POST) {
            $idsubtipo = intval($_POST['idsubtipo']);
            $idform = intval($_POST['idform']);
            $fieldname = strClean($_POST['fieldname']);
            $name = strtolower(clear_cadena($fieldname));
            $name = str_replace(' ', '-', $name);
            $placeholder = strClean($_POST['placeholder']);
            $tipo = strClean($_POST['tipo']);

            $availableForSearches = intval($_POST['availableForSearches']);
            $values = empty($_POST['values']) ? '' : implode(',', $_POST['values']);
            if ($idform) {
                $request = $this->model->updateFieldBuilder(
                    $idsubtipo,
                    $idform,
                    $fieldname,
                    $name,
                    $availableForSearches,
                    $placeholder,
                    $tipo,
                    $values
                );
            } else {
                $request = $this->model->insertFieldBuilder(
                    $idsubtipo,
                    $fieldname,
                    $name,
                    $availableForSearches,
                    $placeholder,
                    $tipo,
                    $values
                );
            }


            if ($request > 0) {
                if ($idform) {
                    $arrResponse = ['status' => true, 'msg' => 'Data updated correctly', 'idFormBuilder' => $idform];
                } else {
                    $data = ['idform' => $request, 'field_name' => $fieldname, 'type' => $tipo];
                    $html = getFile('Template/plantillas/plantillaSubtypeFormField', $data);
                    $arrResponse = ['status' => true, 'msg' => 'Data saved correctly', 'idFormBuilder' => $request, 'htmlCard' => $html];
                }
            } else {
                $arrResponse = ['status' => false, 'msg' => 'An error has ocurred...'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function getInfoFormBuilder($idformBuilder)
    {
        $idformBuilder = intval($idformBuilder);
        if ($idformBuilder) {
            $request = $this->model->getInfoFormBuilder($idformBuilder);
            if (!empty($idformBuilder)) {
                $arrResponse = ['status' => true, 'msg' => 'ok', 'data' => $request];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Data deleted correctly'];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }

        die();
    }

    public function setOrder()
    {
        if ($_POST) {
            $idsubtipo = intval($_POST['idsubtipo']);
            $column = strClean($_POST['name']);
            $orden = strClean($_POST['orden']);
            $status = intval($_POST['status']);
            $this->model->setOrdenCheck($idsubtipo, $column, $orden, $status);
        }
    }

    public function delFieldBuilder()
    {
        if ($_POST) {
            $idFieldBuilder = intval($_POST['idFieldBuilder']);
            $request = $this->model->delFieldBuilder($idFieldBuilder);
            if ($request > 0) {
                $arrResponse = ['status' => true, 'msg' => 'Data deleted correctly'];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'An error has ocurred...'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function setOverviewFields()
    {
        if ($_POST) {
            $columna = strClean($_POST['tabla']);
            $idsubtipo = intval($_POST['idsubtipo']);
            $values = strClean($_POST['values']);
            $this->model->setOverviewFields($columna, $idsubtipo, $values);
        }
    }
}