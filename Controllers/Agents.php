<?php
require 'Models/TAgentes.php';
class Agents extends Controllers
{
    use TAgentes;
    public function __construct()
    {
        if (empty($_SESSION)) {
            session_set_cookie_params(60 * 60 * 24 * 14);
            session_start();
        }
        if (empty($_SESSION['admin-login'])) {
            header('location: ' . base_url() . '/admin-login');
        }
        getPermisos(MAGENTS);
        parent::__construct();
    }


    public function Agents()
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() . '/dashboard');
        }
        $data['page_tag'] = 'Agents - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Agents - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'agents';
        $data['page_functions_js'] = 'agents.js';
        $data['datatable'] = true;
        $data['jquery'] = true;
        $data['dashboard-dark'] = true;
        $data['selectpicker'] = true;
        $this->views->getView($this, 'agents', $data);
    }

    public function Agent($idagente)
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() . '/dashboard');
        }

        $idagente = intval($idagente);

        if (!$idagente) {
            header('location: ' . base_url() . '/agents');
        }

        $agente = $this->model->selectAgent($idagente);

        if (empty($agente)) {
            header('location: ' . base_url() . '/agents');
        }

        $data['agente'] = $agente;
        $data['page_tag'] = 'Agent';
        $data['page_title'] = 'Agent';
        $data['page_name'] = 'agents';
        $data['page_functions_js'] = 'agents.js';
        $data['dashboard-dark'] = true;

        if (!empty($_GET['action'])) {
            if ($_GET['action'] === 'edit' and !empty($_SESSION['permisosMod']['u'])) {
                $data['selectpicker'] = true;
                $data['jquery'] = true;
                $data['tinymce'] = true;
                $data['dropzone'] = true;
                $data['page_title'] = 'Edit Agent';
                $data['agente']['comentarios'] = $this->getComentarios($agente['idpersona']);
                $data['axios'] = true;
                $this->views->getView($this, 'edit', $data);
            } else {
                $this->views->getView($this, 'agent', $data);
            }
        } else {
            $this->views->getView($this, 'agent', $data);
        }
    }

    public function getAgents()
    {
        if ($_SESSION['permisosMod']['r']) {
            $arrData = $this->model->selectAgentes();
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
                        title='View Agent' 
                        href='$base_url/agents/agent/$idpersona'
                        type='button'
                        >
                            <i class='bx bx-show-alt'></i>
                        </a>";

                if ($_SESSION['permisosMod']['u']) {
                    $btnEdit .=
                        "<a class='btn btn-secondary bx-tada-hover' 
                            title='Edit Agent' type='button'
                            href='$base_url/agents/agent/$idpersona?action=edit'
                                >
                                    <i class='bx bx-pencil'></i>
                                </a>";
                }

                if ($_SESSION['permisosMod']['d']) {
                    $btnDelete .=
                        "<button class='btn btn-danger bx-tada-hover' 
                            onclick='delInfo($idpersona)'
                            title='Delete Agent' 
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
                $extra = $_POST['extra'];
                $extra = cleanArrayData($extra);
                $stringjsonextra = json_encode($extra, JSON_UNESCAPED_UNICODE);
                $usuario = strClean($_POST['username']);
                $rutausuario = strtolower(clear_cadena($usuario));
                $rutausuario = str_replace(' ', '-', $rutausuario);
                $nombre = ucwords(strClean($_POST['nombre']));
                $apellido = ucwords(strClean($_POST['apellido']));
                $telefono = strClean($_POST['telefono']);
                $email = strtolower(strClean($_POST['email']));
                $idpersona = intval($_POST['idAgent']);
                $rolid = RAGENTES;
                $status = intval($_POST['listStatus']);
                $request_user = $this->model->updateAgent(
                    $idpersona,
                    $usuario,
                    $rutausuario,
                    $nombre,
                    $apellido,
                    $telefono,
                    $email,
                    $rolid,
                    $status,
                    $stringjsonextra
                );
            }

            if ($request_user === 'exist email') {
                $arrResponse = ['status' => false, 'msg' => 'The email already exists, enter another'];
            } else if ($request_user === 'exist user') {
                $arrResponse = ['status' => false, 'msg' => 'The user already exists, enter another.'];
            } else if ($request_user > 0) {
                $arrResponse = ['status' => true, 'msg' => 'Data updated correctly.'];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Data cannot be stored.'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function insert()
    {
        if ($_POST) {
            $request_user = '';

            if ($_SESSION['permisosMod']['w'] == 1) {
                $usuario = strClean($_POST['username']);
                $rutausuario = strtolower(clear_cadena($usuario));
                $rutausuario = str_replace(' ', '-', $rutausuario);
                $nombre = ucwords(strClean($_POST['nombre']));
                $apellido = ucwords(strClean($_POST['apellido']));
                $telefono = strClean($_POST['telefono']);
                $email = strtolower(strClean($_POST['email']));
                $rolid = RAGENTES;
                $status = intval(strClean($_POST['listStatus']));
                $password = hash('SHA256', $_POST['password']);
                $request_user = $this->model->insertAgent(
                    $usuario,
                    $nombre,
                    $rutausuario,
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
            } else if ($request_user === 'exist user') {
                $arrResponse = ['status' => false, 'msg' => 'The user already exists, enter another.'];
            } else if ($request_user > 0) {
                $arrResponse = ['status' => true, 'msg' => 'Data saved correctly.'];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Data cannot be stored.'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getAgent($idagente)
    {
        if ($_SESSION['permisosMod']['r'] == 1) {
            $idagente = intval($idagente);
            if ($idagente > 0) {
                $arrData = $this->model->selectAgent($idagente);
                if (empty($arrData)) {
                    $arrResponse = ['status' => false, 'msg' => 'Data not found.'];
                } else {
                    $arrResponse = ['status' => true, 'data' => $arrData];
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function delAgent()
    {
        if ($_POST) {
            if ($_SESSION['permisosMod']['d'] == 1) {
                $idAgent = intval($_POST['idAgent']);
                $requestDelete = $this->model->delAgent($idAgent);
                if ($requestDelete == 'ok') {
                    $arrResponse = ['status' => true, 'msg' => 'Agent has been deleted.'];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Failed to delete agent.'];
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
                $idpersona  = intval($_POST['idpersona']);
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
                $idpersona  = intval($_POST['idpersona']);
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

    public function updatePassword()
    {
        if ($_POST) {
            $request_user = '';
            if ($_SESSION['permisosMod']['u'] == 1) {
                $password = hash("SHA256", $_POST['password']);
                $idpersona = intval($_POST['idpersona']);

                $request_user = $this->model->changePassword(
                    $idpersona,
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

    public function updateSocialNetworks()
    {
        if ($_POST) {
            dep($_POST);
        }
    }

    public function socialmediaUpdate()
    {
        if ($_POST) {
            if ($_SESSION['permisosMod']['u'] == 1) {
                $socialmedia = cleanArrayData($_POST);
                $socialmedia = json_encode($socialmedia, JSON_UNESCAPED_UNICODE);
                $idUsuario = intval($_POST['idpersona']);
                $request_user = $this->model->updateSocialMedia($idUsuario, $socialmedia);
                if ($request_user > 0) {
                    $arrResponse = ['status' => true, 'msg' => 'Social networks updated correctly.'];
                } else {
                    $arrResponse = ["status" => false, "msg" => 'It is not possible to update the data.'];
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }

    public function changeCustomBg()
    {
        if ($_FILES) {
            $idpersona  = intval($_POST['idpersona']);
            $imgPortada = getImgName('PROFILE-CUSTOM-BG');
            $request_change = $this->model->updateCustomBg($idpersona, $imgPortada);

            if ($request_change['status']) {
                $foto = $_FILES['file'];
                $foto = [
                    'name' => $foto['name'][0],
                    'type' => $foto['type'][0],
                    'tmp_name' => $foto['tmp_name'][0],
                    'error' => $foto['error'][0],
                    'size' => $foto['size'][0],
                ];
                $arrResponse = ['status' => true, 'msg' => 'Image uploaded correctly'];
                uploadImageNoCompress($foto, $imgPortada);
                if (!empty($request_change['imagen'])) {
                    deleteFile($request_change['imagen']);
                }
            } else {
                $arrResponse = ['status' => false, 'msg' => 'An error occurred...'];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function delCustomBg()
    {
        if ($_POST['action'] === 'delete') {
            $idpersona  = intval($_POST['idpersona']);
            $imgPortada = '';
            $request_change = $this->model->updateCustomBg($idpersona, $imgPortada);

            if ($request_change['status']) {
                $arrResponse = ['status' => true, 'msg' => 'La imagen ha sido eliminada'];
                deleteFile($request_change['imagen']);
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Ocurrió un error...'];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function selectComentario()
    {
        if (!empty($_GET['idcomentario'])) {
            $idcomentario = openssl_decrypt($_GET['idcomentario'], METHODENCRIPT, KEY);
            if (!empty($idcomentario)) {
                $idcomentario = intval($idcomentario);
                if ($idcomentario > 0) {
                    $request = $this->getComentario($idcomentario);
                    if (!empty($request)) {
                        $arrResponse = ['status' => true, 'msg' => 'ok', 'text' => $request['comentario']];
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'Este comentario no existe'];
                    }
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Ocurrió un error...'];
                }
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Error...'];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function editInfoComment()
    {
        if ($_POST) {
            if ((!empty($_POST['idcomentario']) || !empty($_POST['comentario'])) and !empty($_SESSION['cliente-login'])) {
                $idcomentario = openssl_decrypt($_POST['idcomentario'], METHODENCRIPT, KEY);
                if (!empty($idcomentario)) {
                    $idcomentario = intval($idcomentario);
                    if ($idcomentario > 0) {
                        $comentario = strClean($_POST['comentario']);
                        $request = $this->updateComentario($comentario, $idcomentario);
                        if ($request > 0) {
                            $arrResponse = ['status' => true, 'msg' => 'Comentario actualizado correctamente.'];
                        } else {
                            $arrResponse = ['status' => false, 'msg' => 'Ocurrió un error...'];
                        }
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'Ocurrió un error...'];
                    }
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Error...', 'reload' => true];
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function delComentario()
    {
        if ($_POST) {
            if (!empty($_POST['idcomentario']) and !empty($_SESSION['cliente-login'])) {
                $idcomentario = openssl_decrypt($_POST['idcomentario'], METHODENCRIPT, KEY);
                if (!empty($idcomentario)) {
                    $idcomentario = intval($idcomentario);
                    if ($idcomentario > 0) {
                        $request = $this->deleteComentario($idcomentario);
                        if ($request > 0) {
                            $arrResponse = ['status' => true, 'msg' => 'Comentario eliminado correctamente.'];
                        } else {
                            $arrResponse = ['status' => false, 'msg' => 'Ocurrió un error...'];
                        }
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'Ocurrió un error...'];
                    }
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Error...', 'reload' => true];
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }
}