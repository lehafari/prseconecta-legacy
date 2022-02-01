<?php

if (!class_exists('Mysql')) {
    require_once('Libraries/Core/Mysql.php');
}

trait TAgentes
{
    public function getAgentesPage($desde, $porpagina)
    {
        $con = new Mysql();
        $sql = "SELECT idpersona,nombres, apellidos, email_user, telefono, imagen,usuario, socialmedia,extrajson,rutausuario
                FROM agentsandclients
                WHERE status = 1 AND rolid = " . RAGENTES . "
                ORDER BY idpersona 
                DESC LIMIT $desde,$porpagina";


        $request = $con->select_all($sql);
        if (!empty($request)) {
            $count = count($request);
            for ($i = 0; $i < $count; $i++) {
                $idpersona = $request[$i]['idpersona'];
                $sql = "SELECT ROUND(AVG(r.valuerating),2) AS promedio 
                        FROM ratings r 
                        INNER JOIN agentsandclients p
                        ON r.idreviewer = p.idpersona
                        WHERE r.personaid = {$idpersona}";
                $request_rating = $con->select($sql);
                $request[$i]['promedio-rating'] = $request_rating['promedio'];
            }
        }

        return $request;
    }

    public function cantAgentes()
    {
        $con = new Mysql();
        $sql = "SELECT COUNT(*) AS total_registro 
        FROM agentsandclients WHERE status = 1  AND rolid = " . RAGENTES;
        $result_register = $con->select($sql);
        $total_registro = $result_register['total_registro'];
        return $total_registro;
    }

    public function getUsuarioByUsername(string $rutausername)
    {
        $con = new Mysql();
        $sql = "SELECT * FROM agentsandclients
                WHERE status = 1 AND rutausuario = '$rutausername' AND rolid = " . RAGENTES;
        $request = $con->select($sql);

        if (!empty($request)) {
            $idpersona = $request['idpersona'];
            $sql = "SELECT ROUND(AVG(r.valuerating),2) AS promedio 
                    FROM ratings r 
                    INNER JOIN agentsandclients p
                    ON r.idreviewer = p.idpersona
                    WHERE r.personaid = {$idpersona}";
            $request_rating = $con->select($sql);
            $request['promedio-rating'] = $request_rating['promedio'];


            $request_comentarios = $this->getComentarios($idpersona);
            $request['comentarios'] = $request_comentarios;

            if (!empty($_SESSION['idUser-cliente'])) {
                $idreviewer = $_SESSION['idUser-cliente'];
                $sql = "SELECT valuerating FROM ratings WHERE personaid = $idpersona AND idreviewer = $idreviewer";
                $request_rating_calificador = $con->select($sql);
                $request['promedio-calificador'] = !empty($request_rating_calificador)
                    ? $request_rating_calificador['valuerating']
                    : 0;
            }
        }
        return $request;
    }

    public function setRating(int $idreviewer, int $idpersona, float $value)
    {
        $con = new Mysql();
        $sql = "SELECT * FROM ratings WHERE idreviewer = $idreviewer AND personaid = $idpersona";
        $request = $con->select_all($sql);
        if (empty($request)) {
            if ($idreviewer > 0 and $idpersona > 0) {
                $sql = "INSERT INTO ratings(personaid,idreviewer,valuerating) VALUES(?,?,?)";
                $arrData = [$idpersona, $idreviewer, $value];
                $request_insert = $con->insert($sql, $arrData);
                return $request_insert;
            }
        } else {
            $sql = "UPDATE ratings SET valuerating = ? WHERE idreviewer = $idreviewer AND personaid = $idpersona";
            $arrData = [$value];
            $request_update = $con->update($sql, $arrData);
            return $request_update;
        }
    }

    public function setComentario(int $idreviewer, int $idpersona, string $comentario)
    {
        $con = new Mysql();
        $sql = "INSERT INTO reviews(personaid,idreviewer,comentario) VALUES(?,?,?)";
        $arrData = [$idpersona, $idreviewer, $comentario];
        $request = $con->insert($sql, $arrData);
        return $request;
    }

    public function getComentarios(int $idpersona)
    {
        $con = new Mysql();
        $sql  = "SELECT r.idreview,p.usuario,r.comentario,p.imagen, r.idreviewer,
                    DATE_FORMAT(r.datecreated,'%d-%m-%Y %H:%i:%s') AS datecreated
                    FROM reviews r
                    INNER JOIN agentsandclients p 
                    ON r.idreviewer = p.idpersona
                    WHERE r.personaid = $idpersona ORDER BY r.idreview DESC";
        $request_comentarios = $con->select_all($sql);
        return $request_comentarios;
    }

    public function getComentario(int $idreview)
    {
        $con = new Mysql();
        $sql  = "SELECT r.idreview,p.usuario,r.comentario,p.imagen, r.idreviewer,
                DATE_FORMAT(r.datecreated,'%d-%m-%Y %H:%i:%s') AS datecreated
                FROM reviews r
                INNER JOIN agentsandclients p 
                ON r.idreviewer = p.idpersona
                WHERE r.idreview = $idreview";
        $request_comentarios = $con->select($sql);
        return $request_comentarios;
    }

    public function updateComentario(string $comentario, int $idcomentario)
    {
        $con = new Mysql();
        $sql = "UPDATE reviews SET comentario = ? WHERE idreview = $idcomentario";
        $arrData = [$comentario];
        $request = $con->update($sql, $arrData);
        return $request;
    }

    public function deleteComentario(int $idcomentario)
    {
        $con = new Mysql();
        $sql = "DELETE FROM reviews WHERE idreview = $idcomentario";
        $request = $con->delete($sql);
        return $request;
    }
}