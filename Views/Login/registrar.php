<?php

if (!$_SESSION) {
  session_set_cookie_params(60 * 60 * 24 * 14);
  session_start();
}

$_POST = $data;
$model = $data['model'];

$username = strClean($_POST['username']);
$nombres = strClean($_POST['nombres']);
$apellidos = strClean($_POST['apellidos']);
$email = strClean($_POST['emailRegister']);
$password = strClean($_POST['passwordRegister']);
$passwordConfirm = strClean($_POST['passwordRegisterConfirm']);
$rolid = intval($_POST['rolRegister']);
$status = 1;
$ruta = strtolower(clear_cadena($username));
$ruta = str_replace(' ', '-', $ruta);

if ($password !== $passwordConfirm) {
  $arrResponse = ['status' => false, 'msg' => 'Las contraseñas no son iguales.'];
} else {
  $password = hash("SHA256", $password);
  $request = $model->registarCliente(
    $ruta,
    $username,
    $nombres,
    $apellidos,
    $email,
    $password,
    $rolid,
    $status
  );


  if ($request === 'exist email') {
    $arrResponse = ['status' => false, 'msg' => 'Este correo ya existe, por favor elija otro.'];
  } else if ($request === 'exist user') {
    $arrResponse = ['status' => false, 'msg' => 'Este usuario ya existe, por favor elija otro.'];
  } else if ($request > 0) {
    $arrResponse = ['status' => true, 'msg' => '¡Te has registrado correctamente!'];
    $_SESSION['idUser-cliente'] = $request;
    $_SESSION['cliente-login'] = true;
    sessionUserCliente($request);
  } else {
    $arrResponse = ['status' => false, 'msg' => 'Ocurrió un error, intente más tarde.'];
  }
}
echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);