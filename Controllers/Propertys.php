<?php
class Propertys extends Controllers
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
        getPermisos(MPROPERTYS);
        parent::__construct();
    }


    public function Propertys()
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() . '/dashboard');
        }
        $data['page_tag'] = 'Propertys - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Propertys - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'propertys';
        $data['page_functions_js'] = 'propertys/propertys.js';
        $data['datatable'] = true;
        $data['jquery'] = true;
        $data['dashboard-dark'] = true;
        $data['selectpicker'] = true;

        $this->views->getView($this, 'propertys', $data);
    }

    public function getPropiedades()
    {
        if ($_SESSION['permisosMod']['r']) {
            $arrData = $this->model->getPropiedades();
            $arrDataCount = count($arrData);
            for ($i = 0; $i < $arrDataCount; $i++) {
                $idpropiedad = $arrData[$i]['idpropiedad'];
                if (!empty($arrData[$i]['portada'])) {
                    $urlPortada = media() . '/images/uploads/' . $arrData[$i]['portada'];
                    $arrData[$i]['portada'] = "
                    <img style='width: 170px;'
                        src='$urlPortada'
                    alt='Portada de: {$arrData[$i]['titulo']}'>
                    ";
                } else {
                    $arrData[$i]['portada'] = '<p>Without thumbnail</p>';
                }
                $thumnbailAward = media() . '/images/award.svg';
                $thumbnailPuertoRico = media() . '/images/puerto-rico.svg';
                $arrData[$i]['subtipo'] = !empty($arrData[$i]['subtipo']) ? ', ' . $arrData[$i]['subtipo'] : '';

                if (!empty($arrData[$i]['direccion_localizacion'])) {
                    $arrData[$i]['direccion_localizacion'] = "
                    <p>
                        <img style='width: 20px;' src='$thumbnailPuertoRico'
                        alt='puerto-rico'>
                        <small>{$arrData[$i]['direccion_localizacion']}</small>
                    </p>
                    ";
                }

                $arrData[$i]['titulo'] = "
                    <a href='#'>
                        <h5>
                            <img style='width: 20px;' src='$thumnbailAward' />
                            {$arrData[$i]['titulo']}
                        </h5>
                    </a>
                    <span class='badge badge-success'>Aprobado</span>
                    <br>
                    <p class='mb-2'>
                        <span class='font-weight-bold'>Tipo:</span>
                        <small>
                            {$arrData[$i]['tipo']}{$arrData[$i]['subtipo']} 
                        </small>
                    </p>
                    {$arrData[$i]['direccion_localizacion']}
                    
                ";

                $arrData[$i]['precio'] = formatMoney($arrData[$i]['precio']) . SMONEY;

                if ($arrData[$i]['statuspackage'] === 'Gratuito' || $arrData[$i]['statuspackage'] === 'Pagado') {
                    $arrData[$i]['statuspackage'] = "
                        <span class='badge badge-success'>{$arrData[$i]['statuspackage']}</span>
                ";
                } else {
                    $arrData[$i]['statuspackage'] = "
                    <span class='badge badge-danger'>{$arrData[$i]['statuspackage']}</span>
                ";
                }

                $btnEliminar = "
                    <button
                        onclick='deletePropiedad($idpropiedad)'
                        class='dropdown-item btn-outline-danger'>
                            <i class='bx bxs-trash'></i>
                        Delete
                    </button>
                ";

                $arrData[$i]['options'] = "
                <div class='d-flex justify-content-center'>
                    <div class='btn-group'>
                        <button type='button' class='btn btn-sm' style='border-radius: 50%;'
                            data-toggle='dropdown' aria-haspopup='false' aria-expanded='false'>
                        <i style='font-size: 20px;'
                            class='bx bx-dots-vertical text-info font-weight-bold'></i>
                        </button>
                        <div class='dropdown-menu'>
                            $btnEliminar
                        </div>
                    </div>
                </div>
                ";
            }

            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        }
    }


    public function delPropiedad()
    {
        if ($_POST) {
            $idpropiedad = intval($_POST['idPropiedad']);

            if ($idpropiedad) {
                $propiedad = $this->model->getPropiedad($idpropiedad, false);

                if (empty($propiedad)) {
                    $arrResponse = ['status' => false, 'msg' => 'This property no longer exists'];
                } else {
                    if (!empty($propiedad['imagenes'])) {
                        foreach ($propiedad['imagenes'] as $imagen) {
                            deleteFile($imagen['rutaimagen']);
                            $this->model->eliminarImagenPropiedad($imagen['id']);
                        }
                    }
                    $request_delete = $this->model->eliminarPropiedad($idpropiedad);
                    if ($request_delete) {
                        $arrResponse = ['status' => true, 'msg' => 'Property removed successfully.'];
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'An error has occurred...'];
                    }
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }
}