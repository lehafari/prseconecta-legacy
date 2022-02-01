<?php

class AgentsModel extends Mysql
{
    private $nombreTabla = 'agentsandclients';
    public function __construct()
    {
        parent::__construct();
    }


    public function selectAgentes()
    {
        $sql = "SELECT p.idpersona,p.nombres,p.apellidos,
            p.telefono,p.email_user,p.status,r.idrol, p.imagen,p.usuario
                    FROM $this->nombreTabla p
                    INNER JOIN rol r
                    ON p.rolid = r.idrol
                    WHERE p.status != 0 AND r.idrol = " . RAGENTES;
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectAgent($idagente)
    {
        $sql = "SELECT p.idpersona,p.nombres,p.apellidos,p.usuario, p.custombg,
                        DATE_FORMAT(p.datecreated,'%d/%m/%Y %H:%i') AS datecreated,
            p.telefono,p.email_user,p.status,r.nombrerol, p.extrajson, p.socialmedia,p.imagen
                    FROM $this->nombreTabla p
                    INNER JOIN rol r
                    ON p.rolid = r.idrol
                    WHERE p.status != 0
                    AND p.rolid = " . RAGENTES . "
                    AND p.idpersona = $idagente";
        $request = $this->select($sql);
        return $request;
    }

    public function insertAgent(
        string $usuario,
        string $nombre,
        string $rutausuario,
        string $apellido,
        string $telefono,
        string $email,
        string $password,
        int $tipoid,
        int $status
    ) {

        $sql = "SELECT * FROM $this->nombreTabla
                    WHERE (email_user = '$email') 
                    AND status != 0";
        $request = $this->select_all($sql);

        if (!empty($request)) {
            return 'exist email';
        }

        $sql = "SELECT * FROM $this->nombreTabla
                WHERE (usuario = '$usuario') 
                AND status != 0";
        $request = $this->select_all($sql);

        if (!empty($request)) {
            return 'exist user';
        } else {
            $query_insert = "INSERT INTO $this->nombreTabla(usuario,nombres,rutausuario,apellidos,telefono,
                                email_user,password,rolid,status)
                            VALUES(?,?,?,?,?,?,?,?,?)";
            $arrData = array(
                $usuario,
                $nombre,
                $rutausuario,
                $apellido,
                $telefono,
                $email,
                $password,
                $tipoid,
                $status
            );
            $request_insert = $this->insert($query_insert, $arrData);
            return $request_insert;
        }
    }

    public function updateAgent(
        int $idUsuario,
        string $usuario,
        string $rutausuario,
        string $nombre,
        string $apellido,
        string $telefono,
        string $email,
        int $tipoid,
        int $status,
        string $extrajson
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

        if (empty($request)) {
            $sql = "UPDATE $this->nombreTabla SET usuario = ?,rutausuario = ?, nombres = ?, rutausuario = ?, apellidos = ?, 
            telefono = ?, email_user = ?, rolid = ?, status = ?, extrajson = ?
            WHERE idpersona = $idUsuario  ";
            $arrData = array(
                $usuario,
                $nombre,
                $rutausuario,
                $apellido,
                $telefono,
                $email,
                $tipoid,
                $status,
                $extrajson
            );
            $request = $this->update($sql, $arrData);
        } else {
            $request = 'exist user';
        }
        return $request;
    }

    public function delAgent(int $idagente)
    {
        $sql = "UPDATE $this->nombreTabla SET status = ? 
            WHERE idpersona = $idagente";
        $arrData = array(0);
        $requestDelete = $this->update($sql, $arrData);
        return $requestDelete;
    }

    public function updateImgProfile(string $img, int $idpersona)
    {
        $sql = "UPDATE agentsandclients SET imagen = ? WHERE idpersona = $idpersona";
        $arrData = [$img];
        $request = $this->update($sql, $arrData);
        return $request;
    }

    public function changePassword(int $idagente, string $password)
    {
        $sql = "UPDATE $this->nombreTabla SET password = ?
                WHERE idpersona = $idagente  ";
        $arrData = [$password];
        $request = $this->update($sql, $arrData);
        return $request;
    }

    public function updateSocialMedia(int $idagente, string $socialmedia)
    {
        $sql = "UPDATE agentsandclients SET socialmedia = ?
        WHERE idpersona = $idagente";
        $arrData = array($socialmedia);
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