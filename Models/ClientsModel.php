<?php

class ClientsModel extends Mysql
{
    private $nombreTabla = 'agentsandclients';
    public function __construct()
    {
        parent::__construct();
    }


    public function selectClientes()
    {
        $sql = "SELECT p.idpersona,p.nombres,p.apellidos, p.usuario,
            p.imagen,p.email_user,p.status,r.idrol
                    FROM $this->nombreTabla p
                    INNER JOIN rol r
                    ON p.rolid = r.idrol
                    WHERE p.status != 0 AND r.idrol = " . RCLIENTES;
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectClient($idclient)
    {
        $sql = "SELECT p.idpersona,p.nombres,p.apellidos, 
                        DATE_FORMAT(p.datecreated,'%d/%m/%Y %H:%i') AS datecreated,
            p.imagen, p.usuario,
            p.telefono,p.email_user,p.status,r.nombrerol
                    FROM $this->nombreTabla p
                    INNER JOIN rol r
                    ON p.rolid = r.idrol
                    WHERE p.status != 0
                    AND p.idpersona = $idclient AND p.rolid = " . RCLIENTES;
        $request = $this->select($sql);
        return $request;
    }

    public function insertClient(
        string $username,
        string $nombre,
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
                WHERE (usuario = '$username')  
                AND status != 0";
        $request = $this->select_all($sql);

        if (!empty($request)) {
            return 'exist username';
        } else {
            $query_insert = "INSERT INTO $this->nombreTabla(usuario,nombres,apellidos,telefono,
                                email_user,password,rolid,status)
                            VALUES(?,?,?,?,?,?,?,?)";
            $arrData = array(
                $username,
                $nombre,
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

    public function updateClient(
        int $idUsuario,
        string $usuario,
        string $nombre,
        string $apellido,
        string $telefono,
        string $email,
        int $tipoid,
        int $status
    ) {

        $sql = "SELECT * FROM $this->nombreTabla WHERE 
            (email_user = '$email' 
            AND idpersona != $idUsuario) 
            AND status != 0";
        $request = $this->select_all($sql);

        if (!empty($request)) {
            return 'exist email';
        }



        $sql = "SELECT * FROM $this->nombreTabla WHERE 
            (usuario = '$usuario' 
            AND idpersona != $idUsuario) 
            AND status != 0";
        $request = $this->select_all($sql);

        if (!empty($request)) {
            return 'exist username';
        } else {
            $sql = "UPDATE $this->nombreTabla SET usuario = ? ,nombres = ?, apellidos = ?, 
            telefono = ?, email_user = ?, rolid = ?, status = ? 
            WHERE idpersona = $idUsuario  ";
            $arrData = array(
                $usuario,
                $nombre,
                $apellido,
                $telefono,
                $email,
                $tipoid,
                $status
            );
            $request = $this->update($sql, $arrData);
            return $request;
        }
    }

    public function changePassword(int $idcliente, string $password)
    {
        $sql = "UPDATE $this->nombreTabla SET password = ?
                WHERE idpersona = $idcliente  ";
        $arrData = [$password];
        $request = $this->update($sql, $arrData);
        return $request;
    }

    public function delClient($idagente)
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
}