<?php
class Settings extends Controllers
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
        getPermisos(MCONFIGURACION);
        parent::__construct();
    }

    /* MAIN PAGE */
    public function Settings()
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() . '/dashboard');
        }

        $data['page_tag'] = 'Settings - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Settings - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'settings';
        $data['dashboard-dark'] = true;
        $data['page_functions_js'] = 'options/settings.js';
        $data['jquery'] = true;
        $data['sortable'] = true;
        $data['tags'] = $this->model->getTags();
        $data['orden'] = $this->model->getOrden(2);
        $this->views->getView($this, 'settings', $data);
    }

    public function getTag($idtag)
    {
        if (!empty($_SESSION['permisosMod']['r'])) {
            $idtag = intval($idtag);
            $data = $this->model->getTag($idtag);
            if (empty($data)) {
                $arrResponse = ['status' => false, 'msg' => 'Data not found'];
            } else {
                $arrResponse = ['status' => true, 'msg' => 'ok', 'data' => $data];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function insertTag()
    {
        if ($_POST) {
            $request = '';
            if (!empty($_SESSION['permisosMod']['w'])) {
                $title = strClean($_POST['title']);
                $request = $this->model->insertTag($title);
            }

            if ($request > 0) {
                $data = $this->model->getTag($request);
                $html = getFile('Template/plantillas/plantillaTag', $data);
                $arrResponse = ['status' => true, 'msg' => 'Data saved correctly', 'html' => $html];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'An error ocurred...'];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function editTag()
    {
        if ($_POST) {
            $request = '';
            if (!empty($_SESSION['permisosMod']['u'])) {
                $title = strClean($_POST['title']);
                $idtag = strClean($_POST['idtag']);
                $request = $this->model->editTag($idtag, $title);
            }

            if ($request > 0) {
                $arrResponse = ['status' => true, 'msg' => 'Data updated correctly'];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'An error ocurred...'];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function delTag()
    {
        if ($_POST) {
            if ($_SESSION['permisosMod']['d'] == 1) {
                $idtag = intval($_POST['idtag']);
                $requestDelete = $this->model->delTag($idtag);
                if ($requestDelete == 'ok') {
                    $arrResponse = ['status' => true, 'msg' => 'Tag has been deleted.'];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Failed to delete agent.'];
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }

    public function setOrder()
    {
        if ($_POST) {
            $idtabla = 2;
            $column = strClean($_POST['name']);
            $orden = strClean($_POST['orden']);
            $status = intval($_POST['status']);
            $this->model->setOrden($idtabla, $column, $orden, $status);
        }
    }

    /* STRAT MODULO PAGINAS */
    public function pages()
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() . '/dashboard');
        }
        $data['page_tag'] = 'Pages - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Pages - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'settings';
        $data['page_functions_js'] = 'options/pages.js';
        $data['datatable'] = true;
        $data['jquery'] = true;
        $data['dashboard-dark'] = true;
        $this->views->getView($this, 'pages', $data);
    }

    public function editpage($idpage)
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() . '/dashboard');
        }

        $idpage = intval($idpage);


        $page = getInfoPage($idpage);

        if (empty($page)) {
            header('Location: ' . base_url() . '/settings/pages');
        }

        if (!empty($page['imagen'])) {
            $rutafile = 'Assets/images/uploads/' . $page['imagen'];
            if (file_exists($rutafile)) {
                $filesize = filesize($rutafile);
                $page['filesize'] = $filesize;
            }
        }
        $data['page'] = $page;

        $data['page_tag'] = 'Edit Page - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Edit Page - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'settings';
        $data['page_functions_js'] = 'options/pages.js';
        $data['dashboard-dark'] = true;
        $data['tinymce'] = true;
        $data['fileinput'] = true;
        $data['jquery'] = true;
        $this->views->getView($this, 'editpage', $data);
    }

    public function editInfoPage()
    {
        if ($_POST) {
            $idpage = intval($_POST['idpage']);
            $titulo = strClean($_POST['titulo']);
            $contenido = !empty($_POST['contenido']) ? strClean($_POST['contenido']) : '';
            $foto            = $_FILES['file'];
            $nombre_foto     = $foto['name'];

            $request = '';
            $imgPortada = '';
            if (!empty($nombre_foto)) {
                $extension = explode(".", $nombre_foto);
                $extension = '.' . strtolower(array_pop($extension));
                $basename = substr($nombre_foto, 0, strrpos($nombre_foto, "."));

                $nombre_foto_time = $basename . time() . passGenerator(5);
                $imgPortada = "pages/$nombre_foto_time.$extension";
            } else {
                if ($_POST['foto_actual'] != '' && $_POST['foto_remove'] == 0) {
                    $imgPortada = $_POST['foto_actual'];
                }
            }

            $request = $this->model->updatePage($idpage, $titulo, $contenido, $imgPortada);

            if ($request > 0) {
                $arrResponse = ['status' => true, 'msg' => 'Page Updated Successfully'];
                if ($nombre_foto !== '') {
                    uploadImageNoCompress($foto, $imgPortada);
                }
                if (($nombre_foto === '' && $_POST['foto_remove'] == 1
                        && $_POST['foto_actual'] !== '')
                    || ($nombre_foto !== '' && $_POST['foto_actual'] !== '')
                ) {
                    deleteFile($_POST['foto_actual']);
                }
            } else {
                $arrResponse = ['status' => false, 'msg' => 'An error has occurred'];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getPages()
    {
        if (!empty($_SESSION['permisosMod']['r'])) {
            $arrData = $this->model->selectPages();
            $count = count($arrData);
            $media = media();

            for ($i = 0; $i < $count; $i++) {

                $idpage = $arrData[$i]['idpage'];

                if (empty($arrData[$i]['imagen'])) {
                    $arrData[$i]['imagen'] = '<i style="font-size: 50px" class="bx bxs-image bx-tada-hover text-primary"></i>';
                } else {
                    $arrData[$i]['imagen'] = "<img style='width: 150px;' src='$media/images/uploads/{$arrData[$i]['imagen']}' alt='Imagen'/>";
                }

                $urlEditPage = base_url() . '/settings/editpage/' . $idpage;
                $btnEdit = "<a href='$urlEditPage' class='btn btn-secondary bx-tada-hover'>
                <i class='bx bxs-pencil ' ></i>
                </a>";

                $arrData[$i]['options'] = '
                    <div class="text-center">
                    ' . $btnEdit . '
                </div>';
            }

            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        }
    }

    /* END MODULO PAGINAS */

    /* START MODULO PACKAGES */

    public function packages()
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() . '/dashboard');
        }
        $data['page_tag'] = 'Packages - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Packages - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'packages';
        //$data['page_functions_js'] = 'options/pages.js';
        $data['jquery'] = true;
        $data['packages'] = $this->model->getPackages();
        $data['dashboard-dark'] = true;
        $data['sortable'] = true;
        $this->views->getView($this, 'packages', $data);
    }

    public function editpackage($idpackage)
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() . '/dashboard');
        }

        $idpackage = intval($idpackage);


        $package = $this->model->getPackage($idpackage);

        if (empty($package)) {
            header('Location: ' . base_url() . '/settings/packages');
        }

        $data['package'] = $package;

        $data['page_tag'] = 'Edit Package - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Edit Package - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'settings';
        $data['page_functions_js'] = 'options/packages.js';
        $data['dashboard-dark'] = true;
        $data['jquery'] = true;
        $data['sortable'] = true;
        $this->views->getView($this, 'editpackage', $data);
    }

    public function updatePackage()
    {
        if ($_POST) {
            $idpackage = intval($_POST['idpackage']);
            $titulo = strClean($_POST['titulo']);
            $packageType = strClean($_POST['packagetype']);
            $billingPeriod = strClean($_POST['billingperiod']);
            $billingFrequency = intval($_POST['billingfrequency']);
            $listingsIncluded = intval($_POST['listingsincluded']);
            $packagePriceListings = intval($_POST['packagepricelistings']);
            $packagePriceAds = intval($_POST['packagepriceads']);
            $package_stripe_id = strClean($_POST['packagestripeid']);
            $imagesperlisting = intval($_POST['imagesperlisting']);
            $orden = strClean($_POST['orden']);
            $featuredListingsIncluded = intval($_POST['featuredlistingsincluded']);

            $packageInformation = !empty($_POST['package-information']) ? $_POST['package-information'] : [];
            sort($packageInformation);
            $packageInformation = json_encode($packageInformation, JSON_UNESCAPED_UNICODE);
            $request = $this->model->setPackage(
                $idpackage,
                $titulo,
                $packageType,
                $billingPeriod,
                $billingFrequency,
                $listingsIncluded,
                $featuredListingsIncluded,
                $packagePriceListings,
                $packagePriceAds,
                $package_stripe_id,
                $imagesperlisting,
                $packageInformation,
                $orden
            );

            if ($request) {
                $arrResponse = ['status' => true, 'msg' => 'Data saved correctly.'];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'There was an error...'];
            }


            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function areacapital_municipal()
    {
        $data['page_tag'] = 'Area capital | Municipal - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Area capital | Municipal - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'settings';
        $data['page_functions_js'] = 'options/areacapital-municipal.js';
        $data['dashboard-dark'] = true;
        $data['datatable'] = true;
        $data['jquery'] = true;
        $this->views->getView($this, 'areacapital-municipal', $data);
    }

    public function getMunicipales()
    {
        if (!empty($_SESSION['permisosMod']['r'])) {
            $arrData = $this->model->selectMunicipales();
            $count = count($arrData);
            for ($i = 0; $i < $count; $i++) {

                $btnEdit = "<button onclick='editInfoMunicipio({$arrData[$i]['idmunicipal']})' 
                class='btn btn-primary'>
                    <i class='bx bxs-pencil' ></i>
                </button>";

                $btnDelete = "<button onclick='deleteInfoMunicipio({$arrData[$i]['idmunicipal']})'  
                class='btn btn-danger'>
                    <i class='bx bx-trash'></i>
                </button>";

                $arrData[$i]['options'] = '
                    <div class="text-center">
                    ' . $btnEdit . '
                    ' . $btnDelete . '
                </div>';
            }

            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        }
    }

    public function getMunicipal($idmunicipal)
    {
        if (!empty($_SESSION['permisosMod']['r'])) {
            $idmunicipal = intval($idmunicipal);
            $data = $this->model->getMunicipal($idmunicipal);
            if (empty($data)) {
                $arrResponse = ['status' => false, 'msg' => 'Data not found'];
            } else {
                $arrResponse = ['status' => true, 'msg' => 'ok', 'data' => $data];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function delAreaCapital()
    {
        if ($_POST) {
            $idareacapital = intval($_POST['idareacapital']);
            if ($idareacapital) {
                $request = $this->model->delAreaCapital($idareacapital);
                if (!empty($request)) {
                    $arrResponse = ['status' => true, 'msg' => 'Data deleted correctly.'];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Data not found'];
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function setMunicipal()
    {
        if ($_POST) {
            $tituloMunicipal = strClean($_POST['tituloMunicipal']);
            $idmunicipal = intval($_POST['idmunicipal']);

            if ($idmunicipal) {
                $request = $this->model->updateMunicipal($idmunicipal, $tituloMunicipal);
            } else {
                $request = $this->model->insertMunicipal($tituloMunicipal);
            }

            if ($request) {
                if ($idmunicipal) {
                    $arrResponse = ['status' => true, 'msg' => 'Data updated correctly.'];
                } else {
                    $arrResponse = ['status' => true, 'msg' => 'Data saved correctly.'];
                }
            } else {
                $arrResponse = ['status' => false, 'msg' => 'An error has ocurred.'];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function getAreasCapitales()
    {
        if (!empty($_SESSION['permisosMod']['r'])) {
            $arrData = $this->model->selectAreaCapitales();
            $count = count($arrData);
            for ($i = 0; $i < $count; $i++) {

                $btnEdit = "<button onclick='editInfoAreaCapital({$arrData[$i]['idareacapital']})' 
                class='btn btn-primary'>
                    <i class='bx bxs-pencil' ></i>
                </button>";

                $btnDelete = "<button onclick='deleteInfoAreaCapital({$arrData[$i]['idareacapital']})'  
                class='btn btn-danger'>
                    <i class='bx bx-trash'></i>
                </button>";

                $arrData[$i]['options'] = '
                    <div class="text-center">
                    ' . $btnEdit . '
                    ' . $btnDelete . '
                </div>';
            }

            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        }
    }

    public function getAreasCapital($idareacapital)
    {
        if (!empty($_SESSION['permisosMod']['r'])) {
            $idareacapital = intval($idareacapital);
            $data = $this->model->getAreasCapital($idareacapital);
            if (empty($data)) {
                $arrResponse = ['status' => true, 'msg' => 'Data deleted correctly.'];
            } else {
                $arrResponse = ['status' => true, 'msg' => 'ok', 'data' => $data];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function setAreaCapital()
    {
        if ($_POST) {
            $tituloAreaCapital = strClean($_POST['tituloAreaCapital']);
            $idareacapital = intval($_POST['idareacapital']);

            if ($idareacapital) {
                $request = $this->model->updateAreaCapital($idareacapital, $tituloAreaCapital);
            } else {
                $request = $this->model->insertAreaCapital($tituloAreaCapital);
            }

            if ($request) {
                if ($idareacapital) {
                    $arrResponse = ['status' => true, 'msg' => 'Data updated correctly.'];
                } else {
                    $arrResponse = ['status' => true, 'msg' => 'Data saved correctly.'];
                }
            } else {
                $arrResponse = ['status' => false, 'msg' => 'An error has ocurred.'];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function delMunicipio()
    {
        if ($_POST) {
            $idmunicipio = intval($_POST['idmunicipio']);
            if ($idmunicipio) {
                $request = $this->model->delMunicipio($idmunicipio);
                if (!empty($request)) {
                    $arrResponse = ['status' => true, 'msg' => 'Data deleted correctly.'];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Data not found'];
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }
}