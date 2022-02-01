<?php
class Clients extends Controllers
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
        getPermisos(MCLIENTS);
        parent::__construct();
    }


    public function Clients()
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() . '/dashboard');
        }
        $data['page_tag'] = 'Clients - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Clients - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'clients';
        $data['page_functions_js'] = 'clients.js';
        $data['datatable'] = true;
        $data['jquery'] = true;
        $data['dashboard-dark'] = true;
        $data['selectpicker'] = true;
        $this->views->getView($this, 'clients', $data);
    }

    public function client($idcliente)
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() . '/dashboard');
        }

        $idcliente = intval($idcliente);

        if (!$idcliente) {
            header('location: ' . base_url() . '/clients');
        }

        $cliente = $this->model->selectClient($idcliente);

        if (empty($cliente)) {
            header('location: ' . base_url() . '/clients');
        }

        $data['cliente'] = $cliente;
        $data['page_tag'] = 'Client';
        $data['page_title'] = 'Client';
        $data['page_name'] = 'clients';
        $data['page_functions_js'] = 'clients.js';
        $data['dashboard-dark'] = true;

        if (!empty($_GET['action'])) {
            if ($_GET['action'] === 'edit' and !empty($_SESSION['permisosMod']['u'])) {
                $data['selectpicker'] = true;
                $data['jquery'] = true;
                $data['page_title'] = 'Edit Client';
                $this->views->getView($this, 'edit', $data);
            } else {
                $this->views->getView($this, 'client', $data);
            }
        } else {
            $this->views->getView($this, 'client', $data);
        }
    }

    public function getClients()
    {
        if ($_SESSION['permisosMod']['r']) {
            $arrData = $this->model->selectClientes();
            $count = count($arrData);
            $base_url = base_url();
            $media = media();
            for ($i = 0; $i < $count; $i++) {
                $btnView = '';
                $btnEdit = '';
                $btnDelete = '';
                $status = $arrData[$i]['status'];
                $idpersona = $arrData[$i]['idpersona'];


                if ($status == 1) {
                    $arrData[$i]['status'] = '<span class="badge badge-success">Active</span>';
                } else {
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactive</span>';
                }

                if (!empty($arrData[$i]['imagen'])) {
                    $arrData[$i]['imagen'] = "<img style='width: 60px;' src='$media/images/uploads/{$arrData[$i]['imagen']}' alt='Foto Perfil' />";
                } else {
                    $arrData[$i]['imagen'] = "<img style='width: 60px;' src='$media/images/profile-avatar.png' alt='Foto Perfil' />";
                }


                $btnView .=
                    "<a class='btn btn-primary bx-tada-hover' 
                            onclick='viewInfo($idpersona)' 
                            title='View Client' 
                            type='button'
                            href='$base_url/clients/client/$idpersona'
                        >
                            <i class='bx bx-show-alt'></i>
                        </a>";

                if ($_SESSION['permisosMod']['u']) {
                    $btnEdit .=
                        "<a class='btn btn-secondary bx-tada-hover' 
                            title='Edit Client' type='button'
                            href='$base_url/clients/client/$idpersona?action=edit'
                        >
                                    <i class='bx bx-pencil'></i>
                                </a>";
                }

                if ($_SESSION['permisosMod']['d']) {
                    $btnDelete .=
                        "<button class='btn btn-danger bx-tada-hover' 
                            onclick='delInfo($idpersona)'
                            title='Delete Client' 
                            type='button'>
                                <i class='bx bx-trash'></i>
                        </button>";
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

    public function update()
    {
        if ($_POST) {
            $request_user = '';

            if ($_SESSION['permisosMod']['u'] == 1) {

                $usuario = strClean($_POST['username']);
                $nombre = ucwords(strClean($_POST['nombre']));
                $apellido = ucwords(strClean($_POST['apellido']));
                $telefono = strClean($_POST['telefono']);
                $email = strtolower(strClean($_POST['email']));
                $idpersona = intval($_POST['idClient']);
                $rolid = RCLIENTES;
                $status = intval(strClean($_POST['listStatus']));
                $request_user = $this->model->updateClient(
                    $idpersona,
                    $usuario,
                    $nombre,
                    $apellido,
                    $telefono,
                    $email,
                    $rolid,
                    $status
                );
            }


            if ($request_user === 'exist email') {
                $arrResponse = ['status' => false, 'msg' => 'The email already exists, enter another'];
            } else if ($request_user === 'exist username') {
                $arrResponse = ['status' => false, 'msg' => 'The username already exists, enter another'];
            } else if ($request_user > 0) {
                $arrResponse = ['status' => true, 'msg' => 'Data updated correctly.'];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Data cannot be stored.'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function updatePassword()
    {
        if ($_POST) {

            $request_user = '';

            if ($_SESSION['permisosMod']['u'] == 1) {
                $password = hash("SHA256", $_POST['password']);
                $idcliente = intval($_POST['idClient']);

                $request_user = $this->model->changePassword(
                    $idcliente,
                    $password
                );
            }
            if ($request_user > 0) {
                $arrResponse = ['status' => true, 'msg' => 'Password changed correctly.'];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Data cannot be stored.'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function insert()
    {
        if ($_POST) {
            $request_user = '';

            if ($_SESSION['permisosMod']['w'] == 1) {
                $username = strClean($_POST['username']);
                $nombre = ucwords(strClean($_POST['nombre']));
                $apellido = ucwords(strClean($_POST['apellido']));
                $telefono = strClean($_POST['telefono']);
                $email = strtolower(strClean($_POST['email']));
                $rolid = RCLIENTES;
                $status = intval(strClean($_POST['listStatus']));
                $password = hash('SHA256', $_POST['password']);
                $request_user = $this->model->insertClient(
                    $username,
                    $nombre,
                    $apellido,
                    $telefono,
                    $email,
                    $password,
                    $rolid,
                    $status
                );
            }


            if ($request_user === 'exist email') {
                $arrResponse = ['status' => false, 'msg' => 'The email already exists, enter another'];
            } else if ($request_user === 'exist username') {
                $arrResponse = ['status' => false, 'msg' => 'The user already exists, enter another'];
            } else if ($request_user > 0) {
                $arrResponse = ['status' => true, 'msg' => 'Data saved correctly.'];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Data cannot be stored.'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getClient($idclient)
    {
        if ($_SESSION['permisosMod']['r'] == 1) {
            $idclient = intval($idclient);
            if ($idclient > 0) {
                $arrData = $this->model->selectClient($idclient);
                if (empty($arrData)) {
                    $arrResponse = ['status' => false, 'msg' => 'Data not found.'];
                } else {
                    $arrResponse = ['status' => true, 'data' => $arrData];
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function delClient()
    {
        if ($_POST) {
            if ($_SESSION['permisosMod']['d'] == 1) {
                $idClient = intval($_POST['idClient']);
                $requestDelete = $this->model->delClient($idClient);
                if ($requestDelete == 'ok') {
                    $arrResponse = ['status' => true, 'msg' => 'Client has been deleted.'];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Failed to delete client.'];
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }

    public function delImgProfile()
    {
        if ($_POST) {
            if ($_SESSION['permisosMod']['u'] == 1) {
                $fotoActual = $_POST['fotoActual'];
                $idpersona  = intval($_POST['idcliente']);
                $request_profile = $this->model->updateImgProfile('', $idpersona);

                if ($request_profile > 0) {
                    $arrResponse = ['status' => true, 'msg' => 'Profile picture has been deleted',];
                    deleteFile($fotoActual);
                } else {
                    $arrResponse = ["status" => false, "msg" => 'An error has occurred, please try again later ...'];
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }

    public function changeprofileimage()
    {
        if ($_POST) {
            if ($_SESSION['permisosMod']['u'] == 1) {
                $request_profile = '';
                $foto            = $_FILES['foto'];
                $nombre_foto     = $foto['name'];
                $imgPortada     = '';
                $idpersona  = intval($_POST['idcliente']);
                if ($nombre_foto !== '') {
                    $imgPortada = getImgName('PROFILE-CLIENTE');
                }

                $request_profile = $this->model->updateImgProfile($imgPortada, $idpersona);

                if ($request_profile > 0) {
                    $arrResponse = ['status' => true, 'msg' => 'Profile picture has successfully changed.',];
                    if ($nombre_foto !== '') {
                        uploadImage($foto, $imgPortada, 'profile');
                    }
                    if (($nombre_foto === '' && $_POST['foto_remove'] == 1
                            && $_POST['foto_actual'] !== '')
                        || ($nombre_foto !== '' && $_POST['foto_actual'] !== '')
                    ) {
                        deleteFile($_POST['foto_actual']);
                    }
                } else {
                    $arrResponse = ["status" => false, "msg" => 'An error has occurred, please try again later ...'];
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }
}