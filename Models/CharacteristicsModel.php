<?php

class CharacteristicsModel extends Mysql
{
  public function __construct()
  {
    parent::__construct();
  }

  public function insertCharacteristics(string $titulo)
  {
    $sql = "INSERT INTO characteristics(titulo) VALUES (?)";
    $arrData = [$titulo];
    $request = $this->insert($sql, $arrData);
    return $request;
  }

  public function editCharacteristic(int $id, string $titulo)
  {
    $sql = "UPDATE characteristics SET titulo = ? WHERE idcheck = $id";
    $arrData = [$titulo];
    $request = $this->update($sql, $arrData);
    return $request;
  }

  public function getCharacteristic(int $id)
  {
    $sql = "SELECT * FROM characteristics WHERE idcheck  = $id";
    $request = $this->select($sql);
    return $request;
  }

  public function getOrden()
  {
    $sql = "SELECT * FROM sortable WHERE idsortable  = 1";
    $request = $this->select($sql);
    return $request;
  }

  public function getCharacteristics()
  {
    $request = [];
    $sql = "SELECT idcheck,titulo FROM characteristics 
            WHERE status = 1 
            ORDER BY idcheck DESC";
    $request_nonaddd = $this->select_all($sql);

    $request['non-add'] = $request_nonaddd;


    $sql = "SELECT idcheck,titulo FROM characteristics 
            WHERE status = 2 
            ORDER BY idcheck DESC";
    $request_add = $this->select_all($sql);

    $request['add'] = $request_add;

    return $request;
  }

  public function setOrdenCheck(int $idtabla, string $column, string $orden, int $status)
  {
    $sql = "UPDATE sortable SET $column = ? WHERE idsortable = $idtabla";
    $arrData = [$orden];
    $this->update($sql, $arrData);

    $sql = "UPDATE characteristics SET status = ? WHERE idcheck IN ($orden)";
    $arrData = [$status];
    $this->update($sql, $arrData);

    return true;
  }


  public function deletecaracteristica($idcaracteristica)
  {
    $sql = "UPDATE characteristics SET status = ? 
          WHERE idcheck = $idcaracteristica";
    $arrData = array(0);
    $requestDelete = $this->update($sql, $arrData);
    return $requestDelete;
  }
}