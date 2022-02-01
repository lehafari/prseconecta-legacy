<?php

    class UsersModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function insertUsuario(string $nombre, 
            string $apellido, string $telefono,
            string $email, string $password, int $tipoid,int $status){

            $return = 0;

            $sql = "SELECT * FROM persona 
                    WHERE (email_user = '$email') AND 
            status != 0 ";
            $request = $this->select_all($sql);

            if(empty($request)){
                $query_insert = "INSERT INTO persona(nombres,apellidos,telefono,
                                    email_user,password,rolid,status)
                                VALUES(?,?,?,?,?,?,?)";
                $arrData = array(
                    $nombre,
                    $apellido,
                    $telefono,
                    $email,
                    $password,
                    $tipoid,
                    $status
                );
                $request_insert = $this->insert($query_insert,$arrData);
                $return = $request_insert;
            }else{
                $return = 'exist';
            }
            return $return;

        }

        public function updateUsuario(int $idUsuario, 
                string $nombre, string $apellido, string $telefono,
                string $email, string $password, int $tipoid,int $status){

            $sql = "SELECT * FROM persona WHERE 
            (email_user = '$email' AND 
            idpersona != $idUsuario) AND status != 0";
            $request = $this->select_all($sql);

            if(empty($request)){
                if($password !== ''){
                    $sql = "UPDATE persona SET nombres = ?, apellidos = ?, telefono = ?, 
                            email_user = ?, password = ?, rolid = ?, status = ? 
                            WHERE idpersona = $idUsuario";
                    $arrData = array(
                        $nombre,
                        $apellido,
                        $telefono,
                        $email,
                        $password,
                        $tipoid,
                        $status
                    );

                }else{
                    $sql = "UPDATE persona SET nombres = ?, apellidos = ?, 
                            telefono = ?, email_user = ?, rolid = ?, status = ? 
                            WHERE idpersona = $idUsuario  ";
                    $arrData = array(
                        $nombre,
                        $apellido,
                        $telefono,
                        $email,
                        $tipoid,
                        $status
                    );
                }
                $request = $this->update($sql,$arrData);
            }else{
                $request = 'exist';
            }
            return $request;
        }

        public function selectUsuarios() {
            $whereAdmin = "";
            if($_SESSION['idUser-admin'] != 1){
                $whereAdmin = ' AND p.idpersona != 1';
            }
            $sql = 'SELECT p.idpersona,p.nombres,p.apellidos,
            p.telefono,p.email_user,p.status,r.idrol,r.nombrerol
                    FROM persona p
                    INNER JOIN rol r
                    ON p.rolid = r.idrol
                    WHERE p.status != 0 '.$whereAdmin ;
            $request = $this->select_all($sql);
            return $request;
        }
        
        public function selectUsuario(int $idpersona) {
            $sql = "SELECT p.idpersona, p.nombres, 
                            p.apellidos, p.telefono, p.email_user, p.nit, p.nombrefiscal,
                            p.direccionfiscal, r.idrol, r.nombrerol, p.status,
                            DATE_FORMAT(p.datecreated, '%d-%m-%Y') as fechaRegistro
                FROM persona p
                INNER JOIN rol r
                ON p.rolid = r.idrol
                WHERE p.idpersona = $idpersona";
            $request = $this->select($sql);
            return $request;
        }

        public function deleteUsuario(int $idpersona)
        {
            $sql = "UPDATE persona SET status = ? 
                    WHERE idpersona = $idpersona";
            $arrData = array(0);
            $requestDelete = $this->update($sql, $arrData);
            return $requestDelete;
        }

		public function updatePerfil(int $idUsuario, string $nombre, 
                                    string $apellido, string $telefono, string $email){

            $sql = "SELECT * FROM persona WHERE 
                    (email_user = '$email' AND 
                    idpersona != $idUsuario) AND status != 0";
            $request = $this->select_all($sql);
            $return = 0;

            if(empty($request)){
                $sql = "UPDATE persona SET nombres=?, apellidos=?, telefono=?, email_user=? 
                WHERE idpersona = $idUsuario ";
                $arrData = array($nombre,
                                $apellido,
                                $telefono,
                                $email);
                $request = $this->update($sql,$arrData);
                $return = $request;
            }else{
                $return = 'exist';
            }
		    return $return;
        }

        public function changePassword(string $password, int $idusuario){
            $sql = "UPDATE persona SET password = ? WHERE idpersona = $idusuario ";
            $arrData = array($password);
            $request = $this->update($sql,$arrData);
            return $request;
        }

        public function selectRoles(){
            $whereAdmin = '';
            if($_SESSION['idUser-admin'] != 1){
                $whereAdmin = ' AND idrol != '.RADMINISTRADOR;
            }
            $sql = "SELECT idrol,nombrerol FROM rol WHERE status != 0 AND idrol != ".RCLIENTES." AND idrol != ".RAGENTES." ".$whereAdmin;
            $request = $this->select_all($sql);
            return $request;
        }

        public function updateImgProfile(string $img, int $idpersona){
            $sql = "UPDATE persona SET imagen = ? WHERE idpersona = $idpersona";
            $arrData = [$img];
            $request = $this->update($sql,$arrData);
            return $request;
        }
    }