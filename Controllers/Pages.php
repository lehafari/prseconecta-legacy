<?php
class Pages extends Controllers
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
        getPermisos(MPAGES);
        parent::__construct();
    }


    public function Pages()
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() . '/dashboard');
        }
        $data['page_tag'] = 'Pages - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Pages - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'pages';
        $data['page_functions_js'] = 'pages.js';
        $data['dashboard-dark'] = true;
        $data['datatable'] = true;
        $data['jquery'] = true;
        $this->views->getView($this, 'pages', $data);
    }

    public function getPages()
    {
        if ($_SESSION['permisosMod']['r']) {
            $arrData = $this->model->selectPages();
            $count = count($arrData);

            for ($i = 0; $i < $count; $i++) {
                $btnEdit = '';
                $idpage = $arrData[$i]['idpage'];
                $urlEdit = base_url() . '/pages/edit/' . $idpage;
                $btnEdit .= "<a href='$urlEdit' class='btn btn-primary btn-sm' 
                                title='Edit page' type='button'
                            >
                                <i class='bx bx-pencil'></i>
                    </a>";

                $arrData[$i]['options'] = '
                    <div class="text-center">
                    ' . $btnEdit . '
                    </div>';
            }

            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function edit($idpage)
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header('Location: ' . base_url() . '/dashboard');
        }

        $idpage = intval($idpage);

        if ($idpage == 0) {
            header('Location: ' . base_url() . '/dashboard');
        }

        $infoPage = getInfoPage($idpage);

        if (empty($infoPage)) {
            header('Location: ' . base_url() . '/dashboard');
        }



        $data['contenido'] = $infoPage['contenido'];
        $data['idpage'] = $infoPage['idpage'];
        $data['page_tag'] = 'Edit Page - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Edit Page - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'pages';
        $data['page_functions_js'] = 'pages.js';
        $data['dashboard-dark'] = true;
        $data['jquery'] = true;
        $this->views->getView($this, 'edit', $data);
    }
}