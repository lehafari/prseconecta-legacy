<?php
require 'Models/TAgentes.php';
require 'Models/TPropiedades.php';
class Agentes extends Controllers
{
    use TAgentes, TPropiedades;
    public function __construct()
    {
        if (empty($_SESSION)) {
            session_set_cookie_params(60 * 60 * 24 * 14);
            session_start();
        }
        parent::__construct();
    }


    public function Agentes()
    {
        $pagina = 1;
        $total_registro = $this->cantAgentes();
        $desde = ($pagina - 1) * AGENTESPORPAGINA;
        $total_paginas = ceil($total_registro / AGENTESPORPAGINA);
        $data['page_tag'] = 'Agentes ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Agentes ';
        $data['page_name'] = 'agentes';
        $data['agentes'] = $this->getAgentesPage($desde, AGENTESPORPAGINA);
        $data['paginacion'] = ['total_paginas' => $total_paginas, 'pagina' => $pagina];

        $data['rating'] = true;
        $this->views->getView($this, 'agentes', $data);
    }

    public function page($pagina = null)
    {
        $pagina = is_numeric($pagina) ? $pagina : 1;
        $total_registro = $this->cantAgentes();
        $desde = ($pagina - 1) * AGENTESPORPAGINA;
        $total_paginas = ceil($total_registro / AGENTESPORPAGINA);
        $data['page_tag'] = 'Agentes ' . NOMBRE_EMPRESA;
        $data['page_title'] = 'Agentes ';
        $data['page_name'] = 'agentes';
        $data['paginacion'] = ['total_paginas' => $total_paginas, 'pagina' => $pagina];
        $data['agentes'] = $this->getAgentesPage($desde, AGENTESPORPAGINA);
        $data['rating'] = true;
        $this->views->getView($this, 'agentes', $data);
    }

    public function Agente($usuario)
    {

        if (empty($usuario)) {
            header('location: ' . base_url());
        }

        $userData = $this->getUsuarioByUsername($usuario);

        if (empty($userData)) {
            header('location: ' . base_url());
        }

        $data['propiedadesAgente'] = $this->getPropiedadesByAgente($userData['idpersona']);
        $data['agente'] = $userData;
        $data['page_tag'] = "{$userData['nombres']} {$userData['apellidos']} - " . NOMBRE_EMPRESA;
        $data['page_title'] = 'Agente';
        $data['page_name'] = 'agente';
        $data['rating'] = true;
        $data['axios'] = true;
        $this->views->getView($this, 'agente', $data);
    }

    public function rating()
    {
        if ($_POST) {
            if (!empty($_SESSION['cliente-login'])) {
                $idreviewer = $_SESSION['idUser-cliente'];
                $idpersona = openssl_decrypt($_POST['idpersona'], METHODENCRIPT, KEY);
                $idpersona = intval($idpersona);
                $value = floatval($_POST['value']);
                if (!empty($idpersona)) {
                    $request = $this->setRating($idreviewer, $idpersona, $value);
                    if ($request > 0) {
                        $arrResponse = ['status' => true, 'msg' => 'ok'];
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'Ocurrió un error, intente más tarde'];
                    }
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Data error...'];
                }
            } else {
                $arrResponse = [
                    'status' => false,
                    'msg' => 'Tienes que iniciar sesión antes de poder calificar el rating!',
                    'reload' => true
                ];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function comentarAgente()
    {
        if ($_POST) {
            if (!empty($_SESSION['cliente-login'])) {
                $idreviewer = $_SESSION['idUser-cliente'];
                $idpersona = openssl_decrypt($_POST['idpersona'], METHODENCRIPT, KEY);
                $idpersona = intval($idpersona);
                $comentario = strClean($_POST['comentario']);
                if (!empty($idpersona)) {
                    $request = $this->setComentario($idreviewer, $idpersona, $comentario);
                    if ($request > 0) {
                        $comentario = $this->getComentario($request);
                        $html = getFile('Template/plantillas/plantillacomentario', $comentario);
                        $arrResponse = ['status' => true, 'msg' => 'Comentario realizado exitosamente', 'html' => $html];
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'Ocurrió un error, intente más tarde'];
                    }
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Error de datos.'];
                }
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Tienes que iniciar sesión antes de poder calificar el rating!'];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function selectComentario()
    {
        if (!empty($_GET['idcomentario'])) {
            $idcomentario = openssl_decrypt($_GET['idcomentario'], METHODENCRIPT, KEY);
            if (!empty($idcomentario)) {
                $idcomentario = intval($idcomentario);
                if ($idcomentario > 0) {
                    $request = $this->getComentario($idcomentario);
                    if (!empty($request)) {
                        $arrResponse = ['status' => true, 'msg' => 'ok', 'text' => $request['comentario']];
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'Este comentario no existe'];
                    }
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Ocurrió un error...'];
                }
            } else {
                $arrResponse = ['status' => false, 'msg' => 'Error...'];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }

    public function editInfoComment()
    {
        if ($_POST) {
            if ((!empty($_POST['idcomentario']) || !empty($_POST['comentario'])) and !empty($_SESSION['cliente-login'])) {
                $idcomentario = openssl_decrypt($_POST['idcomentario'], METHODENCRIPT, KEY);
                if (!empty($idcomentario)) {
                    $idcomentario = intval($idcomentario);
                    if ($idcomentario > 0) {
                        $comentario = strClean($_POST['comentario']);
                        $request = $this->updateComentario($comentario, $idcomentario);
                        if ($request > 0) {
                            $arrResponse = ['status' => true, 'msg' => 'Comentario actualizado correctamente.'];
                        } else {
                            $arrResponse = ['status' => false, 'msg' => 'Ocurrió un error...'];
                        }
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'Ocurrió un error...'];
                    }
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Error...', 'reload' => true];
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function delComentario()
    {
        if ($_POST) {
            if (!empty($_POST['idcomentario']) and !empty($_SESSION['cliente-login'])) {
                $idcomentario = openssl_decrypt($_POST['idcomentario'], METHODENCRIPT, KEY);
                if (!empty($idcomentario)) {
                    $idcomentario = intval($idcomentario);
                    if ($idcomentario > 0) {
                        $request = $this->deleteComentario($idcomentario);
                        if ($request > 0) {
                            $arrResponse = ['status' => true, 'msg' => 'Comentario eliminado correctamente.'];
                        } else {
                            $arrResponse = ['status' => false, 'msg' => 'Ocurrió un error...'];
                        }
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'Ocurrió un error...'];
                    }
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Error...', 'reload' => true];
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }
}