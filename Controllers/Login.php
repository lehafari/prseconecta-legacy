<?php
require 'Models/TAuth.php';
class Login extends Controllers
{
    use TAuth;
    public function __construct()
    {
        if (empty($_SESSION)) {
            session_set_cookie_params(60 * 60 * 24 * 14);
            session_start();
        }
        if (isset($_SESSION['cliente-login'])) {
            header('location: ' . base_url());
        }
        parent::__construct();
    }

    public function LoginUser()
    {
        if ($_POST) {
            $_POST['model'] = $this;
            $this->views->getView($this, 'login', $_POST);
        }
        die();
    }

    public function resetPass()
    {
        if ($_POST) {
            error_reporting(0);
            if (empty($_POST['emailReset'])) {
                $arrResponse = ['status' => false, 'msg' => 'Error de datos.'];
            } else {
                $token = token();
                $email = strtolower(strClean($_POST['emailReset']));
                $arrData = $this->getUserEmail($email);
                if (empty($arrData)) {
                    $arrResponse = ['status' => false, 'msg' => 'Usuario no encontrador'];
                } else {
                    $idpersona = $arrData['idpersona'];
                    $nombreUsuario = $arrData['nombres'] . ' ' . $arrData['apellidos'];
                    $url_recovery = base_url() . '/login/confirmUser/' . $email . '/' . $token;
                    $updateToken = $this->setTokenUser($idpersona, $token, true);
                    $dataUsuario = [
                        'nombreUsuario' => $nombreUsuario,
                        'email' => $email,
                        'asunto' => 'Recuperar Cuenta - ' . NOMBRE_REMITENTE,
                        'url_recovery' => $url_recovery
                    ];

                    if ($updateToken) {
                        $sendEmail = sendEmail($dataUsuario, 'email_cambioPasswordCliente');

                        if ($sendEmail) {
                            $arrResponse = ['status' => true, 'msg' => 'Un correo ha sido enviado a tu correo, para cambiar la contraseña.'];
                        } else {
                            $arrResponse = ['status' => false, 'msg' => 'No es posible enviar el correo, por favor intente más tarde...'];
                        }
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'No es posible enviar el correo, por favor intente más tarde...'];
                    }
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function confirmUser(string $params)
    {
        if (empty($params)) {
            header('location: ' . base_url());
        } else {
            $arrParams = explode(',', $params);
            $email = strClean($arrParams[0]);
            if (!isset($arrParams[1])) {
                header('location: ' . base_url());
            }
            $token = strClean($arrParams[1]);
            $arrResponse = $this->getUsuario($email, $token, true);
            if (empty($arrResponse)) {
                header('Location: ' . base_url());
            } else {
                $data['page_tag'] = 'Change Password';
                $data['page_title'] = 'Change Password';
                $data['page_name'] = 'change_password';
                $data['page_functions_js'] = 'admin-login.js';
                $data['email'] = $email;
                $data['token'] = $token;

                $data['idpersona'] = $arrResponse['idpersona'];
                $this->views->getView($this, 'cambiar_password', $data);
            }
        }
        die();
    }

    public function registrar()
    {
        if ($_POST) {
            $_POST['model'] = $this;
            $this->views->getView($this, 'registrar', $_POST);
        }
        die();
    }

    public function recoverAccount()
    {
        if ($_POST) {
            error_reporting(0);
            $email = strtolower(strClean($_POST['correoRecover']));
            $token = token();
            $arrData = $this->getUserEmail($email, true);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Este usuario no existe');
            } else {
                $idpersona = $arrData['idpersona'];
                $nombreUsuario = $arrData['nombres'] . ' ' . $arrData['apellidos'];
                $url_recovery = base_url() . '/login/recuperar-cuenta/' . $email . '/' . $token;
                $updateToken = $this->setTokenUser($idpersona, $token, true);
                $dataUsuario = array(
                    'nombreUsuario' => $nombreUsuario,
                    'email' => $email,
                    'asunto' => 'Recuperar cuenta - ' . NOMBRE_REMITENTE,
                    'url_recovery' => $url_recovery
                );
                if ($updateToken) {
                    $sendEmail = sendEmail($dataUsuario, 'email_cambioPasswordCliente');
                    if ($sendEmail) {
                        $arrResponse = array('status' => true, 'msg' => 'Un correo se te ha enviado a tu cuenta de correo, para recuperar tu contraseña');
                    } else {
                        $arrResponse = array('status' => false, 'msg' => 'El proceso no es posible hacerlo ahora mismo, por favor intente más tarde...');
                    }
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'El proceso no es posible hacerlo ahora mismo, por favor intente más tarde...');
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function recuperar_cuenta(string $params)
    {
        if (isset($_SESSION['cliente-login'])) {
            header('location: ' . base_url() . '/perfil');
        }
        if (empty($params)) {
            header('location: ' . base_url());
        } else {
            $arrParams = explode(',', $params);
            $email = strClean($arrParams[0]);
            if (!isset($arrParams[1])) {
                header('location: ' . base_url());
            }
            $token = strClean($arrParams[1]);
            $arrResponse = $this->getUsuario($email, $token, true);
            if (empty($arrResponse)) {
                header('Location: ' . base_url());
            } else {
                $data['page_tag'] = 'Cambiar Contraseña';
                $data['page_title'] = 'Cambiar Contraseña';
                $data['page_name'] = 'cambiar-password';
                $data['page_functions_js'] = 'login.js';
                $data['email'] = $email;
                $data['token'] = $token;
                $data['idpersona'] = $arrResponse['idpersona'];

                $this->views->getView($this, 'cambiar_password', $data);
            }
        }
        die();
    }

    public function setPassword()
    {
        if ($_POST) {
            if (
                empty($_POST['idUsuario']) || empty($_POST['password']) ||
                empty($_POST['passwordConfirm']) || empty($_POST['email']) ||
                empty($_POST['token'])
            ) {
                $arrResponse = ['status' => false, 'msg' => 'Error de datos.'];
            } else {
                $intIdPersona = intval($_POST['idUsuario']);
                $password = $_POST['password'];
                $passwordConfirm = $_POST['password'];
                $strEmail = strClean($_POST['email']);
                $token = strClean($_POST['token']);

                if ($password != $passwordConfirm) {
                    $arrResponse = ['status' => false, 'msg' => 'La contraseñas no son iguales.'];
                } else {
                    $arrResponseUser = $this->getUsuario($strEmail, $token, true);
                    if (empty($arrResponseUser)) {
                        $arrResponse = ['status' => false, 'msg' => 'Error de datos.'];
                    } else {
                        $password = hash('SHA256', $password);
                        $requestPass = $this->insertPassword($intIdPersona, $password, true);
                        if ($requestPass) {
                            $arrResponse = ['status' => true, 'msg' => 'Contraseña actualizada correctamente.'];
                        } else {
                            $arrResponse = ['status' => true, 'msg' => 'No es posible hacer el proceso, por favor intenta más tarde...'];
                        }
                    }
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}