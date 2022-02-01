<?php
class Crear_listado extends Controllers
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


    public function Crear_listado()
    {

        $data['page_tag'] = 'Crear listado - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Crear listado - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'crear-listado';
        $data['jquery'] = true;
        $data['page_functions_js'] = 'crear-listado/crear-listado.js';

        if (!empty($_GET['listing_type'])) {
            $data['sortable'] = true;
            $data['selectpicker'] = true;
            $data['tinymce'] = true;
            $data['characteristics'] = $this->model->getCharacteristics();
            $data['tipos'] = $this->model->getTipos();
            $data['dropzone'] = true;
            $data['municipales'] = getMunicipales();
            $data['areascapitales'] = getAreasCapitales();
            if ($_GET['listing_type'] === 'listar') {
                $data['etiquetas'] = $this->model->getEtiquetas();
                $data['page_functions_js'] = 'crear-listado/listar.js';
                $data['packages'] = $this->model->getPackages('1,2,3');
                unset($data['tipos'][0]);
                sort($data['tipos']);
                $this->views->getView($this, 'listar', $data);
            } else if ($_GET['listing_type'] === 'anunciar') {
                $data['packages'] = $this->model->getPackages('2,3');
                $data['subtipo'] = $this->model->getSubtipo(1);
                $data['page_functions_js'] = 'crear-listado/anunciar.js';
                $this->views->getView($this, 'anunciar', $data);
            } else {
                header('Location: ' . base_url() . '/crear-listado');
            }
        } else {
            $this->views->getView($this, 'crear-listado', $data);
        }
    }

    public function getSubtipos($idtipo)
    {
        $idtipo = intval($idtipo);
        if ($idtipo > 0) {
            $arrData = $this->model->getSubtipos($idtipo);
            if (!empty($arrData)) {
                $arrResponse = ['status' => true, 'msg' => 'ok', 'data' => $arrData];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'No hay datos'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getFormFields($idsubtipo)
    {
        $idsubtipo = intval($idsubtipo);
        if ($idsubtipo > 0) {
            $arrData = $this->model->getSubtipo($idsubtipo);
            if (!empty($arrData)) {
                $html = getFile(
                    'Template/plantillas/PlantillaFormulariosCrearListados',
                    [
                        'formbuilder' => $arrData['formbuilder'],
                        'orden' => $arrData['ordern_enabled'],
                        'script' => true
                    ]
                );
                $arrResponse = ['status' => true, 'msg' => 'ok', 'html' => $html];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'No hay datos'];
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getPaquete($idpackage)
    {
        $idpackage = intval($idpackage);
        if ($idpackage) {
            $paquete = $this->model->getPackage($idpackage);
            if (!empty($paquete)) {
                echo getFile('Template/plantillas/paquetesCrearListado', $paquete);
            }
        }
        die();
    }

    public function nuevaPropiedad($listado)
    {
        if ($_POST) {
            if (empty($_POST['titulo']) || empty($_POST['precio']) || empty($_POST['tipo']) || empty($_POST['package'])) {
                $arrResponse = ['status' => false, 'msg' => 'Error de datos'];
            } else {
                $isCorrectListado = false;
                $package = !empty($_POST['package']) ? intval($_POST['package']) : 1;
                $statusPackage = '';
                if ($listado === 'Anunciar') {
                    if ($package == 2 || $package == 3) {
                        $isCorrectListado = true;
                        $statusPackage = 'No Pagado';
                    }
                } else if ($listado === 'Listar') {
                    if ($package == 1 || $package == 2 || $package == 3) {
                        $isCorrectListado = true;
                        if ($package == 1) {
                            $statusPackage = 'Gratuito';
                        } else {
                            $statusPackage = 'No Pagado';
                        }
                    }
                }

                if (!$isCorrectListado) {
                    $arrResponse = ['status' => false, 'msg' => 'Paquete no válido'];
                } else {
                    $personaid = intval($_SESSION['userData-cliente']['idpersona']);
                    $titulo = strClean($_POST['titulo']);
                    $contenido = strClean($_POST['contenido']);
                    $status = 1;
                    $listing_type = $listado;
                    $rutaPropiedad = strtolower(clear_cadena($titulo));
                    $rutaPropiedad = str_replace(' ', '-', $rutaPropiedad);
                    $precio = tofloat($_POST['precio']);
                    $tipo = intval($_POST['tipo']);
                    $subtipo = !empty($_POST['subtipo']) ? intval($_POST['subtipo']) : 1;
                    $etiqueta =
                        !empty($_POST['etiqueta']) ? json_encode(limpiarArray(array_unique($_POST['etiqueta']))) : '';
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
                    $imagenes = !empty($_FILES['file']) ? $_FILES['file'] : '';
                    if (!empty($documentoPdf)) {
                        $nombrePdf = $documentoPdf['name'];
                        $rutaPdf = $documentoPdf;
                        $extensionPdf = pathinfo($nombrePdf, PATHINFO_EXTENSION);
                        if ($nombrePdf !== '' && $extensionPdf === 'pdf') {
                            $documentoPdf = getImgName('PROPIEDAD-PDF', $extensionPdf);
                        } else {
                            $documentoPdf = '';
                        }
                    }

                    $request = $this->model->insertPropiedad(
                        $personaid,
                        $package,
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
                        $statusPackage,
                        $listing_type
                    );

                    if ($request) {
                        $idpropiedad = $request;
                        $url = '/mis-propiedades/';
                        if ($statusPackage === 'No Pagado') {
                            $url = "/crear-listado/pagar-propiedad/$idpropiedad/$rutaPropiedad";
                        }
                        $arrResponse = [
                            'status' => true,
                            'msg' => 'Propiedad creada correctamente',
                            'url' => base_url() . $url
                        ];
                        if ($nombrePdf !== '' && $extensionPdf === 'pdf' && $documentoPdf !== '') {
                            uploadImageNoCompress($rutaPdf, $documentoPdf);
                        }
                        if (!empty($imagenes['name'])) {
                            foreach ($imagenes['name'] as $key => $value) {
                                $file = [
                                    'name' => $imagenes['name'][$key],
                                    'type' => $imagenes['type'][$key],
                                    'tmp_name' => $imagenes['tmp_name'][$key],
                                    'error' => $imagenes['error'][$key],
                                    'size' => $imagenes['size'][$key],
                                ];
                                $nombreImagen = getImgName('PROPIEDAD-IMAGEN');
                                $insertImagen = uploadImageNoCompress($file, $nombreImagen);
                                if ($insertImagen) {
                                    $this->model->insertImagen($idpropiedad, $nombreImagen);
                                }
                            }
                        }
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error'];
                    }
                }
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function pagar_propiedad($params)
    {
        if (empty($params)) {
            header('Location: ' . base_url() . '/mis-propiedades');
        }

        $arrParams = explode(',', $params);
        if (empty($arrParams[0]) || empty($arrParams[1])) {
            header('Location: ' . base_url() . '/mis-propiedades');
        }
        $idpropiedad = $arrParams[0];
        $nombreRutaPropiedad = $arrParams[1];
        $idpersona = $_SESSION['userData-cliente']['idpersona'];
        $propiedad = $this->model->getPropiedadByRout($idpropiedad, $nombreRutaPropiedad, $idpersona);

        if (empty($propiedad)) {
            header('Location: ' . base_url() . '/mis-propiedades');
        }

        if ($propiedad['idpackage'] == 1) {
            header('Location: ' . base_url() . '/mis-propiedades');
        }

        $data['page_tag'] = 'Pagar Listado - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Pagar Listado - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'pagar-listado';
        //$data['page_functions_js'] = 'dashboard.js';
        $data['propiedad'] = $propiedad;
        $data['jquery'] = true;
        $this->views->getView($this, 'pagar_propiedad', $data);
    }

    public function procesarpago()
    {

        if ($_POST) {

            function ErrorHandler($e, $knownError = false, $object)
            {
                /* 
                echo 'Status is:' . $e->getHttpStatus() . '\n';
                echo 'Type is:' . $e->getError()->type . '\n';
                echo 'Code is:' . $e->getError()->code . '\n';
                // param is '' in this case
                echo 'Param is:' . $e->getError()->param . '\n';
                echo 'Message is:' . $e->getError()->message . '\n';  */
                $data['error'] = $e;
                $data['knownError'] = $knownError;
                $data['page_tag'] = 'Pago Procesado Error - ' . NOMBRE_EMPRESA;
                $data['page_title'] = 'Pago Procesado Error - ' . NOMBRE_EMPRESA;
                $data['page_name'] = 'pago-procesado-error';
                $object->views->getView($object, 'procesarpago', $data);
            }
            if (!empty($_POST['stripeToken'])) {
                try {
                    $token = $_POST['stripeToken'];
                    $pay_ammount = intval($_POST['pay_ammount']) * 100;
                    $propiedadID = intval($_POST['propiedadID']);
                    $idpersona = intval($_SESSION['userData-cliente']['idpersona']);
                    $stripeBillingName = strClean($_POST['stripeBillingName']);
                    $stripeBillingAddressLine1 = strClean($_POST['stripeBillingAddressLine1']);
                    $stripeBillingAddressZip = strClean($_POST['stripeBillingAddressZip']);
                    $stripeBillingAddressCity = strClean($_POST['stripeBillingAddressCity']);
                    $stripeBillingAddressCountry = strClean($_POST['stripeBillingAddressCountry']);
                    $stripeBillingAddressCountryCode = strClean($_POST['stripeBillingAddressCountryCode']);
                    $dataJsonStripe = \Stripe\Charge::create([
                        "amount" => $pay_ammount,
                        "currency" => "USD",
                        "description" => 'Pago de propiedad para listar en PrSeconecta',
                        "source" => $token,
                    ]);
                    $this->model->insertPayment(
                        $propiedadID,
                        $idpersona,
                        $stripeBillingName,
                        $stripeBillingAddressLine1,
                        $stripeBillingAddressZip,
                        $stripeBillingAddressCity,
                        $stripeBillingAddressCountry,
                        $stripeBillingAddressCountryCode,
                        $dataJsonStripe
                    );
                    $data['page_tag'] = 'Pago Procesado  - ' . NOMBRE_EMPRESA;
                    $data['page_title'] = 'Pago Procesado - ' . NOMBRE_EMPRESA;
                    $data['page_name'] = 'pago-procesado';
                    $this->views->getView($this, 'procesarpago', $data);
                } catch (\Stripe\Exception\CardException $e) {
                    // Since it's a decline, \Stripe\Exception\CardException will be caught
                    ErrorHandler($e, true, $this);
                } catch (\Stripe\Exception\ApiConnectionException $e) {
                    ErrorHandler($e, true, $this);
                } catch (Exception $e) {
                    ErrorHandler($e, false, $this);
                }
            } else {
                echo 'Datos invalidos';
            }
        } else {
            header('Location: ' . base_url() . '/mis-propiedades');
        }
        die();
    }
}