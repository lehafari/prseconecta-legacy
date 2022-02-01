<?php

class RolesModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectRoles()
    {
        $whereAdmin = '';
        if ($_SESSION['idUser-admin'] != 1) {
            $whereAdmin = ' AND idrol != 1';
        }
        $sql = "SELECT * FROM rol WHERE status != 0 AND idrol != " . RCLIENTES . " AND idrol != " . RAGENTES . " " . $whereAdmin;
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectRol(int $idrol)
    {
        $sql = "SELECT * FROM rol WHERE idrol = $idrol ";
        $request = $this->select($sql);
        return $request;
    }

    public function insertRol(string $nombre, string $descripcion, int $status)
    {
        $return = '';
        $sql = "SELECT * FROM rol WHERE nombrerol = '$nombre' AND status != 0 ";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert = "INSERT INTO rol(nombrerol,descripcion,status) VALUES(?,?,?)";
            $arrData = array($nombre, $descripcion, $status);
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = 'exist';
        }
        return $return;
    }

    public function updateRol(int $idRol, string $nombre, string $descripcion, int $status)
    {

        $sql = "SELECT * FROM rol WHERE nombrerol = '$nombre' AND idrol != $idRol AND status != 0 ";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE rol SET nombrerol = ?, descripcion = ?, status = ? WHERE idrol = $idRol";
            $arrData = array($nombre, $descripcion, $status);
            $request = $this->update($sql, $arrData);
        } else {
            $request = 'exist';
        }
        return $request;
    }
    public function deleteRol(int $idRol)
    {
        $sql = "SELECT * FROM persona WHERE rolid = $idRol";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE rol SET status = ? WHERE idrol = $idRol";
            $arrData = array(0);
            $request = $this->update($sql, $arrData);

            if ($request) {
                $request = 'ok';
            } else {
                $request = 'error';
            }
        } else {
            $request = 'exist';
        }

        return $request;
    }
}