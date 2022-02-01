<?php

class Customs_formsModel extends Mysql
{
  public function __construct()
  {
    parent::__construct();
  }

  public function insertCustomForm(string $titulo)
  {
    $sql = "INSERT INTO tipos(title) VALUES(?)";
    $arrData = [$titulo];
    $request = $this->insert($sql, $arrData);
    return $request;
  }

  public function insertSubType(string $titulo, int $idtipo)
  {
    $sql = "INSERT INTO subtipos(titulo,idtipo) VALUES(?,?)";
    $arrData = [$titulo, $idtipo];
    $request = $this->insert($sql, $arrData);
    return $request;
  }

  public function editSubtype(string $titulo, int $idsubtipo)
  {
    $sql = "UPDATE subtipos SET titulo = ? WHERE idsubtipo = $idsubtipo";
    $arrData = [$titulo];
    $request = $this->update($sql, $arrData);
    return $request;
  }

  public function delSubTipo(int $idsubtipo)
  {
    $sql = "UPDATE subtipos SET status = ? WHERE idsubtipo = $idsubtipo";
    $arrData = [0];
    $request = $this->update($sql, $arrData);
    return $request;
  }

  public function updateCustomForm(string $titulo, int $idCustomForm)
  {
    $sql = "UPDATE tipos SET title = ? WHERE idtipo = $idCustomForm";
    $arrData = [$titulo];
    $request = $this->update($sql, $arrData);
    return $request;
  }

  public function delCustomForm(int $idCustomForm)
  {
    $sql = "UPDATE tipos SET status = ? WHERE idtipo = $idCustomForm";
    $arrData = [0];
    $request = $this->update($sql, $arrData);
    return $request;
  }

  public function getCustomsForms()
  {
    $sql = "SELECT idtipo, title FROM tipos WHERE status = 1";
    $request = $this->select_all($sql);

    if (!empty($request)) {
      $count = count($request);
      for ($i = 0; $i < $count; $i++) {
        $idtipo = $request[$i]['idtipo'];
        $sql = "SELECT titulo,idsubtipo,idtipo FROM subtipos WHERE idtipo = $idtipo AND status = 1";
        $request_subtipos = $this->select_all($sql);
        $request[$i]['subtipos'] = $request_subtipos;
      }
    }
    return $request;
  }

  public function getCustomForm(int $idtipo)
  {
    $sql = "SELECT idtipo, title FROM tipos WHERE status = 1 AND idtipo = $idtipo";
    $request = $this->select($sql);
    return $request;
  }

  public function getSubtype(int $idsubtipo)
  {
    $request = array();
    $sql = "SELECT titulo,idsubtipo,idtipo,orden_disabled,ordern_enabled,top_overview_field,top_right_overview_field,top_detail_field FROM subtipos WHERE idsubtipo = $idsubtipo AND status = 1";
    $request_subtipos = $this->select($sql);


    if (!empty($request_subtipos)) {
      $request['subtipo'] = $request_subtipos;
      $sql = "SELECT title,idtipo FROM tipos WHERE idtipo = {$request_subtipos['idtipo']}";
      $request_tipo = $this->select($sql);
      $request['tipo'] = $request_tipo;
      $sql = "SELECT idform,field_name,status,type FROM formbuilder WHERE idsubtipo = {$request_subtipos['idsubtipo']} AND status != 0 ";
      $request_form_builder = $this->select_all($sql);
      $request['subtipo']['formbuilder'] = $request_form_builder;
    }
    return $request;
  }

  public function getInfoFormBuilder(int $idformBuilder)
  {
    $sql = "SELECT idform,field_name,status,type,valores,placeholder,available_search FROM formbuilder WHERE status != 0 AND idform = $idformBuilder ";
    $request = $this->select($sql);
    return $request;
  }

  public function updateFieldBuilder(
    int $idsubtipo,
    int $idform,
    string $titulo,
    string $name,
    int $availableSearch,
    string $placeholder,
    string $type,
    string $values
  ) {
    $sql = "UPDATE formbuilder SET 
            field_name = ?,
            name = ?,
            placeholder = ?,
            type = ?,
            available_search = ?,
            idsubtipo = ?,
            valores = ?
          WHERE idform = $idform";
    $arrData = [
      $titulo,
      $name,
      $placeholder,
      $type,
      $availableSearch,
      $idsubtipo,
      $values
    ];

    $request = $this->update($sql, $arrData);
    return $request;
  }

