<?php

$_POST = $data;
$model = $data['model'];

if (empty($_POST['email']) || empty($_POST['password'])) {
    $arrResponse = ['status' => false, 'msg' => 'Error de datos.'];
} else {
    $usuario = strtolower(strclean($_POST['email']));
    $password = hash("SHA256", $_POST['password']);
    $requestUser = $model->userLogin($usuario, $password, true);
    if (empty($requestUser)) {
        $arrResponse = ['status' => false, 'msg' => 'El usuario o contraseña es incorrecta.'];
    } else {

        $idrol = $requestUser['idrol'];
        $status = $requestUser['status'];
        $idpersona = $requestUser['idpersona'];

        if ($idrol == RCLIENTES or $idrol == RAGENTES) {
            $_SESSION['idUser-cliente'] = $idpersona;
            $_SESSION['cliente-login'] = true;
            sessionUserCliente($_SESSION['idUser-cliente']);
            $arrResponse = ['status' => true, 'msg' => 'Ok.'];
        } else if ($status == 1) {
            $arrResponse = ['status' => false, 'msg' => 'No tienes permisos para entrar aquí.'];
        } else {
            $arrResponse = ['status' => false, 'msg' => 'Usuario inactivo.'];
        }
    }
}
echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);