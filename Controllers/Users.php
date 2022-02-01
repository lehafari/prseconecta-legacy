<?php
class Users extends Controllers
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


    public function users()
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() . '/dashboard');
        }
        $data['page_tag'] = 'Users - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Users - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'users';
        $data['page_functions_js'] = 'users.js';
        $data['datatable'] = true;
        $data['jquery'] = true;
        $data['dashboard-dark'] = true;
        $data['selectpicker'] = true;
        $data['roles'] = $this->model->selectRoles();
        $this->views->getView($this, 'users', $data);
    }


    public function nuevoUsuario()
    {
        if ($_POST) {

            $request_user = '';

            if ($_SESSION['permisosMod']['w'] == 1) {

                $nombre = ucwords(strClean($_POST['nombre']));
                $apellido = ucwords(strClean($_POST['apellido']));
                $telefono = strClean($_POST['telefono']);
                $email = strtolower(strClean($_POST['email']));
                $rolid = intval(strClean($_POST['listRolid']));
                $status = intval(strClean($_POST['listStatus']));
                $password = hash('SHA256', $_POST['password']);
                $request_user = $this->model->insertUsuario(
                    $nombre,
                    $apellido,
                    $telefono,
                    $email,
                    $password,
                    $rolid,
                    $status
                );
            }


            if ($request_user === 'exist') {
                $arrResponse = ['status' => false, 'msg' => 'The email already exists, enter another'];
            } else if ($request_user > 0) {
                $arrResponse = ['status' => true, 'msg' => 'Data saved correctly.'];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Data cannot be stored.'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }

        die();
    }

    public function setUsuario()
    {
        if ($_POST) {

            $request_user = '';

            if ($_SESSION['permisosMod']['u'] == 1) {

                $idUsuario = intval($_POST['idUsuario']);
                $nombre = ucwords(strClean($_POST['nombre']));
                $apellido = ucwords(strClean($_POST['apellido']));
                $telefono = strClean($_POST['telefono']);
                $email = strtolower(strClean($_POST['email']));
                $rolid = intval(strClean($_POST['listRolid']));
                $status = intval(strClean($_POST['listStatus']));
                $password = empty($_POST['password']) ? '' : hash('SHA256', $_POST['password']);

                $request_user = $this->model->updateUsuario(
                    $idUsuario,
                    $nombre,
                    $apellido,
                    $telefono,
                    $email,
                    $password,
                    $rolid,
                    $status
                );
            }

            if ($request_user === 'exist') {
                $arrResponse = ['status' => false, 'msg' => 'The email already exists, enter another'];
            } else if ($request_user > 0) {
                $arrResponse = ['status' => true, 'msg' => 'Data updated correctly.'];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Data cannot be stored.'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getUsuarios()
    {
        if ($_SESSION['permisosMod']['r']) {
            $arrData = $this->model->selectUsuarios();
            $count = count($arrData);

            for ($i = 0; $i < $count; $i++) {
                $btnView = '';
                $btnEdit = '';
                $btnDelete = '';
                $status = $arrData[$i]['status'];
                $idpersona = $arrData[$i]['idpersona'];


                if ($status == 1) {
                    $arrData[$i]['status'] = '<span class="badge badge-dark">Active</span>';
                } else {
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactive</span>';
                }

                $btnView .=
                    "<button class='btn btn-primary bx-tada-hover' 
                                onclick='viewInfo($idpersona)' 
                                title='View user' 
                                type='button'
                        >
                            <i class='bx bx-show-alt'></i>
                        </button>";

                if ($_SESSION['permisosMod']['u']) {

                    if (($_SESSION['idUser-admin'] == 1 and $_SESSION['userData-admin']['idrol'] == 1 and $arrData[$i]['idpersona'] != 1) ||
                        ($_SESSION['userData-admin']['idrol'] == 1 and $arrData[$i]['idrol'] != 1)
                    ) {
                        $btnEdit .=
                            "<button class='btn btn-secondary bx-tada-hover' 
                                    title='Edit user' type='button'
                                    onclick='editInfo(this,$idpersona)'
                                    >
                                        <i class='bx bx-pencil'></i>
                                    </button>";
                    } else {
                        $btnEdit = '<button class="btn btn-secondary" disabled ><i class="bx bx-pencil"></i></button>';
                    }
                }

                if ($_SESSION['permisosMod']['d']) {
                    if (($_SESSION['idUser-admin'] == 1 and $_SESSION['userData-admin']['idrol'] == 1) ||
                        ($_SESSION['userData-admin']['idrol'] == 1 and $arrData[$i]['idrol'] != 1) and
                        ($_SESSION['userData-admin']['idpersona'] != $idpersona)
                    ) {
                        $btnDelete .=
                            "<button class='btn btn-danger bx-tada-hover' 
                                onclick='delInfo($idpersona)'
                                title='Delete user' 
                                type='button'>
                                    <i class='bx bx-trash'></i>
                            </button>";
                    } else {
                        $btnDelete .= '<button class="btn btn-danger" disabled type="button">
                                        <i class="bx bx-trash"></i>
                                        </button>';
                    }
                }

                $arrData[$i]['options'] = '
                    <div class="text-center">
                    ' . $btnView . '
                    ' . $btnEdit . '
                    ' . $btnDelete . '
                    </div>';
            }

            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        }

        die();
    }

    public function getUsuario($idpersona)
    {
        if ($_SESSION['permisosMod']['r'] == 1) {
            $idusuario = intval($idpersona);
            if ($idusuario > 0) {
                $arrData = $this->model->selectUsuario($idusuario);
                if (empty($arrData)) {
                    $arrResponse = ['status' => false, 'msg' => 'Data not found.'];
                } else {
                    $arrResponse = ['status' => true, 'data' => $arrData];
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function delUsuario()
    {
        if ($_POST) {
            if ($_SESSION['permisosMod']['d'] == 1) {
                $intIdPersona = intval($_POST['idUsuario']);
                $requestDelete = $this->model->deleteUsuario($intIdPersona);
                if ($requestDelete == 'ok') {
                    $arrResponse = ['status' => true, 'msg' => 'User has been deleted.'];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Failed to delete user.'];
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }

    public function putPerfil()
    {
        if ($_POST) {
            $idUsuario = $_SESSION['idUser-admin'];
            $nombre = strClean($_POST['firstname']);
            $apellido = strClean($_POST['lastname']);
            $email = strtolower(strClean($_POST['email']));
            $telefono = strClean($_POST['phone']);
            $request_user = $this->model->updatePerfil(
                $idUsuario,
                $nombre,
                $apellido,
                $telefono,
                $email
            );
            if ($request_user === 'exist') {
                $arrResponse = ['status' => false, 'msg' => 'This email already exists.'];
            } else if ($request_user > 0) {
                sessionUserAdmin($_SESSION['idUser-admin']);
                $arrResponse = ['status' => true, 'msg' => 'Data updated correctly.'];
            } else {
                $arrResponse = ["status" => false, "msg" => 'It is not possible to update the data.'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function changePassword()
    {
        if ($_POST) {
            $password = $_POST['password'];
            $confirmPassword = $_POST['passwordconfirm'];

            if ($password !== $confirmPassword) {
                $arrResponse = ['status' => false, 'msg' => 'Passwords do not match.'];
            } else {
                $password = hash('SHA256', $password);
                $idusuario = $_SESSION['idUser-admin'];
                $request = $this->model->changePassword($password, $idusuario);

                if ($request > 0) {
                    $arrResponse = ['status' => true, 'msg' => 'Password changed successfully.'];
                } else {
                    $arrResponse = ["status" => false, "msg" => 'It is not possible to update the password.'];
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function profile()
    {
        $data['page_tag'] = 'Profile - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Profile - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'profile';
        $data['page_functions_js'] = 'users.js';
        $data['dashboard-dark'] = true;
        $this->views->getView($this, 'profile', $data);
    }

    public function changeprofile()
    {
        if ($_POST) {
            $request_profile = '';
            $foto            = $_FILES['foto'];
            $nombre_foto     = $foto['name'];
            $imgPortada     = '';
            $idpersona  = intval($_SESSION['idUser-admin']);
            if ($nombre_foto !== '') {
                $imgPortada = getImgName('PROFILE-USER');
            }

            $request_profile = $this->model->updateImgProfile($imgPortada, $idpersona);

            if ($request_profile > 0) {
                $arrResponse = ['status' => true, 'msg' => 'Profile picture has successfully changed.',];
                if ($nombre_foto !== '') {
                    uploadImage($foto, $imgPortada, 'profile');
                }
                $_SESSION['userData-admin']['imagen'] = $imgPortada;
                if (($nombre_foto === '' && $_POST['foto_remove'] == 1
                        && $_POST['foto_actual'] !== '')
                    || ($nombre_foto !== '' && $_POST['foto_actual'] !== '')
                ) {
                    deleteFile($_POST['foto_actual']);
                }
            } else {
                $arrResponse = ["status" => false, "msg" => 'An error has occurred, please try again later...'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function delImgProfile()
    {
        if ($_POST) {
            $fotoActual = $_POST['fotoActual'];
            $idpersona  = intval($_SESSION['idUser-admin']);
            $request_profile = $this->model->updateImgProfile('', $idpersona);

            if ($request_profile > 0) {
                $arrResponse = ['status' => true, 'msg' => 'Profile picture has been deleted',];
                deleteFile($fotoActual);
                $_SESSION['userData-admin']['imagen'] = null;
            } else {
                $arrResponse = ["status" => false, "msg" => 'An error has occurred, please try again later...'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function deleteAccount()
    {
        if ($_POST) {
            $idusuario  = intval($_SESSION['idUser-admin']);
            $requestDelete = $this->model->deleteUsuario($idusuario);
            if ($requestDelete == 'ok') {
                $arrResponse = ['status' => true, 'msg' => 'Your account has been deleted, you will be redirected.'];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Failed to delete user, try again later...'];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }
}