  public function insertFieldBuilder(
    int $idsubtipo,
    string $titulo,
    string $name,
    int $availableSearch,
    string $placeholder,
    string $type,
    string $values
  ) {

    /*     $sql = "
    INSERT INTO 
    formbuilder(field_name,name,placeholder,type,available_search,idsubtipo,valores) 
    VALUES 
    
        ('Año de construcción','ano-de-construccion','Ingresa el año de construccion','text','0','$idsubtipo',''),
        ('Área','area','Ingresa el tamaño del área','text','0','$idsubtipo',''),
        ('CAP Rate','cap-rate','Ingresa el CAP Rate','text','0','$idsubtipo',''),
        ('Ingreso','ingreso','Ingresa el Ingreso','text','0','$idsubtipo',''),
        ('Gastos','gastos','Ingresa los Gastos','text','0','$idsubtipo',''),
        ('NOI','noi','Ingresa el NOI','text','0','$idsubtipo',''),
        ('NOI Proforma','noi-proforma','Ingresa el NOI Proforma','text','0','$idsubtipo',''),
        ('Drm','drm','Ingresa cuantos dormitorios hay','text','0','$idsubtipo',''),
        ('Cap Rate','cap-rate','Ingresa el Cap Rate en esta área','text','0','$idsubtipo',''),
        ('Garajes','garajes','Ingresa (Si/No)','text','0','$idsubtipo',''),
        ('Baños','banos','ingresa la cantidad total de baños','text','0','$idsubtipo',''),
        ('Tamaño del garaje','tamano-del-garaje','Ingresa el tamaño del garaje','text','0','$idsubtipo',''),
        ('No. de espacios','no-de-espacios','ingresa cuantos espacios están disponibles','text','0','$idsubtipo',''),
        ('Precio (Sq Ft)','precio-(sq-ft)','Ingresa el precio de (Sq Ft)','text','0','$idsubtipo',''),
        ('Utilidades incluidas','utilidades-incluidas','Ingresa las utilidades incluidas','text','0','$idsubtipo',''),
        ('Terraza','terraza','Ingresa (Si/No)','text','0','$idsubtipo',''),
        ('Estado (1-5)','estado-(1-5)','Ingresa el número del estado del edificio','text','0','$idsubtipo',''),
        ('Balcón','balcon','Ingresa (Si/No)','text','0','$idsubtipo',''),
        ('Exenta de Impuestos','exenta-de-impuestos','Ingresa (Si/No)','text','0','$idsubtipo',''),
        ('Zona de oportunidad','zona-de-oportunidad','Ingresa (Si/No)','text','0','$idsubtipo',''),
        ('Material de construcción','material-de-construccion','Ingresa el material de construccion','text','0','$idsubtipo',''),
        ('Fundación','fundacion','Ingresa el tipo de fundación','text','0','$idsubtipo',''),
        ('Estacionamiento','estacionamiento','Ingresa (Si/No) & cuantos','text','0','$idsubtipo',''),
        ('Techo','techo','Ingresa el tipo de techo','text','0','$idsubtipo',''),
        ('Zonificación','zonificacion','Ingresa el tipo de zonificación','text','0','$idsubtipo',''),
        ('Baños medios','banos-medios','Ingresa cuantos bańos medios','text','0','$idsubtipo',''),
        ('Baños completos','banos-completos','Ingresa cuantos baños completos','text','0','$idsubtipo',''),
        ('Piso','piso','Ingresa el tipo de piso','text','0','$idsubtipo',''),
        ('Niveles','niveles','Ingresa los niveles del edificio','text','0','$idsubtipo',''),
        ('Enfriamiento','enfriamiento','Ingresa el tipo de enfriamiento','text','0','$idsubtipo',''),
        ('Oficinales','oficinales','Ingresa cuantos espacios hay','text','0','$idsubtipo',''),
        ('Informacion de utilidad','informacion-de-utilidad','ingresa información sobre las utilidades','text','0','$idsubtipo',''),
        ('Área oficinal','area-oficinal','Ingresa el área del espacio de la oficina','text','0','$idsubtipo',''),
        ('Informacion de agua','informacion-de-agua','ingresa información acerca del agua','text','0','$idsubtipo',''),
        ('Comerciales','comerciales','Ingresa cuantos espacios hay','text','0','$idsubtipo',''),
        ('Servicios públicos','servicios-publicos','Ingresa los servicios públicos para la propiedad','text','0','$idsubtipo',''),
        ('Arrendamiento','arrendamiento','Ingresa el tipo de arrendamiento','text','0','$idsubtipo',''),
        ('Área comercial','area-comercial','Ingresa el área total del espacio comercial','text','0','$idsubtipo',''),
        ('Residenciales','residenciales','Ingresa cuantas unidades hay','text','0','$idsubtipo',''),
        ('Área residencial','area-residencial','Ingresa el área total del espacio residencial','text','0','$idsubtipo','')
    ";

    $request = $this->insert($sql, []);
    return $request; */
    $sql = "INSERT INTO 
            formbuilder(field_name,name,placeholder,type,available_search,idsubtipo,valores) 
            VALUES (?,?,?,?,?,?,?)";
    $arrData = [
      $titulo,
      $name,
      $placeholder,
      $type,
      $availableSearch,
      $idsubtipo,
      $values
    ];
    $request = $this->insert($sql, $arrData);
    return $request;
  }

  public function setOrdenCheck(int $idsubtipo, string $column, string $orden, int $status)
  {
    $orden = !empty($orden) ? $orden : 0;
    $sql = "UPDATE subtipos SET $column = '$orden' WHERE idsubtipo = $idsubtipo";
    $this->update($sql, []);
    $sql = "UPDATE formbuilder SET status = ? WHERE idform IN ($orden)";
    $arrData = [$status];
    $this->update($sql, $arrData);
    return true;
  }

  public function delFieldBuilder(int $idfield)
  {
    $sql = "UPDATE formbuilder SET status = ? WHERE idform = $idfield";
    $arrData = [0];
    $request = $this->update($sql, $arrData);
    return $request;
  }

  public function setOverviewFields($columna, $idsubtipo, $values)
  {
    $sql = "UPDATE subtipos SET $columna = ? WHERE idsubtipo = $idsubtipo";
    $arrData = [$values];
    $request = $this->update($sql, $arrData);
    return $request;
  }
}