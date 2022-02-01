<?php
class Permisos extends Controllers
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
	public function getPermisosRol(int $idrol)
	{
		if (!empty($_SESSION['permisosMod']['r'])) {
			$rolid = intval($idrol);
			if ($rolid > 0) {
				$arrModulos = $this->model->selectModulos();
				$arrPermisosRol = $this->model->selectPermisosRol($rolid);
				$arrPermisos = array('r' => 0, 'w' => 0, 'u' => 0, 'd' => 0);
				$arrPermisoRol = array('idrol' => $rolid);

				if (empty($arrPermisosRol)) {
					for ($i = 0; $i < count($arrModulos); $i++) {

						$arrModulos[$i]['permisos'] = $arrPermisos;
					}
				} else {
					for ($i = 0; $i < count($arrModulos); $i++) {
						$arrPermisos = array('r' => 0, 'w' => 0, 'u' => 0, 'd' => 0);
						if (isset($arrPermisosRol[$i])) {
							$arrPermisos = array(
								'r' => $arrPermisosRol[$i]['r'],
								'w' => $arrPermisosRol[$i]['w'],
								'u' => $arrPermisosRol[$i]['u'],
								'd' => $arrPermisosRol[$i]['d']
							);
						}
						$arrModulos[$i]['permisos'] = $arrPermisos;
					}
				}
				$arrPermisoRol['modulos'] = $arrModulos;
				$html = getFile('Template/modals/modalPermisos', $arrPermisoRol);
				$arrResponse = ['status' => true, 'html' => $html];
			} else {
				$arrResponse = ['status' => false, 'msg' => 'An error occurred...'];
			}

			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}

		die();
	}

	public function setPermisos()
	{
		if (!empty($_SESSION['permisosMod']['u'])) {
			if ($_POST) {
				$intIdrol = intval($_POST['idrol']);
				$modulos = $_POST['modulos'];
				$this->model->deletePermisos($intIdrol);

				foreach ($modulos as $modulo) {
					$idMdulo = $modulo['idmodulo'];
					$r = empty($modulo['r']) ? 0 : 1;
					$w = empty($modulo['w']) ? 0 : 1;
					$u = empty($modulo['u']) ? 0 : 1;
					$d = empty($modulo['d']) ? 0 : 1;
					$requestPermisos = $this->model->insertPermisos($intIdrol, $idMdulo, $r, $w, $u, $d);
				}
				if ($requestPermisos > 0) {
					$arrResponse = ['status' => true, 'msg' => 'Permissions assigned correctly.'];
				} else {
					$arrResponse = ['status' => false, 'msg' => 'Unable to assign permissions.'];
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}

		die();
	}
}