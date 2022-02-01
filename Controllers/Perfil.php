<?php
class Perfil extends Controllers
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

    public function Perfil()
    {
        $data['page_tag'] = 'Perfil - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Perfil - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'profile';
        $data['page_functions_js'] = 'profile.js';
        $data['tinymce'] = true;
        $data['selectpicker'] = true;
        $data['jquery'] = true;
        $data['dropzone'] = true;
        $this->views->getView($this, 'perfil', $data);
    }

    public function putPerfil()
    {
        if ($_POST) {
            $stringjsonextra = '';
            if (!empty($_POST['extra'])) {
                $extra = $_POST['extra'];
                $extra = cleanArrayData($extra);
                $stringjsonextra = json_encode($extra, JSON_UNESCAPED_UNICODE);
            }

            $idUsuario = $_SESSION['idUser-cliente'];
            $rol = intval($_POST['rol']);
            $nombre = strClean($_POST['firstname']);
            $apellido = strClean($_POST['lastname']);
            $email = strtolower(strClean($_POST['email']));
            $telefono = strClean($_POST['phone']);
            $usuario  = strClean($_POST['username']);

            $rutausuario = strtolower(clear_cadena($usuario));
            $rutausuario = str_replace(' ', '-', $rutausuario);

            $request_user = $this->model->updatePerfil(
                $idUsuario,
                $rutausuario,
                $nombre,
                $apellido,
                $telefono,
                $email,
                $usuario,
                $rol,
                $stringjsonextra
            );
            if ($request_user === 'exist email') {
                $arrResponse = ['status' => false, 'msg' => 'Este correo ya existe.'];
            } else if ($request_user === 'exist user') {
                $arrResponse = ['status' => false, 'msg' => 'Este usuario ya existe.'];
            } else if ($request_user > 0) {
                sessionUserCliente($idUsuario);
                $arrResponse = ['status' => true, 'msg' => 'Perfil actualizado correctamente.'];
            } else {
                $arrResponse = ["status" => false, "msg" => 'No es posible actualizar los datos.'];
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
                $arrResponse = ['status' => false, 'msg' => 'Las contraseñas no coinciden.'];
            } else {
                $password = hash('SHA256', $password);
                $idusuario = $_SESSION['idUser-cliente'];
                $request = $this->model->changePassword($password, $idusuario);

                if ($request > 0) {
                    $arrResponse = ['status' => true, 'msg' => 'La contraseña se cambió exitosamente.'];
                } else {
                    $arrResponse = ["status" => false, "msg" => 'No es posible actualizar la contraseña.'];
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function changeprofile()
    {
        if ($_POST) {
            $request_profile = '';
            $foto            = $_FILES['foto'];
            $nombre_foto     = $foto['name'];
            $imgPortada     = '';
            $idpersona  = intval($_SESSION['idUser-cliente']);
            if ($nombre_foto !== '') {
                $imgPortada = getImgName('PROFILE-CLIENTE');
            }

            $request_profile = $this->model->updateImgProfile($imgPortada, $idpersona);

            if ($request_profile > 0) {
                $arrResponse = ['status' => true, 'msg' => 'La foto de perfil ha cambiado exitosamente.',];
                if ($nombre_foto !== '') {
                    uploadImage($foto, $imgPortada, 'profile');
                }
                $_SESSION['userData-cliente']['imagen'] = $imgPortada;
                if (($nombre_foto === '' && $_POST['foto_remove'] == 1
                        && $_POST['foto_actual'] !== '')
                    || ($nombre_foto !== '' && $_POST['foto_actual'] !== '')
                ) {
                    deleteFile($_POST['foto_actual']);
                }
            } else {
                $arrResponse = ["status" => false, "msg" => 'Ha ocurrido un error, por favor intenta más tarde...'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function socialmediaInsert()
    {
        if ($_POST) {
            if ($_SESSION['userData-cliente']['idrol'] == RAGENTES) {
                $socialmedia = cleanArrayData($_POST);
                $socialmedia = json_encode($socialmedia, JSON_UNESCAPED_UNICODE);
                $idUsuario = $_SESSION['idUser-cliente'];
                $request_user = $this->model->updateSocialMedia($idUsuario, $socialmedia);
                if ($request_user > 0) {
                    sessionUserCliente($idUsuario);
                    $arrResponse = ['status' => true, 'msg' => 'Redes sociales actualizadas correctamente.'];
                } else {
                    $arrResponse = ["status" => false, "msg" => 'No es posible actualizar los datos.'];
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }

    public function delImgProfile()
    {
        if ($_POST) {
            $fotoActual = $_POST['fotoActual'];
            $idpersona  = intval($_SESSION['idUser-cliente']);
            $request_profile = $this->model->updateImgProfile('', $idpersona);

            if ($request_profile > 0) {
                $arrResponse = ['status' => true, 'msg' => 'La foto de perfil ha sido borrada',];
                deleteFile($fotoActual);
                $_SESSION['userData-cliente']['imagen'] = null;
            } else {
                $arrResponse = ["status" => false, "msg" => 'Ha ocurrido un error, por favor intenta más tarde...'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function deleteAccount()
    {
        if ($_POST) {
            $idusuario  = intval($_SESSION['idUser-cliente']);
            $requestDelete = $this->model->deleteUsuario($idusuario);
            if ($requestDelete == 'ok') {
                $arrResponse = ['status' => true, 'msg' => 'Tu cuenta ha sido eliminada, serás redireccionado.'];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Falló al eliminar el usuario, por favor intenta más tarde...'];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function changeCustomBg()
    {
        if ($_FILES) {
            $idpersona  = intval($_SESSION['idUser-cliente']);
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
                $arrResponse = ['status' => true, 'msg' => 'Imágen subida correctamente'];
                uploadImageNoCompress($foto, $imgPortada);
                $_SESSION['userData-cliente']['custombg'] = $imgPortada;
                if (!empty($request_change['imagen'])) {
                    deleteFile($request_change['imagen']);
                }
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Ocurrió un error...'];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function delCustomBg()
    {
        if ($_POST) {
            if ($_POST['action'] === 'delete') {
                $idpersona  = intval($_SESSION['idUser-cliente']);
                $imgPortada = '';
                $request_change = $this->model->updateCustomBg($idpersona, $imgPortada);

                if ($request_change['status']) {
                    $arrResponse = ['status' => true, 'msg' => 'Se ha eliminado la imágen'];
                    $_SESSION['userData-cliente']['custombg'] = '';
                    deleteFile($request_change['imagen']);
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Ocurrió un error...'];
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }
}