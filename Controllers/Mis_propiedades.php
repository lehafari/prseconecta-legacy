<?php
class Mis_propiedades extends Controllers
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


    public function Mis_propiedades()
    {
        $idpersona = $_SESSION['userData-cliente']['idpersona'];
        $data['page_tag'] = 'Mis Propiedades - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Mis Propiedades - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'propiedades';
        $data['page_functions_js'] = 'propiedades.js';
        $data['datatable'] = true;
        $data['jquery'] = true;
        $data['propiedades'] = $this->model->getPropiedades($idpersona);
        $this->views->getView($this, 'propiedades', $data);
    }

    public function delPropiedad()
    {
        if ($_POST) {
            $idpropiedad = str_replace(' ', '+', trim($_POST['idPropiedad']));
            $idpropiedad = openssl_decrypt($idpropiedad, METHODENCRIPT, KEY);
            $idpropiedad = intval($idpropiedad);

            if ($idpropiedad) {
                $idpersona = $_SESSION['userData-cliente']['idpersona'];
                $propiedad = $this->model->getPropiedad($idpropiedad, $idpersona, false);

                if (empty($propiedad)) {
                    $arrResponse = ['status' => false, 'msg' => 'Esta propiedad ya no existe'];
                } else {
                    if (!empty($propiedad['imagenes'])) {
                        foreach ($propiedad['imagenes'] as $imagen) {
                            deleteFile($imagen['rutaimagen']);
                            $this->model->eliminarImagenPropiedad($imagen['id']);
                        }
                    }
                    $request_delete = $this->model->eliminarPropiedad($idpropiedad);
                    if ($request_delete) {
                        $arrResponse = ['status' => true, 'msg' => 'Propiedad eliminada correctamente.'];
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error...'];
                    }
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function setStatus()
    {
        if ($_POST) {
            if (!empty($_POST['status']) || !empty($_POST['idp'])) {
                $status = intval($_POST['status']);
                $idpropiedad = intval($_POST['idp']);
                $idpersona = intval($_SESSION['userData-cliente']['idpersona']);
                $request = $this->model->cambiarEstadoPropiedad($status, $idpropiedad, $idpersona);
                if ($request) {
                    $arrResponse = ['status' => true, 'msg' => 'Dato actualizado correctamente'];
                } else {
                    $arrResponse = ['status' => true, 'msg' => 'Ha ocurrido un error'];
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function editar($idpropiedad)
    {
        $idpropiedad = intval($idpropiedad);
        if ($idpropiedad) {
            $idpersona = $_SESSION['userData-cliente']['idpersona'];
            $propiedad = $this->model->getPropiedad($idpropiedad, $idpersona);
            if (!empty($propiedad)) {
                $data['page_tag'] = 'Editar Listado';
                $data['page_title'] = 'Editar Listado';
                $data['page_name'] = 'propiedades';
                $data['page_functions_js'] = 'editar-propiedad.js';
                $data['jquery'] = true;
                $data['propiedad'] = $propiedad;
                $data['sortable'] = true;
                $data['selectpicker'] = true;
                $data['tinymce'] = true;
                $data['characteristics'] = $this->model->getCharacteristics();
                $data['tipos'] = $this->model->getTipos();
                $data['dropzone'] = true;
                $data['municipales'] = getMunicipales();
                $data['areascapitales'] = getAreasCapitales();
                $paquete = $this->model->getPackage($propiedad['packageid']);
                $paquete['valores'] = $propiedad;
                $htmlPaquete = getFile('Template/plantillas/paquetesCrearListado', $paquete);
                $data['htmlPaquete'] = $htmlPaquete;
                if ($propiedad['listing_type'] === 'Listar') {
                    $data['etiquetas'] = $this->model->getEtiquetas();
                }
                $this->views->getView($this, 'editar', $data);
            } else {
                header('Location: ' . base_url() . '/mis-propiedades');
            }
        } else {
            header('Location: ' . base_url() . '/mis-propiedades');
        }
    }

    public function getFilesProperty($idpropiedad)
    {
        $idpropiedad = intval($idpropiedad);
        if ($idpropiedad) {
            $idpersona = intval($_SESSION['userData-cliente']['idpersona']);
            $propiedad = $this->model->getPropiedad($idpropiedad, $idpersona);
            $imagenes = $propiedad['imagenes'];
            $target_dir = "Assets/images/uploads";
            $file_list = array();
            if (!empty($imagenes)) {
                foreach ($imagenes as $imagen) {
                    $rutaImagen = "$target_dir/{$imagen['rutaimagen']}";
                    if (file_exists($rutaImagen)) {
                        $size = filesize($rutaImagen);
                        $file_list[] = array('name' => 'imagen', 'size' => $size, 'path' => $rutaImagen);
                    }
                }
                $arrResponse = ['status' => true, 'msg' => 'ok', 'file_list' => $file_list];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'No hay imagenes subidas'];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function delFile()
    {
        if ($_POST) {
            $idpropiedad = str_replace(' ', '+', trim($_POST['idpropiedad']));
            $idpropiedad = openssl_decrypt($_POST['idpropiedad'], METHODENCRIPT, KEY);
            $idpropiedad = intval($idpropiedad);
            $imgid = intval($_POST['file']);
            if ($imgid && $idpropiedad) {
                $idpersona = intval($_SESSION['userData-cliente']['idpersona']);
                $propiedad = $this->model->getPropiedad($idpropiedad, $idpersona);
                if (empty($propiedad['imagenes']) || count($propiedad['imagenes']) === 1) {
                    $arrResponse = ['status' => false, 'msg' => 'Minimo tiene que haber una imágen por propiedad'];
                } else {
                    $imagen = $this->model->selectImagen($imgid);
                    if (!empty($imagen)) {
                        deleteFile($imagen['rutaimagen']);
                        $this->model->eliminarImagenPropiedad($imgid);
                        $arrResponse = ['status' => true, 'msg' => 'Imágen eliminada con éxito'];
                    } else {
                        $arrResponse = ['status' => true, 'msg' => 'La imágen ya no existe'];
                    }
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function uploadFile()
    {
        if ($_POST) {
            $idpropiedad = str_replace(' ', '+', trim($_POST['idpropiedad']));
            $idpropiedad = openssl_decrypt($_POST['idpropiedad'], METHODENCRIPT, KEY);
            $idpropiedad = intval($idpropiedad);
            if ($idpropiedad) {
                $imagen = $_FILES['file'];
                if (!empty($imagen['name'])) {
                    $nombreImagen = getImgName('PROPIEDAD-IMAGEN');
                    $insertImagen = uploadImageNoCompress($imagen, $nombreImagen);
                    if ($insertImagen) {
                        $request_insert = $this->model->insertImagen($idpropiedad, $nombreImagen);
                        $arrResponse = ['status' => true, 'msg' => 'Imágenes subidas correctamente.', 'idimagen' => $request_insert];
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error'];
                    }
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error'];
                }
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error, por favor recargue la página'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    public function editarPropiedad()
    {
        if ($_POST) {
            if (
                empty($_POST['titulo']) || empty($_POST['precio'])
                || empty($_POST['tipo']) || empty($_POST['idpropiedad'])
            ) {
                $arrResponse = ['status' => false, 'msg' => 'Error de datos'];
            } else {
                $idpropiedad = str_replace(' ', '+', trim($_POST['idpropiedad']));
                $idpropiedad = openssl_decrypt($_POST['idpropiedad'], METHODENCRIPT, KEY);
                $idpropiedad = intval($idpropiedad);
                if ($idpropiedad) {
                    $personaid = intval($_SESSION['userData-cliente']['idpersona']);
                    $titulo = strClean($_POST['titulo']);
                    $contenido = strClean($_POST['contenido']);
                    $status = 1;
                    $rutaPropiedad = strtolower(clear_cadena($titulo));
                    $rutaPropiedad = str_replace(' ', '-', $rutaPropiedad);
                    $precio = tofloat($_POST['precio']);
                    $tipo = intval($_POST['tipo']);
                    $subtipo = !empty($_POST['subtipo']) ? intval($_POST['subtipo']) : 1;
                    $etiqueta = !empty($_POST['etiqueta']) ? json_encode(limpiarArray(array_unique($_POST['etiqueta']))) : '';
                    $formBuilder =
                        !empty($_POST['formBuilder']) ? json_encode(limpiarArray($_POST['formBuilder'])) : '';
                    $caracteristicas =
                        !empty($_POST['caracteristicas']) ? json_encode(limpiarArray($_POST['caracteristicas'])) : '';
                    $detallesAdicionales =
                        !empty($_POST['detallesAdicionales']) ? json_encode(limpiarArray($_POST['detallesAdicionales'])) : '';
                    $videoLink =
                        !empty($_POST['videoLink']) ? strClean($_POST['videoLink']) : '';
                    $audioVideoLink =
                        !empty($_POST['audioVideoLink']) ? strClean($_POST['audioVideoLink']) : '';
                    $tour360Link = !empty($_POST['tour360Link']) ? strClean($_POST['tour360Link']) : '';
                    $direccion_localizacion =
                        !empty($_POST['direccion-localizacion']) ? strClean($_POST['direccion-localizacion']) : '';
                    $codigopostal_localizacion =
                        !empty($_POST['codigopostal-localizacion']) ? strClean($_POST['codigopostal-localizacion']) : '';
                    $areacapital_localizacion =
                        !empty($_POST['areacapital-localizacion']) ? strClean($_POST['areacapital-localizacion']) : 0;
                    $municipal_localizacion =
                        !empty($_POST['municipal-localizacion']) ? strClean($_POST['municipal-localizacion']) : 0;
                    $latitud_mapa =
                        !empty($_POST['latitud-mapa']) ? strClean($_POST['latitud-mapa']) : 0;
                    $longitud_mapa =
                        !empty($_POST['longitud-mapa']) ? strClean($_POST['longitud-mapa']) : 0;
                    $vistacalle_mapa = intval($_POST['vistacalle-mapa']);
                    $documentoPdf = !empty($_FILES['documentoPdf']) ? $_FILES['documentoPdf'] : '';
                    $nombrePdf = '';
                    $extensionPdf = '';
                    $rutaPdf = '';
                    if (!empty($documentoPdf)) {
                        $nombrePdf = $documentoPdf['name'];
                        $rutaPdf = $documentoPdf;
                        $extensionPdf = pathinfo($nombrePdf, PATHINFO_EXTENSION);
                        if ($nombrePdf !== '' && $extensionPdf === 'pdf') {
                            $documentoPdf = getImgName('PROPIEDAD-PDF', $extensionPdf);

                            $propiedad = $this->model->getPropiedad($idpropiedad, $personaid, false);
                            if (!empty($propiedad['documentoPdf'])) {
                                deleteFile($propiedad['documentoPdf']);
                            }
                        } else {
                            $documentoPdf = '';
                        }
                    }

                    $request = $this->model->updatePropiedad(
                        $personaid,
                        $titulo,
                        $contenido,
                        $rutaPropiedad,
                        $precio,
                        $tipo,
                        $subtipo,
                        $etiqueta,
                        $formBuilder,
                        $caracteristicas,
                        $detallesAdicionales,
                        $videoLink,
                        $audioVideoLink,
                        $tour360Link,
                        $direccion_localizacion,
                        $codigopostal_localizacion,
                        $areacapital_localizacion,
                        $municipal_localizacion,
                        $latitud_mapa,
                        $longitud_mapa,
                        $vistacalle_mapa,
                        $documentoPdf,
                        $status,
                        $idpropiedad
                    );



                    if ($request) {
                        $arrResponse = [
                            'status' => true,
                            'msg' => 'Propiedad actualizada correctamente',
                        ];
                        if ($nombrePdf !== '' && $extensionPdf === 'pdf' && $documentoPdf !== '') {
                            uploadImageNoCompress($rutaPdf, $documentoPdf);
                        }
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error'];
                    }
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error'];
                }
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }
    public function destacar_propiedad($idpropiedad)
    {
        if (empty($idpropiedad)) {
            header('Location: ' . base_url() . '/mis-propiedades');
        }
        $idpropiedad = intval($idpropiedad);
        $personaid = intval($_SESSION['userData-cliente']['idpersona']);

        $propiedad = $this->model->getPropiedad($idpropiedad, $personaid, false);
        if (empty($propiedad)) {
            header('Location: ' . base_url() . '/mis-propiedades');
        }
        if ($propiedad['packageid'] != PAQUETE_REGULAR_GRATUITO) {
            header('Location: ' . base_url() . '/mis-propiedades');
        }

        $data['propiedad'] = $propiedad;
        $data['page_tag'] = 'Editar Listado';
        $data['page_title'] = 'Editar Listado';
        $data['page_name'] = 'propiedades';
        $data['page_functions_js'] = 'propiedades.js';
        $data['jquery'] = true;
        $data['packages'] = $this->model->getPackages(PAQUETE_DESTACADO . ',' . PAQUETE_SUPER_DESTACADO);
        $this->views->getView($this, 'destacar-propiedad', $data);
    }

    public function setNewPackage()
    {
        if ($_POST) {
            if (!empty($_POST['package']) && !empty($_POST['idpropiedad'])) {
                $idpackage = intval($_POST['package']);
                $idpropiedad = intval($_POST['idpropiedad']);
                $personaid = intval($_SESSION['userData-cliente']['idpersona']);

                $propiedad = $this->model->getPropiedad($idpropiedad, $personaid, false);

                if ($propiedad['packageid'] == PAQUETE_REGULAR_GRATUITO) {
                    $request = $this->model->setNewPackage($idpackage, $idpropiedad, $personaid);

                    if ($request) {
                        $arrResponse = [
                            'status' => true, 'msg' => 'Propiedad destacada correctamente.',
                            'url_redirect' => base_url() . "/crear-listado/pagar-propiedad/$idpropiedad/{$propiedad['ruta']}"
                        ];
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error...'];
                    }
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error...'];
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }
}