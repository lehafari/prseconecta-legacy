<?php

    class PermisosModel extends Mysql
    {

        public function __construct()
        {
            parent::__construct();
        }

        public function selectModulos()
        {
            $sql = 'SELECT * FROM modulo WHERE status != 0';
            $request = $this->select_all($sql);
            return $request;
        }

        public function selectPermisosRol(int $idrol){
            $sql = "SELECT * FROM permisos WHERE rolid =  $idrol";
            $request = $this->select_all($sql);
            return $request;
        }

        public function deletePermisos(int $idrol){
            $sql = "DELETE FROM permisos WHERE rolid = $idrol";
            $request = $this->delete($sql);
            return $request;
        }

        public function insertPermisos(int $idrol, int $idmodulo, int $r, int $w, int $u, int $d)
        {
            $query_insert = "INSERT INTO permisos(rolid,moduloId,r,w,u,d) VALUES(?,?,?,?,?,?)";
            $arrData = array($idrol, 
                            $idmodulo, 
                            $r, 
                            $w, 
                            $u, 
                            $d);
            $request_insert = $this->insert($query_insert,$arrData);
            return $request_insert;
        }

        public function permisosModulo(int $idrol)
        {
            $sql = "SELECT  p.rolid,
                            p.moduloid,
                            m.titulo AS modulo,
                            p.r,
                            p.w,
                            p.u,
                            p.d
                    FROM permisos p
                    INNER JOIN modulo m
                    ON p.moduloid = m.idmodulo
                    WHERE p.rolid = $idrol";
            $request = $this->select_all($sql);
            $arrPermisos = array();
            $count = count($request);
            for ($i=0; $i < $count; $i++) { 
                $arrPermisos[$request[$i]['moduloid']] = $request[$i];
            }
            return $arrPermisos;
        }
    
    }