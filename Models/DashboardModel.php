<?php

class DashboardModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTotalClientes()
    {
        $sql = 'SELECT COUNT(*) AS total FROM agentsandclients WHERE status != 0 and rolid = ' . RCLIENTES;
        $request = $this->select($sql);
        return $request['total'];
    }

    public function getTotalAgentes()
    {
        $sql = 'SELECT COUNT(*) AS total FROM agentsandclients WHERE status != 0 AND rolid = ' . RAGENTES;
        $request = $this->select($sql);
        return $request['total'];
    }

    public function getTotalUsuarios()
    {
        $sql = 'SELECT COUNT(*) AS total FROM persona WHERE status != 0';
        $request = $this->select($sql);
        return $request['total'];
    }

    public function getTotalPropertys()
    {
        // A
    }

    public function LastClients()
    {
        $sql = 'SELECT CONCAT(nombres," ",apellidos) AS fullname,
                            idpersona,
                            email_user
                    FROM agentsandclients 
                    WHERE status != 0 and rolid = ' . RCLIENTES . ' ORDER BY idpersona DESC';
        $request = $this->select_all($sql);
        return $request;
    }

    public function lastAgents()
    {
        $sql = 'SELECT CONCAT(nombres," ",apellidos) AS fullname,
                            idpersona,
                            email_user
            
                    FROM agentsandclients 
                    WHERE status != 0 and rolid = ' . RAGENTES . ' ORDER BY idpersona DESC';
        $request = $this->select_all($sql);
        return $request;
    }
}