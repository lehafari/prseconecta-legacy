<?php

class PerfilModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function deleteUsuario(int $idpersona)
    {
        $sql = "UPDATE agentsandclients SET status = ? 
                    WHERE idpersona = $idpersona";
        $arrData = array(0);
        $requestDelete = $this->update($sql, $arrData);
        return $requestDelete;
    }

    public function updatePerfil(
        int $idUsuario,
        string $rutausuario,
        string $nombre,
        string $apellido,
        string $telefono,
        string $email,
        string $usuario,
        int $rolid,
        string $jsonstring
    ) {
        $sql = "SELECT * FROM agentsandclients 
                WHERE (email_user = '$email' AND idpersona != $idUsuario)
                AND status != 0";

        $request = $this->select_all($sql);

        if (!empty($request)) {
            return 'exist email';
        }

        $sql = "SELECT * FROM agentsandclients 
                WHERE ((usuario = '$usuario' AND idpersona != $idUsuario) OR
                    (rutausuario = '$rutausuario' AND idpersona != $idUsuario))
                AND status != 0";

        $request = $this->select_all($sql);

        if (!empty($request)) {
            return 'exist user';
        } else {
            if (empty($jsonstring)) {
                $sql = "UPDATE agentsandclients SET rutausuario = ?,nombres=?, apellidos=?, telefono=?, 
                    email_user=?, usuario = ?, rolid = ?
                    WHERE idpersona = $idUsuario ";
                $arrData = array(
                    $rutausuario,
                    $nombre,
                    $apellido,
                    $telefono,
                    $email,
                    $usuario,
                    $rolid
                );
            } else {
                $sql = "UPDATE agentsandclients SET rutausuario = ?, nombres=?, apellidos=?, telefono=?, 
                    email_user=?, usuario = ?, rolid = ?, extrajson = ?
                    WHERE idpersona = $idUsuario ";
                $arrData = array(
                    $rutausuario,
                    $nombre,
                    $apellido,
                    $telefono,
                    $email,
                    $usuario,
                    $rolid,
                    $jsonstring
                );
            }

            $request = $this->update($sql, $arrData);
            return $request;
        }
    }

    public function updateSocialMedia(int $idusuario, string $socialmedia)
    {
        $sql = "UPDATE agentsandclients SET socialmedia = ?
                    WHERE idpersona = $idusuario ";
        $arrData = array($socialmedia);
        $request = $this->update($sql, $arrData);
        return $request;
    }

    public function changePassword(string $password, int $idusuario)
    {
        $sql = "UPDATE agentsandclients SET password = ? WHERE idpersona = $idusuario ";
        $arrData = array($password);
        $request = $this->update($sql, $arrData);
        return $request;
    }

    public function updateImgProfile(string $img, int $idpersona)
    {
        $sql = "UPDATE agentsandclients SET imagen = ? WHERE idpersona = $idpersona";
        $arrData = [$img];
        $request = $this->update($sql, $arrData);
        return $request;
    }

    public function updateCustomBg(int $idpersona, string $portada)
    {
        $sql = "SELECT custombg FROM agentsandclients WHERE idpersona = $idpersona";
        $request_imagen = $this->select($sql);

        $sql = "UPDATE agentsandclients SET custombg = ? WHERE idpersona = $idpersona";
        $arrData = [$portada];
        $request = $this->update($sql, $arrData);

        $return = [
            'status' => $request,
            'imagen' => $request_imagen['custombg']
        ];

        return $return;
    }
}