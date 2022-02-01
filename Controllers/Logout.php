<?php
class Logout
{
    public function __construct()
    {
        if (empty($_SESSION)) {
            session_set_cookie_params(60 * 60 * 24 * 14);
            session_start();
        }
        if (isset($_GET['redirect'])) {
            if ($_GET['redirect'] === 'admin') {
                if (isset($_SESSION['idUser-admin'])) {
                    unset($_SESSION['idUser-admin']);
                }
                if (isset($_SESSION['admin-login'])) {
                    unset($_SESSION['admin-login']);
                }
                if (isset($_SESSION['userData-admin'])) {
                    unset($_SESSION['userData-admin']);
                }
                if (isset($_SESSION['permisos'])) {
                    unset($_SESSION['permisos']);
                }
                if (isset($_SESSION['permisosMod'])) {
                    unset($_SESSION['permisosMod']);
                }
                header('location: ' . base_url() . '/admin-login');
            } else {
                $this->unsetCliente();
            }
        } else {
            $this->unsetCliente();
        }
        if (empty($_SESSION)) {
            session_unset();
            session_destroy();
        }
    }

    private function unsetCliente()
    {
        if (isset($_SESSION['idUser-cliente'])) {
            unset($_SESSION['idUser-cliente']);
        }
        if (isset($_SESSION['cliente-login'])) {
            unset($_SESSION['cliente-login']);
        }
        if (isset($_SESSION['userData-cliente'])) {
            unset($_SESSION['userData-cliente']);
        }
        header('location: ' . base_url());
    }
}