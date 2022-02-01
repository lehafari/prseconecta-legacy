<?php

if (!class_exists('Mysql')) {
    require_once('Libraries/Core/Mysql.php');
}

trait TAuth
{
    public function userLogin(string $usuario, string $password, $tabla = false)
    {
        $con = new Mysql();


        $nombreTabla = 'persona';

        if ($tabla) {
            $nombreTabla = 'agentsandclients';
        }

        $sql = "SELECT p.idpersona, p.status, r.idrol
                FROM $nombreTabla p
                INNER JOIN rol r
                ON p.rolid = r.idrol
                WHERE (p.email_user = '$usuario' OR p.usuario = '$usuario') AND
                p.password = '$password' AND 
                p.status != 0";
        $request = $con->select($sql);
        return $request;
    }

    public function getUserEmail(string $email, $tabla = false)
    {

        $nombreTabla = 'persona';

        if ($tabla) {
            $nombreTabla = 'agentsandclients';
        }

        $con = new Mysql();
        $sql = "SELECT idpersona, nombres, apellidos, status FROM $nombreTabla WHERE
        email_user = '$email' AND status = 1 ";
        $request = $con->select($sql);
        return $request;
    }


    public function setTokenUser(int $idpersona, string $token, $tabla = false)
    {

        $nombreTabla = 'persona';

        if ($tabla) {
            $nombreTabla = 'agentsandclients';
        }

        $con = new Mysql();
        $sql = "UPDATE $nombreTabla SET token = ? WHERE idpersona = $idpersona ";
        $arrData = array($token);
        $request = $con->update($sql, $arrData);
        return $request;
    }

    public function getUsuario(string $email, string $token, $tabla = false)
    {

        $nombreTabla = 'persona';

        if ($tabla) {
            $nombreTabla = 'agentsandclients';
        }

        $con = new Mysql();
        $sql = "SELECT idpersona FROM $nombreTabla 
                WHERE email_user = '$email' 
                AND token = '$token' AND status = 1";
        $request = $con->select($sql);
        return $request;
    }

    public function insertPassword(int $idPersona, string $password, $tabla = false)
    {
        $con = new Mysql();

        $nombreTabla = 'persona';

        if ($tabla) {
            $nombreTabla = 'agentsandclients';
        }

        $sql = "UPDATE $nombreTabla SET password = ?, token = ? WHERE idpersona = $idPersona ";
        $arrData = array($password, '');
        $request = $con->update($sql, $arrData);
        return $request;
    }

    public function registarCliente(string $rutausuario, string $username, string $nombres, string $apellidos, string $email, string $password, int $rolid, int $status)
    {
        $con = new Mysql();

        $sql = "SELECT * FROM agentsandclients 
                WHERE (email_user = '$email') 
                AND status != 0";
        $request = $con->select_all($sql);

        if (!empty($request)) {
            return 'exist email';
        }

        $sql = "SELECT * FROM agentsandclients 
        WHERE ((usuario = '$username') OR (rutausuario = '$rutausuario')) 
        AND status != 0";
        $request = $con->select_all($sql);



        if (!empty($request)) {
            return 'exist user';
        } else {
            $query_insert = "INSERT INTO agentsandclients(rutausuario,usuario,nombres,apellidos,
                                email_user,password,rolid,status)
                            VALUES(?,?,?,?,?,?,?,?)";
            $arrData = array(
                $rutausuario,
                $username,
                $nombres,
                $apellidos,
                $email,
                $password,
                $rolid,
                $status
            );
            $request_insert = $con->insert($query_insert, $arrData);
            return $request_insert;
        }
    }
}