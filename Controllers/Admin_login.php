<?php
require 'Models/TAuth.php';
class Admin_login extends Controllers
{
    use TAuth;
    public function __construct()
    {
        if (empty($_SESSION)) {
            session_set_cookie_params(60 * 60 * 24 * 14);
            session_start();
        }
        parent::__construct();
    }

    public function Admin_login()
    {
        if (isset($_SESSION['admin-login'])) {
            header('location: ' . base_url() . '/dashboard');
        }
        $data['page_tag'] = 'Admin Login - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Admin Login - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'Admin Login';
        $data['page_functions_js'] = 'admin-login.js';
        $this->views->getView($this, 'login', $data);
    }

    public function reset_password()
    {
        if (isset($_SESSION['admin-login'])) {
            header('location: ' . base_url() . '/dashboard');
        }
        $data['page_tag'] = 'Reset Password - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Reset Password - ' . NOMBRE_EMPRESA;;
        $data['page_name'] = 'Admin Login';
        $data['page_functions_js'] = 'admin-login.js';
        $this->views->getView($this, 'reset-password', $data);
    }

    public function LoginUser()
    {
        if (!isset($_SESSION['admin-login'])) {
            if ($_POST) {
                if (empty($_POST['email']) || empty($_POST['password'])) {
                    $arrResponse = array('status' => false, 'msg' => 'Error de datos.');
                } else {
                    $usuario = strtolower(strclean($_POST['email']));
                    $password = hash("SHA256", $_POST['password']);
                    $requestUser = $this->userLogin($usuario, $password);
                    if (empty($requestUser)) {
                        $arrResponse = array('status' => false, 'msg' => 'The username or password is incorrect.');
                    } else {

                        $idrol = $requestUser['idrol'];
                        $status = $requestUser['status'];
                        $idpersona = $requestUser['idpersona'];

                        if ($idrol == RCLIENTES or $idrol == RAGENTES) {
                            $arrResponse = array('status' => false, 'msg' => 'You do not have permissions to enter here.');
                        } else if ($status == 1) {
                            $_SESSION['idUser-admin'] = $idpersona;
                            $_SESSION['admin-login'] = true;
                            sessionUserAdmin($_SESSION['idUser-admin']);
                            $arrResponse = array('status' => true, 'msg' => 'Ok.');
                        } else {
                            $arrResponse = array('status' => false, 'msg' => 'User inactive.');
                        }
                    }
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }

    public function resetPass()
    {
        if (!isset($_SESSION['admin-login'])) {
            if ($_POST) {
                error_reporting(0);
                if (empty($_POST['email'])) {
                    $arrResponse = array('status' => false, 'msg' => 'Data error.');
                } else {
                    $token = token();
                    $email = strtolower(strClean($_POST['email']));
                    $arrData = $this->getUserEmail($email);
                    if (empty($arrData)) {
                        $arrResponse = array('status' => false, 'msg' => 'This user does not exist');
                    } else {
                        $idpersona = $arrData['idpersona'];
                        $nombreUsuario = $arrData['nombres'] . ' ' . $arrData['apellidos'];
                        $url_recovery = base_url() . '/Admin-login/confirm-user/' . $email . '/' . $token;
                        $updateToken = $this->setTokenUser($idpersona, $token);
                        $dataUsuario = array(
                            'nombreUsuario' => $nombreUsuario,
                            'email' => $email,
                            'asunto' => 'Recover account - ' . NOMBRE_REMITENTE,
                            'url_recovery' => $url_recovery
                        );
                        if ($updateToken) {
                            $sendEmail = sendEmail($dataUsuario, 'email_cambioPasswordAdmin');

                            if ($sendEmail) {
                                $arrResponse = array('status' => true, 'msg' => 'An email has been sent to your email account, to change your password.');
                            } else {
                                $arrResponse = array('status' => false, 'msg' => 'The process is not possible right now, please try again later...');
                            }
                        } else {
                            $arrResponse = array('status' => false, 'msg' => 'The process is not possible right now, please try again later...');
                        }
                    }
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }

        die();
    }

    public function confirm_user(string $params)
    {
        if (isset($_SESSION['admin-login'])) {
            header('location: ' . base_url() . '/dashboard');
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
            $arrResponse = $this->getUsuario($email, $token);
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

    public function setPassword()
    {
        if (!isset($_SESSION['admin-login'])) {
            if ($_POST) {
                if (
                    empty($_POST['idUsuario']) || empty($_POST['password']) ||
                    empty($_POST['passwordConfirm']) || empty($_POST['email']) ||
                    empty($_POST['token'])
                ) {
                    $arrResponse = array('status' => false, 'msg' => 'Data error.');
                } else {
                    $intIdPersona = intval($_POST['idUsuario']);
                    $password = $_POST['password'];
                    $passwordConfirm = $_POST['passwordConfirm'];
                    $strEmail = strClean($_POST['email']);
                    $token = strClean($_POST['token']);

                    if ($password != $passwordConfirm) {
                        $arrResponse = array('status' => false, 'msg' => 'Passwords are not the same.');
                    } else {
                        $arrResponseUser = $this->getUsuario($strEmail, $token);
                        if (empty($arrResponseUser)) {
                            $arrResponse = array('status' => false, 'msg' => 'Data error.');
                        } else {
                            $password = hash('SHA256', $password);
                            $requestPass = $this->insertPassword($intIdPersona, $password);
                            if ($requestPass) {
                                $arrResponse = array('status' => true, 'msg' => 'Password updated successfully.');
                            } else {
                                $arrResponse = array('status' => true, 'msg' => 'Unable to complete the process, please try again later.');
                            }
                        }
                    }
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }
}