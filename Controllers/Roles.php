<?php
class Roles extends Controllers
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
        getPermisos(MUSUARIOS);
        parent::__construct();
    }


    public function Roles()
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() . '/dashboard');
        }
        $data['page_tag'] = 'Roles - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Roles - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'roles';
        $data['page_functions_js'] = 'roles.js';
        $data['datatable'] = true;
        $data['jquery'] = true;
        $data['dashboard-dark'] = true;
        $this->views->getView($this, 'roles', $data);
    }

    public function getRoles()
    {
        if ($_SESSION['permisosMod']['r']) {
            $arrData = $this->model->selectRoles();
            $count = count($arrData);

            for ($i = 0; $i < $count; $i++) {

                $btnPermisos = '';
                $btnEdit = '';
                $btnDelete = '';
                $idrol = $arrData[$i]['idrol'];
                if ($arrData[$i]['status'] == 1) {
                    $arrData[$i]['status'] = '<span class="badge badge-success ">Active</span>';
                } else {
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactive</span>';
                }


                if ($_SESSION['permisosMod']['u']) {
                    $btnPermisos .=
                        "<button class='btn btn-primary bx-tada-hover' 
                                onclick='fntPermisos($idrol)' title='Role permissions' type='button'>
                                    <i class='bx bxs-key'></i>
                                </button>";
                    if ($idrol != RCLIENTES) {
                        $btnEdit .=
                            "<button class='btn btn-secondary bx-tada-hover' 
                            onclick='editInfo(this,$idrol)' title='Edit Rol' type='button'>
                                <i class='bx bx-pencil'></i>
                            </button>";
                    }
                }

                if ($idrol != RCLIENTES) {
                    if ($_SESSION['permisosMod']['d']) {
                        if ($idrol == RADMINISTRADOR || $idrol == RCLIENTES) {
                            $btnDelete .=
                                '<button class="btn btn-danger" disabled="" type="button">
                                        <i class="bx bx-trash"></i>
                                    </button>';
                        } else {
                            $btnDelete .=
                                "<button class='btn btn-danger bx-tada-hover btnDelRol' 
                                        onclick='delInfo($idrol)' title='Delete Rol' type='button'>
                                        <i class='bx bx-trash'></i>
                                    </button>";
                        }
                    }
                }



                $arrData[$i]['options'] = '
                    <div class="text-center">
                    ' . $btnPermisos . '
                    ' . $btnEdit . '
                    ' . $btnDelete . '
                    </div>';
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        }

        die();
    }

    public function getRol($idRol)
    {
        if ($_SESSION['permisosMod']['r']) {
            $idrol = intval(strClean($idRol));
            if ($idrol > 0) {
                $data = $this->model->selectRol($idrol);
                if (empty($data)) {
                    $arrResponse = ['status' => false, 'msg' => 'Data error'];
                } else {
                    $arrResponse = ['status' => true, 'data' => $data];
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }

        die();
    }

    public function getSelectRoles()
    {
        $htmlOptions = '';
        $arrData = $this->model->selectRoles();
        $count = count($arrData);
        if ($count > 0) {
            for ($i = 0; $i < $count; $i++) {
                if ($arrData[$i]['status'] == 1) {
                    $htmlOptions .= '<option value="' . $arrData[$i]['idrol'] . '">' . $arrData[$i]['nombrerol'] . '</option>';
                }
            }
        }
        echo $htmlOptions;
        die();
    }

    public function nuevoRol()
    {
        if ($_POST) {
            $request_rol = '';

            if ($_SESSION['permisosMod']['w'] == 1) {

                $nombre =  strClean($_POST['nombre']);
                $descripcion = strClean($_POST['descripcion']);
                $status = intval($_POST['listStatus']);

                $request_rol = $this->model->insertRol($nombre, $descripcion, $status);
            }

            if ($request_rol === 'exist') {
                $arrResponse = ['status' => false, 'msg' => 'The role already exists.'];
            } else if ($request_rol > 0) {
                $arrResponse = ['status' => true, 'msg' => 'Data saved correctly.'];
            } else {
                $arrResponse = ["status" => false, "msg" => 'Data cannot be stored.'];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }

        die();
    }

    public function setRol()
    {
        if ($_POST) {
            $request_rol = '';

            if ($_SESSION['permisosMod']['u'] == 1) {
                $idrol = intval($_POST['idRol']);
                $nombre =  strClean($_POST['nombre']);
                $descripcion = strClean($_POST['descripcion']);
                $status = intval($_POST['listStatus']);

                $request_rol = $this->model->updateRol($idrol, $nombre, $descripcion, $status);
            }

            if ($request_rol === 'exist') {
                $arrResponse = ['status' => false, 'msg' => 'The role already exists.'];
            } else if ($request_rol > 0) {
                $arrResponse = ['status' => true, 'msg' => 'Data updated correctly.'];
            } else {
                $arrResponse = ["status" => false, "msg" => 'Data cannot be stored.'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function delRol()
    {
        if ($_POST) {
            if ($_SESSION['permisosMod']['d'] == 1) {
                $idrol = intval($_POST['idrol']);
                $requestDelete = $this->model->deleteRol($idrol);

                if ($requestDelete == 'ok') {
                    $arrResponse = ['status' => true, 'msg' => 'Role has been removed.'];
                } else if ($requestDelete == 'exist') {
                    $arrResponse = ['status' => false, 'msg' => 'It is not possible to delete a Role associated with users.'];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Failed to delete Role.'];
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }
}