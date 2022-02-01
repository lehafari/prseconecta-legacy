<?php
class Dashboard extends Controllers
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
        getPermisos(MDASHBOARD);
        parent::__construct();
    }


    public function dashboard()
    {

        $data['page_tag'] = 'Dashboard - ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Dashboard - ' . NOMBRE_EMPRESA;
        $data['page_name'] = 'dashboard';
        $data['page_functions_js'] = 'dashboard.js';
        $data['dashboard-dark'] = true;
        $model = $this->model;
        $data['totalClientes'] = $model->getTotalClientes();
        $data['totalAgentes'] = $model->getTotalAgentes();
        $data['totalUsuarios'] = $model->getTotalUsuarios();
        $data['LastClients'] = $model->LastClients();
        $data['LastAgents'] = $model->LastAgents();
        $this->views->getView($this, 'dashboard', $data);
    }
}